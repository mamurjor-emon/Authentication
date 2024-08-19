<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotificationBroadcast;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Str;
use App\Mail\VerifyUserMail;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use App\Notifications\UserRegisteredNotification;
use Stevebauman\Location\Facades\Location;

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
    public function store(RegisterRequest $request)
    {

        $role = Roles::where('slug', 'client')->first();
        $admin = User::where('role_id', 1)->first();
        $verify_code = Str::random(64);
        $user = User::create([
            'role_id'            => $role->id,
            'fname'              => $request->fname,
            'lname'              => $request->lname,
            'email'              => $request->email,
            'password'           => Hash::make($request->password),
            'verify_code'        => $verify_code,
        ]);
        // $location = Location::get($request->ip());
        $location = Location::get('8.8.8.8');
        UserLocation::create([
            'user_id'      => $user->id,
            'ip_address'   => $location->ip,
            'country'      => $location->countryName,
            'country_code' => $location->countryCode,
            'region_code'  => $location->regionCode,
            'city_name'    => $location->cityName,
            'zip_code'     => $location->zipCode,
            'postal_code'  => $location->postalCode,
            'area_code'    => $location->areaCode
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
        $message = [
            'sender' => $user->id,
            'to' => $admin->id,
            'message' => 'A new user has Registered: ' . $request->fname . ' ' . $request->lname,
        ];
        event(new NotificationBroadcast($message));
        $admin->notify(new UserRegisteredNotification($user));
        Auth::login($user, true);
        DB::commit();
        return redirect()->route('login')->with('success', 'Registration Successfull!');
    }
    /**
     * Forgot password create
     *
     * @param \App\Models\User $token
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        $this->setPageTitle('Forgot Password');
        return view('auth.reset-password');
    }
    /**
     * Client password reset email sent
     *
     * @method POST
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Request Response
     */
    public function forgotPasswordSent(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            session()->flash('error', 'Failed! email is not registered.');
            return back();
        }

        $verify_code = Str::random(60);
        $user['verify_code'] = $verify_code;
        $user->save();

        $request['full_name'] = $user->fname . ' ' . $user->lname;
        $request['button_reset_url'] = URL::temporarySignedRoute('forgot.password.token', now()->addHours(1), ['token' => $verify_code]);
        $request['button_url'] = URL::temporarySignedRoute('forgot.password.token', now()->addHours(1), ['token' => $verify_code]);
        $request['button_reset_title'] = 'Click Here To Reset Password';

        // User mail
        $subject = emailSubjectTemplate('PASSWORD_RESET_MAIL', $request);
        $body    = emailBodyTemplate('PASSWORD_RESET_MAIL', $request);
        $heading = emailHeadingTemplate('PASSWORD_RESET_MAIL', $request);

        $userMail = ['subject' => $subject, 'body' => $body, 'heading' => $heading];
        Mail::to($user->email)->send(new PasswordResetMail($userMail));
        return redirect()->back()->with('success', 'Password reset link has been sent to your email');
    }

    /**
     * Forgot password verify
     *
     * @param \App\Models\User $token
     * @return \Illuminate\Http\Response
     */
    public function forgotPasswordToken(Request $request, $verify_token)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $user = User::where('verify_code', $verify_token)->first();
        if ($user) {
            $this->setPageTitle('Password Update');
            return view('auth.update-password', compact('user',));
        }
        return redirect()->route('forgot.password')->with('warning', 'Password reset link is expired');
    }
    /**
     * Change password
     * @param request
     * @return response
     */
    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'email'            => 'required',
            'password'         => 'required|min:8|max:20|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (!is_null($user->email_verified_at)) {
                $user['verify_code'] = '';
                $user['password'] = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('success', 'Your password has been changed.');
            } else {
                session()->flash('error', 'Please! verify your email.');
            }
        } else {
            session()->flash('error', 'Something went wrong.');
        }
        return back();
    }
}
