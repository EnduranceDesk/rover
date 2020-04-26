<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LinuxUser;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Handle a login request to the application by overriding default method.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }
    public function attemptLogin(Request $request)
    {
        if (LinuxUser::validate($request->input("username"), $request->input("password"))) {
            return true;
        } else {
            return false;
        }
    }
    protected function sendLoginResponse(Request $request)
    {
        // Building the new user if not there
        if (!$request->input("username")) {
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }
        if ($request->input("username") == "root") {
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }
        if (User::where("username", $request->input("username"))->count() === 0) {
            $user = new User;
            $user->name = $request->input("username");
            $user->username = $request->input("username");
            $user->email = $request->input("username") . "@localhost";
            $user->save();
        } elseif (User::where("username", $request->input("username"))->count() === 1) {
            $user = User::where("username", $request->input("username"))->first();
        } else {
            die("POSSIBLE SECURITY ISSUE. CONTACT SUPPORT.");
        }
        Auth::login($user);
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        return redirect()->intended($this->redirectPath());
    }
}
