<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PosController extends Controller
{
    // POS Dashboard Method
    public function Pos()
    {

        $todayDate = Carbon::now();
        $products = Product::where('expire_date', '>', $todayDate)->latest()->get();
        $customers = Customer::latest()->get();
        return view('backend.pos.pos_page', compact('products', 'customers'));
    } // End Method

    // Add Cart Method
    public function AddCart(Request $request)
    {
        Cart::add([
            ['id' => $request->id,
                'name' => $request->porductName,
                'qty' => $request->qty,
                'price' => $request->price,
                'options' => ['size' => 'large']],
        ]);
        $noti = [
            'message' => 'Product Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($noti);
    } // End Method

    // All Item Method
    public function AllItem()
    {

        $productItem = Cart::content();
        return view('backend.pos.text_item', compact('productItem'));
    } // End Mehtod

    // Update Cart Method
    public function UpdateCart(Request $request, $rowId)
    {

        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);

        $noti = [
            'message' => 'Cart Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($noti);

    } // End Method

    // cart remove method
    public function RemoveCart($rowId)
    {

        Cart::remove($rowId);
        $noti = [
            'message' => 'ဈေးခြင်းထဲမှ ဖယ်ရှားခြင်း အောင်မြင်ပါသည်',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($noti);
    } // End Method

    // CreateInvoice Method
    public function CreateInvoice(Request $request)
    {

        $cartItem = Cart::content();
        $customerId = $request->customerId;
        $customer = Customer::where('id', $customerId)->first();

        return view('backend.invoice.product_invoice', compact('cartItem', 'customer'));
    } // End Method
}
