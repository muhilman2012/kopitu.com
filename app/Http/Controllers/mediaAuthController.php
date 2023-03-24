<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users_validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class mediaAuthController extends Controller
{
    // this login with google API
    // Google login API
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        if(session('cart')){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('index');
        }
        // return redirect()->route('index');
    }
    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {

            // vkey from email user
            $email = $data->email;
            $Vkey = md5(time() . $email);
            $sluger = Str::slug($data->name);

            // name of foto user
            $id = $data->id;
            $fotoname = "USER-" . $id . ".png";

            $user = User::create([
                'username' => $data->name,
                'slug' => $sluger,
                'email'    => $data->email,
                'password' => bcrypt("123456dummylumbungdeso"),
                'avatar'   => $fotoname
            ]);

            users_validation::create([
                'id_users' => $user->id_users,
                'email'    => $data->email,
                'key'      => $Vkey,
                'active' => 1,
            ]);

            $foto = file_get_contents($data->avatar);
            file_put_contents(public_path('images/avatar/user/' .  $fotoname), $foto);
        }
        Auth::guard("user")->login($user);
    }
}
