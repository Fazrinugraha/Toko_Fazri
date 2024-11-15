<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Distributor;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $data = DB::table('distributors')
                -> join('products', 'distributors.id', '=', 'products.id_distributor')
                -> select('distributors.*', 'products.*')
                -> get();
        
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?'); // Konfirmasi hapus product
        return view('pages.admin.product.index', compact('data'));
    }

    // Function Tambah Product
    public function create()
    {
        $distributor = DB::table('distributors')->get();
        return view('pages.admin.product.create', compact('distributor'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_distributor' => 'required|numeric',
            'name' => 'required',
            'price' => 'numeric',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }

        $product = Product::create([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        if ($product) {
            Alert::success('Berhasil!', 'Produk berhasil ditambahkan!');
            return redirect()->route('admin.product');
        } else {
            Alert::error('Gagal!', 'Produk gagal ditambahkan!');
            return redirect()->back();
        }
    }

    // Function Detail Product
    public function detail($id)
    {
        // $product = Product::findOrFail($id);
        $data = DB::table('distributors')
                -> join('products', 'distributors.id', '=', 'products.id_distributor')
                -> select('products.*', 'distributors.*')
                -> where('products.id','=',$id)
                -> first();

        return view('pages.admin.product.detail', compact('data'));
    }

    // Function Edit dan Update Product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $distributor = Distributor::all();

        return view('pages.admin.product.edit', compact('product','distributor'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_distributor' => 'required|numeric',
            'name' => 'required',
            'price' => 'numeric',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::findOrFail($id);

        // Handle file image if exists
        if ($request->hasFile('image')) {
            $oldPath = public_path('images/' . $product->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        } else {
            $imageName = $product->image; 
        }

        // Update product
        $product->update([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        if ($product) {
            Alert::success('Berhasil!', 'Produk berhasil diperbarui!');
            return redirect()->route('admin.product');
        } else {
            Alert::error('Gagal!', 'Produk gagal diperbarui!');
            return redirect()->back();
        }
    }

    // Function Hapus Product
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $oldPath = public_path('images/' . $product->image);
        if (File::exists($oldPath)){
            File::delete($oldPath);
        }
        $product->delete();

        if ($product){
            Alert::success('Berhasil!','Produk berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Produk gagal diHapus!');
            return redirect()->back();
        }
    }
}
