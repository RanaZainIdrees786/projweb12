<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MyAuthController extends Controller
{
    public function loginPage()
    {
        return view("auth.login");
    }
    public function registerPage()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('login-page');
    }
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'email does not exists');
        }


        if (Hash::check($request->password, $user->password)) {
            // Log the user in or continue
            // Generate a random 4-digit number (1000–9999)
            // $otp = rand(1000, 9999);
            // $response = Http::asForm()->withToken('FPd0Iq5qxLETJefyWRYT2dt9sF3UenJtvTW')->post('https://api.360messenger.com/v2/sendMessage', [
            //     'phonenumber' => $user->contact_number,
            //     'text' => 'Hello World!' . $user->name . '. Your otp is ' . $otp
            // ]);

            // Handle response
            // if ($response->successful()) {
            //     return "whatsapp message  sent successfully";
            // } else {
            //     return "error in messag successfully";
            // }
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                if ($user->is_admin == 0) {
                    return redirect()->route('fruitable-index');
                }

                return redirect()->route('admin-index');

            }

        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
