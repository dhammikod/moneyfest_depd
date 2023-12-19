<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index()
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        if ($user->role != 'admin') {
            return 'invalid usage';
        } else {
            $users = User::all();
            return view('admin.dashboard', compact('users'));
        }
    }

    public function create()
    {
        // return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Buat pengguna baru
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
