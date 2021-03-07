<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserInfo;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mockery\Exception;

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
    protected $redirectTo = '/home';

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
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/profile-wizard';
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function registerView()
    {
        return view('register');
    }

    protected function validator(array $data)
    {
        if($data['type'] == 'email') {
            if (User::where('email', $data['email'])->get()->count() != 0) {
                throw new Exception('Duplication of Email.');
            }
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255','min:5'],
                'password' => ['required', 'string', 'min:6'],
            ]);
        }
        else{
            if (User::where('phone',$data['phone'])->get()->count() != 0) {
                throw new Exception('Duplication of Phone.');
            }
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255','min:5'],
                'password' => ['required', 'string', 'min:6'],
            ]);
        }


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */


    public function register(Request $request)
    {

        try {
            $this->validator($request->all())->validate();
            $user = $this->create($request->all());
            event(new Registered($user));
//            $this->guard()->login($user);
        }
        catch(\Exception $exception){

            return redirect()->back()->withErrors(['email' => $exception->getMessage()]);;
        }

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    protected function create(array $data)
    {

        if($data['type'] == 'email') {
            $user = User::create([
                'role_id' => 2,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_active' => 0
            ]);
        }
        else{
            $user = User::create([
                'role_id' => 2,
                'name' => $data['name'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'is_active' => 0
            ]);
        }

        UserInfo::create(['user_id'=>$user->id]);
        Address::create(['user_id'=>$user->id]);

        return $user;
    }
}
