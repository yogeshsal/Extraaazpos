<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Cashier;
use App\Models\Manager;
use App\Models\Waiter;
use App\Models\Kitchen;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        $this->middleware('guest:admin');
        $this->middleware('guest:owner');
        $this->middleware('guest:cashier');
        $this->middleware('guest:manager');
        $this->middleware('guest:waiter');
        $this->middleware('guest:kitchen');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createOwner(Request $request)
    {
        $this->validator($request->all())->validate();
        $owner = Owner::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/owner');
    }

    protected function createCashier(Request $request)
    {
        $this->validator($request->all())->validate();
        $cashier = Cashier::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/cashier');
    }

    protected function createManager(Request $request)
    {
        $this->validator($request->all())->validate();
        $manager = Manager::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/manager');
    }

    protected function createWaiter(Request $request)
    {
        $this->validator($request->all())->validate();
        $waiter = Waiter::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/waiter');
    }

    protected function createKitchen(Request $request)
    {
        $this->validator($request->all())->validate();
        $kitchen = Kitchen::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/kitchen');
    }
    


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showOwnerRegisterForm()
    {
        return view('auth.register', ['url' => 'owner']);
    }

    public function showCashierRegisterForm()
    {
        return view('auth.register', ['url' => 'cashier']);
    }
    public function showManagerRegisterForm()
    {
        return view('auth.register', ['url' => 'manager']);
    }
    public function showWaiterRegisterForm()
    {
        return view('auth.register', ['url' => 'waiter']);
    }
    public function showKitchenRegisterForm()
    {
        return view('auth.register', ['url' => 'kitchen']);
    }
}
