<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            $authRole = Auth::user()->role;

            switch ($authRole) {
                case 'admin':
                    return redirect()->route('dashboard')->with(['success' => 'Login Succussfully!']);
                    break;

                default:
                    return redirect()->route('home')->with(['success' => 'Login Succussfully!']);
                    break;
            }

            return redirect()->back()->with(['authError' => 'Email & password are not matched in our records!']);
        }
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $user = User::create($data);

            Auth::login($user);

            return redirect()->route('home')->with(['success' => 'Account Created Successfully']);
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());

            return redirect()->back()->with(['error' => 'Something went wrong!']);
        }
    }

    public function logout(Request $request, $id)
    {
        Auth::logout($id);

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['success' => 'Logged Out Successfully!']);
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }
}
