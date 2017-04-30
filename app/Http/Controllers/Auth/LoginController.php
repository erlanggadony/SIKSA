<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Repositories\UserRepository;
use AuthenticatesUsers;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller{
  protected $usersRepo;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // protected $redirectToMahasiswa = '/home_mahasiswa';
    // protected $redirectToPejabat = '/home_pejabat';
    // protected $redirectToTU = '/home_TU';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo){
        // $this->middleware('guest', ['except' => 'logout']);
        $this->usersRepo = $usersRepo;
    }

    public function Login(Request $request){
        $rules = array(
          'username' = 'required',  //memastikan username diisi
          'password' = 'required|min:8' //memastikan password diisi dan min 8 karakter
        );
        $validator = validator(Input::all(), $rules);

        if($validator->fails()){
          return redirect('/login')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
        }
        else{
          $userData = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
          );
          if(Auth::guard()->attempt($userData)){
            return redirect('home_mahasiswa');
          }
          else{
            return redirect('/login');
          }
        }
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required',
            'username' => 'required'
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
        ]);
    }
}
