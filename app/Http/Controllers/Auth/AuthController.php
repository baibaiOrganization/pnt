<?php

namespace Theater\Http\Controllers\Auth;

use Theater\Entities\Organization;
use Theater\User;
use Validator;
use Theater\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    public function createUser(Request $request){
        $validate = $this->validator($request->all());
        if($validate->fails())
            return redirect()->back()->withErrors($validate)->withInput();

        $user = $this->create($request->all());
        auth()->login($user, true);
        return redirect()->route('choose');
    }
    
    public function loginUser(Request $request){
        $inputs = $request->all();
        $user = User::where('email', $inputs['email'])->first();
        $check = $user ? Hash::check($inputs['password'], $user->password) : false;
        if(!$check)
            return redirect()->back()->with(['Error' => 'El usuario o contraseña son incorrectos']);

        auth()->login($user, true);
        if(auth()->user()->role_id == 1)
            return redirect('admin');
        return redirect()->route('choose');
    }

    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 2,
        ]);
    }
}
