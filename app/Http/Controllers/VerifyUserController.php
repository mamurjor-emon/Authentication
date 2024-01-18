<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyUserController extends Controller
{
    /**
     * Email verified
     *
     * @param \App\Models\User $token
     * @return \Illuminate\Http\Response
     */
    public function verifiedCode(Request $request, $token){
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $emailVerifyCode = User::where('verify_code','=',$token)->first();
        if ($emailVerifyCode) {
            $emailVerifyCode->update([
                'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s')
            ]);
            return redirect()->route('login')->with('success','Your email is verified.');
        }
        else{
            return redirect()->back()->with('Sorry your email cannot be identified.');
        }

    }
}
