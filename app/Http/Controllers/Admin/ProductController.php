<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Products::orderBy('id','asc')->get();

        return view('application.admin.product.index', [
            'products' => $products,
        ]);
    }

    public function create() {
        return view('application.admin.product.create');
    }

    public function store(Request $request) {

        $this->validate($request,[
            'name' => 'required',
            'kode_barang' => 'required',
            'price' => 'required',
            'image' => 'mimes:png,jpge,jpg',
            'qty' => 'required'
        ]);

        $image_url = '';
        if ($request->file('image')) {
            $image_url = $request->file('image')->store('product');
        }

        $newProduct = new Products();
        $newProduct->name = $request->name;
        $newProduct->kode_barang = $request->kode_barang;
        $newProduct->image = $image_url;
        $newProduct->harga = $request->price;
        $newProduct->qty = $request->qty;
        $newProduct->save();

        return redirect()->back()->with('success', 'Succesfully Created Product');
    }
}
