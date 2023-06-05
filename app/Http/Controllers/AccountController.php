<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function create()
    {
        return view('accounts.register', [
            'title' => 'Sign up',
            'info' => "Have an account? ",
            'link' => 'accounts.login',
            'text' => 'Log in',
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'name' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users', 'username')],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create($validate);

        auth()->login($user, true);

        return redirect('/');
    }

    public function login()
    {
        return view('accounts.session', [
            'title' => 'Login',
            'info' => "Don't have an account? ",
            'link' => 'accounts.register',
            'text' => 'Sign up',
        ]);
    }

    public function session(Request $request)
    {
        $form_fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $form_fields['email'])->first();

        if (!isset($user)) {
            return back()->withErrors(['login_error' => 'Sorry, we could not find your account.']);
        }

        $check = Hash::check($form_fields['password'], $user->password);

        if (!$check) {
            return back()->withErrors(['login_error' => 'Sorry, your password was incorrect. Please double-check your password.'])->onlyInput('email');
        }

        if (auth()->attempt($form_fields)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back()->with('message', 'logged out success');
    }

    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) return view('notfound.404');

        return view('accounts.show', [
            'user' => $user,
            'title' => $user->name . " ($user->username)",
        ]);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
