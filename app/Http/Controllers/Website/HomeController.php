<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Products::orderBy('id','asc')->get();

        return view('application.website.index', [
            'products' => $products,
        ]);
    }
}
