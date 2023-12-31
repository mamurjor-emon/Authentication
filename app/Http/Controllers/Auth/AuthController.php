<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        DB::beginTransaction();
        try {
            $user = User::create([
                'role_id'            => 4,
                'fname'              => $request->fname,
                'lname'              => $request->lname,
                'email'              => $request->email,
                'password'           => Hash::make($request->password),
            ]);

            // $request['roleName'] = 'Client';
            // $request['full_name'] = $request->first_name . ' ' . $request->last_name;
            // $request['button_url'] = URL::temporarySignedRoute('verify-token', now()->addHours(1), ['token' => $verify_token]);
            // $request['button_title'] = 'Click Here To Verify Email';
            // $request['button_url_noty'] = route('super.manage-user.client.index');
            // $request['button_title_noty'] = 'View full profile';
            // // User mail
            // $subject = emailSubjectTemplate('NEW_USER_MAIL', $request);
            // $body    = emailBodyTemplate('NEW_USER_MAIL', $request);
            // $heading = emailHeadingTemplate('NEW_USER_MAIL', $request);
            // $userMail = ['subject' => $subject, 'body' => $body, 'heading' => $heading];
            // Mail::to($request->email)->send(new VerifyMail($userMail));
            Auth::login($user, true);
            DB::commit();
            return redirect()->route('login')->with('success', 'Registration successfull!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
