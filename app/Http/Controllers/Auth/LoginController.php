<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:owner')->except('logout');
        $this->middleware('guest:cashier')->except('logout');
        $this->middleware('guest:manager')->except('logout');
        $this->middleware('guest:waiter')->except('logout');
        $this->middleware('guest:kitchen')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    public function showOwnerLoginForm()
    {
            return view('auth.login', ['url' => 'owner']);
    }

    public function ownerLogin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
    ]);
    if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/owner');
    }
    return back()->withInput($request->only('email', 'remember'));
    }

    public function showCashierLoginForm()
    {
            return view('auth.login', ['url' => 'cashier']);
    }
    public function cashierLogin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
    ]);
    if (Auth::guard('cashier')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/cashier');
    }
    return back()->withInput($request->only('email', 'remember'));
    }





    public function showManagerLoginForm()
    {
            return view('auth.login', ['url' => 'manager']);
    }

    public function managerLogin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
    ]);
    if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/manager');
    }
    return back()->withInput($request->only('email', 'remember'));
    }


    public function showWaiterLoginForm()
    {
            return view('auth.login', ['url' => 'waiter']);
    }
    public function waiterLogin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
    ]);
    if (Auth::guard('waiter')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/waiter');
    }
    return back()->withInput($request->only('email', 'remember'));
    }




    public function showKitchenLoginForm()
    {
            return view('auth.login', ['url' => 'kitchen']);
    }
    public function kitchenLogin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
    ]);
    if (Auth::guard('kitchen')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/kitchen');
    }
    return back()->withInput($request->only('email', 'remember'));
    }

}
