<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?'); // Konfirmasi Hapus Distributor
        return view('pages.admin.distributor.index', compact('distributors'));
    }
    
    // Function Tambah Distributor

    public function create()
    {
        return view('pages.admin.distributor.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_distibutor' => 'required|string|max:255', 
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the distributor
        $distributor = Distributor::create([
            'nama_distibutor' => $request->nama_distibutor,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        if ($distributor) {
            Alert::success('Berhasil!', 'Distributor berhasil ditambahkan!');
            return redirect()->route('admin.distributor');
        } else {
            Alert::error('Gagal!', 'Distributor gagal ditambahkan!');
            return redirect()->back();
        }
    }

    // Function Detail Distributor
    public function detail($id)
    {
        $distributor = Distributor::findOrFail($id); // Fetch a single distributor by ID
        
        return view('pages.admin.distributor.detail', compact('distributor'));
    }

    // Function Edit dan Update Distributor
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('pages.admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_distibutor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        Alert::success('Berhasil!', 'Distributor berhasil diperbarui!');
        return redirect()->route('admin.distributor');
    }

    // Function Hapus Distributor
    public function delete($id)
    {
        $distributor = Distributor::findOrFail($id);

        if ($distributor) {
            $distributor->delete();
            Alert::success('Berhasil!', 'Distributor berhasil dihapus!');
            return redirect()->route('admin.distributor');
        } else {
            Alert::error('Gagal!', 'Distributor gagal dihapus!');
            return redirect()->back();
        }
    }
}
