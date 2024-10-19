<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('pages.admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.user.create'); 
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:15', 
            'point' => 'required|integer', 
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user with a default point value if not specified
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'point' => $request->point ?: 10000, 
        ]);

        if ($user) {
            Alert::success('Berhasil!', 'User  berhasil ditambahkan!');
            return redirect()->route('admin.user');
        } else {
            Alert::error('Gagal!', 'User  gagal ditambahkan!');
            return redirect()->back();
        }
    }

    // Function Detail Distributor
    public function detail($id)
    {
        $user = User::findOrFail($id); 
        
        return view('pages.admin.user.detail', compact('user'));
    }

     // Function Edit User
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    // Function Update User
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:15', // Password is optional
            'point' => 'required|integer',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Only update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->point = $request->point;
        $user->save();

        Alert::success('Berhasil!', 'User  berhasil diperbarui!');
        return redirect()->route('admin.user');
    }

     // Function Hapus Distributor
    public function delete($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            Alert::success('Berhasil!', 'User berhasil dihapus!');
            return redirect()->route('admin.user');
        } else {
            Alert::error('Gagal!', 'User gagal dihapus!');
            return redirect()->back();
        }
    }
}