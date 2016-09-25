<?php

namespace Theater\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Theater\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware($this->guestMiddleware());
    }

    protected function getSendResetLinkEmailSuccessResponse($response){
        return redirect()->to('/')->with('Success', 'Se ha enviado un mensaje a tu correo para que puedas restaurar tu contraseña.');
    }

    protected function getEmailSubject(){
        return property_exists($this, 'subject') ? $this->subject : 'Tu link para resetear el password';
    }

    protected function getResetSuccessResponse($response){
        return redirect()->to('/')->with('Success', 'Tu contraseña ha sido restaurada con éxito.');
    }
}
