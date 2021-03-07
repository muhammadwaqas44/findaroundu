<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function loginPost(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }



        if($request->type == 'email') {

            $credentials = [
                'email' => $request->email,
                "password" => $request->password,
                "is_active" => 1

            ];

            if (Auth::attempt($credentials)) {

                if (Auth::user()->role->name == "Admin") {
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->role->name == "Agent") {
                    return redirect()->route('agent.dashboard');
                }
                if (!empty($request->redirect_flag) && $request->redirect_flag == "business") {
                    return redirect()->route('user.new-business');
                } elseif (!empty($request->redirect_flag) && $request->redirect_flag == "service") {
                    return redirect()->route('user.add-service');
                } else {
                    if (isset($request->openJobModal) == 'open') {
                        if(Auth::user()->profile_complete == 0)
                        {
                            return redirect()->route('profile-wizard');
                        }
                        else {
                            return redirect()->route('home')->with(['openModal' => $request->openJobModal]);
                        }
                    } else {
                        if(Auth::user()->profile_complete == 0)
                        {
                            return redirect()->route('profile-wizard');
                        }
                        else {
                            return redirect()->route('user.dashboard');
                        }
                    }

                }
            }
        }

        else {

            $credentials = [
                'phone' => $request->phone,
                "password" => $request->password,
                "is_active" => 1

            ];

            if (Auth::attempt(['phone' => $request->phone, "password" => $request->password])) {

                if (!empty($request->redirect_flag) && $request->redirect_flag == "business") {
                    return redirect()->route('user.new-business');
                } elseif (!empty($request->redirect_flag) && $request->redirect_flag == "service") {
                    return redirect()->route('user.add-service');
                } else {
                    if (isset($request->openJobModal) == 'open') {

//                    Session::flash('openModal',$request->openJobModal);
                        return redirect()->route('home')->with(['openModal' => $request->openJobModal]);
                    } else {

                        return redirect()->route('user.dashboard');
                    }

                }

            }
        }
        return redirect()->back()->withErrors(['email' => "Wrong Credintials..."]);;
    }


    public function loginView(Request $request)
    {

        $data['flag'] = $request->redirect_flag;
        return view('login',compact('data'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function logout()
    {
        $user = null;
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $user->is_online = 0;
            $user->save();
            Auth::logout();
        }
        return redirect()->route('login');

    }

}
