<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request as FacadesRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-z0-9._-]+@\w+\.[com]+/'],
            'password' => ['required', 'string'],
            'password2' => ['required', 'string', 'same:password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => Role::find(2)->id,
            'vuelo_id' => null,
        ]);
    }

    public function register(Request $request){
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $rol=Role::find(2);
        $user->role()->associate($rol);
        $user->verification_code = Str::random(6);
        $user->save();
        $pedido=new Pedido();
        $pedido->total=0;
        $pedido->usuario()->associate($user)->save();
        if($user != null){
            MailController::sendSignUpEmail($user->nombre,$user->email,$user->verification_code);
            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check your email for verification link'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong'));
    }

    public function verifyUser(){
        $verification_code = FacadesRequest::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('register')->with(session()->flash('alert-success', 'Your account is verified. Please login'));
        }
        return redirect()->route('register')->with(session()->flash('alert-danger', 'Invalid verification code'));
    }

}
