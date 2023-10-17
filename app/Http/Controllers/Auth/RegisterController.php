<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::LOGIN;
    // protected $redirectTo;
    // public function redirectTo()
    // {
    // //    dd(Auth::user()->role);
    //     // switch(Auth::user()->role){
    //     //     case 2:
    //     //     $this->redirectTo = '/owner';
    //     //     return $this->redirectTo;
    //     //         break;
    //     //     case 4:
    //     //             $this->redirectTo = '/manager';
    //     //         return $this->redirectTo;
    //     //         break;
    //     //     case 3:
    //     //         $this->redirectTo = '/cashier';
    //     //         return $this->redirectTo;
    //     //         break;
    //     //     case 5:
    //     //             $this->redirectTo = '/waiter';
    //     //         return $this->redirectTo;
    //     //         break;
    //     //     case 6:
    //     //         $this->redirectTo = '/kitchen';
    //     //         return $this->redirectTo;
    //     //         break;
    //     //     case 1:
    //     //         $this->redirectTo = '/admin';
    //     //         return $this->redirectTo;
    //     //         break;
    //     //     default:
    //     //         $this->redirectTo = '/login';
    //     //         return $this->redirectTo;
    //     // }
    //     $this->redirectTo = '/login';
    //     return $this->redirectTo;
    // } 

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
        
        $restaurant_id = 'EPOS' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

        // Ensure the generated restaurant_id is unique
        while (User::where('restaurant_id', $restaurant_id)->exists()) {
            $restaurant_id = 'EPOS' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        }

        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'state' => "Maharashtra",
            'role' => $data['role'],
            'status_id' => 1,
            'restaurant_id' => $restaurant_id,
        ]);
    }
}