<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Distributor;
use App\Models\Flashsale;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::count();
        $users = User::count();
        $distributors = Distributor::count();
        $flashsales = Flashsale::count();
        $admins = Admin::count();

        return view('pages.admin.index', compact('products', 'users', 'distributors', 'flashsales','admins'));
    }

    public function index()
    {
        $admins = Admin::all();
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('pages.admin.admin.index', compact('admins'));
    }
    
    public function create()
    {
        return view('pages.admin.admin.create'); 
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|string|min:8|max:15', 
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create admin
        $admin = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($admin) {
            Alert::success('Berhasil!', 'Admin berhasil ditambahkan!');
            return redirect()->route('admin.admin');
        } else {
            Alert::error('Gagal!', 'Admin gagal ditambahkan!');
            return redirect()->back();
        }
    }

    // Function Detail Admin
    public function detail($id)
    {
        $admin = Admin::findOrFail($id);
        return view('pages.admin.admin.detail', compact('admin'));
    }

    // Function Edit Admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('pages.admin.admin.edit', compact('admin'));
    }

    // Function Update Admin
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8|max:15', // Password is optional
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->username = $request->username; // Ensure username is updated
        $admin->email = $request->email;

        // Only update password if provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save(); // Save the changes

        Alert::success('Berhasil!', 'Admin berhasil diperbarui!');
        return redirect()->route('admin.admin');
    }

    // Function Hapus Admin
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin) {
            $admin->delete();
            Alert::success('Berhasil!', 'Admin berhasil dihapus!');
            return redirect()->route('admin.admin');
        } else {
            Alert::error('Gagal!', 'Admin gagal dihapus!');
            return redirect()->back();
        }
    }
}