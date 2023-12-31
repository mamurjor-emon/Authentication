<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Mail\VerifyUserMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * User register page show
     *
     * @method GET
     * @return Illuminate\Http\Request Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('login');
        }
        $this->setPageTitle('Register');
        return view('auth.register');
    }

    /**
     * User register page show
     *
     * @method POST
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Request Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname'    => 'required',
            'lname'    => 'required',
            'email'    => 'email|required|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $role = Roles::where('slug','client')->first();
        $verify_code = Str::random(64);
        $user = User::create([
            'role_id'            => $role->id,
            'fname'              => $request->fname,
            'lname'              => $request->lname,
            'email'              => $request->email,
            'password'           => Hash::make($request->password),
            'verify_code'        => $verify_code,
        ]);
        $request['roleName'] = $role->name;
        $request['full_name'] = $request->fname . ' ' . $request->lname;
        $request['button_url'] = URL::temporarySignedRoute('verify.code', now()->addHours(1), ['token' => $verify_code]);
        $request['button_title'] = 'Click Here To Verify Email';

        // User mail
        $subject = emailSubjectTemplate('NEW_USER_MAIL', $request);
        $body    = emailBodyTemplate('NEW_USER_MAIL', $request);
        $heading = emailHeadingTemplate('NEW_USER_MAIL', $request);

        $userMail = ['subject' => $subject, 'body' => $body, 'heading' => $heading];
        Mail::to($request->email)->send(new VerifyUserMail($userMail));
        Auth::login($user, true);
        DB::commit();
        return redirect()->route('login')->with('success', 'Registration successfull!');
    }
}
