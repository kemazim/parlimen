<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gred;
use App\Models\Pejabat;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\SpecificDomainsOnly;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

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
            'nomborKadPengenalan' => ['required', 'string', 'min:12','max:12','unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new SpecificDomainsOnly],
            'nomborTelefonBimbit' => ['required', 'string', 'min:11','max:13'],
            'gred_id' => ['required'],
            'pejabat_id' => ['required'],
            'noTelPej' => ['required'],
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
            'nomborKadPengenalan' => $data['nomborKadPengenalan'],
            'nama' =>  $data['nama'],
            'email' =>  $data['email'],
            'gred_id' =>  $data['gred_id'],
            'pejabat_id' =>  $data['pejabat_id'],
            'noTelPej' =>  $data['noTelPej'],
            'nomborTelefonBimbit' =>  $data['nomborTelefonBimbit'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $gred = Gred::pluck('nama', 'id');
        $pejabat = Pejabat::pluck('nama', 'id');

        return view('auth.register', ['gred' => $gred, 'pejabat' => $pejabat]);

    }
}
