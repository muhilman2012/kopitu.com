<?php

namespace App\Http\Controllers;

use App\Mail\resetPassword;
use App\Mail\verifikasi;
use App\Models\User;
use App\Models\users_validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request){
        $messages = [
            'email.required' => 'Masukan alamat email!',
            'email.min' => 'Oops sepertinya bukan email!',
            'email.email' => 'Alamat email anda salah!',
            'email.max' => 'Oops email melampaui batas!',
    
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Oops password terlalu pendek!',
        ];

        $validate = Validator::make($request->all(), [
            'email' => 'required|min:4|email|max:255',
            'password' => 'required|min:8',
        ], $messages);

        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $cek = users_validation::where('email', $request->email)->first();
            if($cek){
                if($cek->active == 1){
                    $data = User::find($cek->id_users);
                    if (Hash::check($request->password, $data->password)) {
                        Auth::guard('user')->login($data);
                        if(session('cart')){
                            return redirect()->route('checkout');
                        }else{
                            return redirect()->route('index');
                        }
                    } else {
                        return back()->withInput()->with('error', 'Oops password anda salah!');
                    }
                }else{
                    return back()->with('error', 'Akun anda belum terverifikasi silahkan cek email!');
                }
            }else{
                return back()->with('error', 'Oops alamat email kamu salah!');
            }
        }
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request){
        $validate = Validator::make($request->all(), [
            'username' => 'required|max:100',
            'email' => 'required|min:8|email|max:255',
            'password' => 'required|confirmed|min:10'
        ], [
            'username.required' => 'Masukan alamat email',
            'username.max' => 'Username tidak lebih dari 100',

            'email.required' => 'Masukan alamat email!',
            'email.min' => 'Oops sepertinya bukan email!',
            'email.email' => 'Alamat email anda salah!',
            'email.max' => 'Oops email melampaui batas!',

            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Oops password terlalu pendek!',
            'password.confirmed' => 'Oops sepertinya password tidak sama!',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        } else {
            try {
                $avatar = "sample-avatar.png";
                $slug = Str::slug($request->username);
                $key = md5($request->password);
                $details = [
                    'email' => $request->email,
                    'username' => $request->username,
                    'key' => $key
                ];
                Mail::to($request->email)->send(new verifikasi($details));
                $user = User::create([
                    'username' => $request->username,
                    'slug' => $slug,
                    'email'    => $request->email,
                    'password' => bcrypt($request->password),
                    'avatar'   => $avatar
                ]);
                users_validation::create([
                    'email' => $request->email,
                    'key' => $key,
                    'active' => 0,
                    'id_users' => $user->id_users
                ]);
                return redirect()->back()->with('success', 'Pendaftaran Berhasil! Silahkan periksa Email anda untuk Verifikasi');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Maaf, Layanan sedang sibuk, Coba lagi nanti!');
            }
        }
    }
    public function registerActived($key)
    {
        $datas = users_validation::where('key', $key)->first();
        if($datas){
            $datas->active = 1;
            $datas->save();
            $user = User::find($datas->id_users);
            if ($user) {
                Auth::guard('user')->login($user);
                return redirect()->route('index')->with('success', 'Yay validasi email kamu sudah berhasil');
            } else {
                return session()->flash('error', 'Oops validasi email kamu telah berakhir!');
            }
        }else{
            abort(500);
        }
    }

    public function logout()
    {
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect()->route('index');
        }
    }

    public function password()
    {
        return view('auth.password');
    }
    public function passwordPost(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|min:8|email|max:255',
        ], [
            'email.required' => 'Masukan alamat email!',
            'email.min' => 'Oops sepertinya bukan email!',
            'email.email' => 'Alamat email anda salah!',
            'email.max' => 'Oops email melampaui batas!',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Oops Email yang kamu masukan salah');
        }else{
            $data = User::where('email', $request->email)->first();
            if($data){
                $username = $data->username;
                $email = $data->email;
                $create_key = $data->email . date('YmdHis');
                $key = md5($create_key);
                $details = [
                    'username' => $username,
                    'email' => $email,
                    'key' => $key
                ];
                Mail::to($request->email)->send(new resetPassword($details));
                users_validation::where('email', $request->email)->update([
                    'key' => $key
                ]);
                return redirect()->back()->with('success', 'validasi telah dikirim ke alamat email kamu');
            }else{
                return redirect()->back()->with('error', 'Oops email yang kamu reset belum terdaftar!');
            }
        }
    }
    public function passwordReset($key){
        $data = users_validation::where('key', $key)->first();
        if($data){
            $user = User::find($data->id_users);
            return view('auth.passwordReset', [
                'user' => $user,
                'data' => $data
            ]);
        }else{
            return redirect()->route('password')->with('error', 'Oops Validasi email kamu telah berakhir');
            // dd($key);
        }
    }
    public function passwordResetAction(Request $request){
        $validate = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:10'
        ], [
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Oops password terlalu pendek!',
            'password.confirmed' => 'Oops sepertinya password tidak sama!',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->with('error', 'Password dan konfirmasi password kamu tidak sama');
        }else {
            $id = $request->id_users;
            $data = User::find($id);
            $data->password = bcrypt($request->password);
            if($data->save()){
                $create_key = $data->email . date('YmdHis');
                $key = md5($create_key);
                users_validation::where('id_users', $id)->update([
                    'key' => $key
                ]);
                return redirect()->route('login')->with('success', 'Yay password kamu berhasil direset silahkan login');
            }else{
                return redirect()->back()->with('error', 'Oops maaf database sedang dalam perbaikan');
            }
        }
    }

    public function loginEnabler()
    {
        return view('auth.loginEnabler');
    }
}
