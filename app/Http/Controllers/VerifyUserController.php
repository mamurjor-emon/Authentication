<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyUserController extends Controller
{
    public function index(){
        return view('mail.backend.verify-user');
    }
}
