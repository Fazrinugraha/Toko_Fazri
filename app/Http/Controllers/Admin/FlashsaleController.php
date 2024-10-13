<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flashsale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FlashsaleController extends Controller
{
    // Menampilkan daftar flashsale
    public function index()
    {
        $flashsales = Flashsale::all();
        return view('pages.admin.flashsale.index', compact('flashsales'));
    }

    // Menampilkan form untuk menambah flash sale
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.flashsale.create', compact('products')); 
    }

    // Menyimpan flash sale
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id', 
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Flashsale::create($request->all()); 
        Alert::success('Berhasil!', 'Flash Sale berhasil ditambahkan');
        return redirect()->route('admin.flashsales'); 
    }
    public function detail($id)
    {
        $flashsale = Flashsale::find($id);
        return view('pages.admin.flashsale.detail', compact('flashsale')); 
    }
      // Menampilkan form untuk edit flash sale
    public function edit($id)
    {
        $flashsale = Flashsale::find($id);
        $products = Product::all();
        return view('pages.admin.flashsale.edit', compact('flashsale', 'products')); 
    }

      // Mengupdate flash sale
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id', 
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $flashsale = Flashsale::find($id);
        $flashsale->update($request->all());
        Alert::success('Berhasil!', 'Flash Sale berhasil diupdate');
        return redirect()->route('admin.flashsales'); 
    }
    public function delete($id)
    {
        Alert::warning('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        $flashsale = Flashsale::findOrFail($id);
        $flashsale->delete();

        if ($flashsale) {
            Alert::success('Berhasil!', 'Flash Sale berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal dihapus!');
            return redirect()->back();
        }
    }
    public function detailFlashSale($id)
    {
        $flashsale = Flashsale::find($id);
        if (!$flashsale) {
            return redirect()->route('user.dashboard')->with('error', 'Flash Sale tidak ditemukan.');
        }
        return view('pages.user.detail', compact('flashsale'));
    }
}
