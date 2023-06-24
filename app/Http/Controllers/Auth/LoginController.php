<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    }

    public function login(Request $request)
    {
        // return 'a';
        // $u = User::find(1);
        // $u->password = Hash::make('admin');
        // $u->save();
        // return $u;
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin') {
                # code...
                // return redirect('/admin-dashboard');
                return response()->json([
                    'status'=>'200',
                    'message'=>'Login success! Welcome back',
                    'link'=>'/admin-dashboard'
                ]);
            }else {
                # code...
                return response()->json([
                    'status'=>'400',
                    'message'=>'Maaf hanya admin yang diperbolehkan masuk'
                ]);
            }
        } else {
            // return redirect()->back()
            //     ->with('error', 'periksa username & password (NIK)');
            return response()->json([
                'status'=>'400',
                'message'=>'Maaf periksa kembali username anda'
            ]);
        }
    }
}
