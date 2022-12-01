<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $userId = auth()->user()->id;

        $cartUsers = Transactions::where('user_id', $userId)->with('product')->get();

        return view('application.website.cart', [
            'cartUsers' => $cartUsers,
        ]);
    }

    public function find(Request $request, $productId)
    {

        $product = Products::where('id', $productId)->first();
        $sub_total = $product->harga * 1;

        $newCart = new Transactions();
        $newCart->user_id = auth()->user()->id;
        $newCart->product_id = $product->id;
        $newCart->sub_total = $sub_total;
        $newCart->qty = 1;
        $newCart->status_pembayaran = 'Belum Dibayar';
        $newCart->save();

        return redirect()->back()->with('success', 'Succesfully Add To Cart');
    }

    public function getCoupon(Request $request) {
        $userId = auth()->user()->id;

        $cartUsers = Transactions::where('user_id', $userId)->with('product')->get();

        foreach ($cartUsers as $cartUser) {
            if ($request->discount_code == 'FA111') {
                $couponDiscount = 10;
                $sub_total = $cartUser->sub_total * $cartUser->qty;
                $discount = (($sub_total * $couponDiscount)/100);
                $total_bayar = ($sub_total - $discount);

                $cartUser->discount = $couponDiscount;
                $cartUser->discount_cod = $request->discount_code;
                $cartUser->sub_total = $total_bayar;
                $cartUser->save();
            } elseif ($request->discount_code == 'FA222' && $cartUser->product->kode_barang == 'FA4532') {
                $couponDiscount = 50000;
                $sub_total = $cartUser->sub_total * $cartUser->qty;
                $discount = $sub_total - $couponDiscount;

                $cartUser->discount = $couponDiscount;
                $cartUser->discount_cod = $request->discount_code;
                $cartUser->sub_total = $discount;
                $cartUser->save();
            } elseif ($request->discount_code == 'FA333' && $cartUser->product->harga >= 400000) {
                $couponDiscount = 6;
                $sub_total = $cartUser->sub_total * $cartUser->qty;
                $discount = (($sub_total * $couponDiscount)/100);
                $total_bayar = ($sub_total - $discount);

                $cartUser->discount = $couponDiscount;
                $cartUser->discount_cod = $request->discount_code;
                $cartUser->sub_total = $total_bayar;
                $cartUser->save();
            } else {
                return redirect()->back()->with('error', 'Sorry Anda Mendapatkan Coupon');
            }
        }

        return redirect()->back()->with('success', 'Succesfully Add Coupon Discount');
    }

    public function deleteCoupon(Request $request) {
        $userId = auth()->user()->id;
        Transactions::where('user_id', $userId)->where('id', $request->cart_user_id)->delete();

        return redirect()->route('application.admin.cart.index');

    }

    public function changeQtyCoupon(Request $request) {
        $userId = auth()->user()->id;
        $transaction = Transactions::where('id', $request->cart_user_id)->where('user_id', $userId)->first();
        $transaction->qty = $request->qty_change;
        $transaction->save();

        return redirect()->route('application.admin.cart.index');
    }
}
