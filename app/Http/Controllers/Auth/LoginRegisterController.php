<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;

class LoginRegisterController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.akun.create', compact('users'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'admin'
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route($user->usertype === 'admin' ? 'admin.dashboard' : 'dashboard')
                         ->with('success', 'You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->route(Auth::user()->usertype === 'admin' ? 'admin.dashboard' : 'dashboard')
                             ->with('success', 'You have successfully logged in!');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])
                     ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have logged out successfully!');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'usertype' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'usertype' => $request->usertype
        ]);

        return redirect()->route('akun.edit', $id)->with('success', 'Data Berhasil Diubah!');
    }

    public function updateEmail(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:250|unique:users,email,' . $id
        ]);

        $user = User::findOrFail($id);
        $user->update(['email' => $request->email]);

        return redirect()->route('akun.edit', $id)->with('success', 'Email Berhasil Diubah!');
    }

    public function updatePassword(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('akun.edit', $id)->with('success', 'Password Berhasil Diubah!');
    }

    public function destroy($id): RedirectResponse
    {
        $siswa = Siswa::where('id_user', $id)->first();

        if ($siswa) {
            $this->destroySiswa($siswa->id);
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->route('akun.index')->with('success', 'Akun Berhasil Dihapus');
    }

    public function destroySiswa($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->image) {
            Storage::delete('public/siswa/' . $siswa->image);
        }

        $siswa->delete();
    }
}
 