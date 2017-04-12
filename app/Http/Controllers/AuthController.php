<?php

namespace App\Http\Controllers\Auth;

use App\Mahasiswa;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

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
    use App\Repositories\MahasiswaRepository;
    use App\Mahasiswa;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $username = 'username';
    protected $mahasiswaRepo;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(MahasiswaRepository $mahasiswaRepo)
    {
        $this->mahasiswaRepo = $mahasiswaRepo;
    }

    public function authenticate(Request $request){
        $tempMahasiswa = $this->mahasiswaRepo->findMahasiswaByUsername($request->username);4
        // dd($username, $password);
        return view ('/home_mahasiswa');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login_mahasiswa')
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
            'name' => 'required',
            'username' => 'required'
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' > $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
