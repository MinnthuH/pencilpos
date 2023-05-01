<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    // Final Invoice Method
    public function FinalInvoice(Request $request)
    {

        $data = array();
        $data['customer_id'] = $request->customerId;
        $data['order_date'] = $request->orderDate;
        $data['order_status'] = $request->orderStaus;
        $data['total_products'] = $request->porductCount;
        $data['sub_total'] = $request->subTotal;
        $data['invoice_no'] = 'pos' . mt_rand(10000000, 99999999);
        $data['total'] = $request->total;
        $data['paymet_status'] = $request->paymetnStatus;
        $data['pay'] = $request->payNow;
        $data['due'] = $request->dueAmount;
        $data['created_at'] = Carbon::now();

        $order_id = Order::insertGetId($data);
        $contents = Cart::content();

        $pdata = array();
        foreach ($contents as $content) {
            $pdata['order_id'] = $order_id;
            $pdata['product_id'] = $content->id;
            $pdata['quantity'] = $content->qty;
            $pdata['unitcost'] = $content->price;
            $pdata['total'] = $content->price;
            $pdata['total'] = $content->total;
            $pdata['created_at'] = Carbon::now();

            OrderDetail::insert($pdata);

        } // end foreach
        $noti = [
            'message' => 'Order Complete Successfully',
            'alert-type' => 'success',
        ];

        Cart::destroy();

        return redirect()->route('pos')->with($noti);

    } // End Method

    // Pending Order Method
    public function PendingOrder()
    {

        $order = Order::where('order_status', 'pending')->get();
        return view('backend.order.pending_order', compact('order'));

    } // End Method

    // Detail Order Mehtod
    public function DetailOrder($id)
    {
        $order = Order::where('id', $id)->first();

        $orderItem = OrderDetail::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        return view('backend.order.detail_order', compact('order', 'orderItem'));

    } //End Method

    // Update Order Status Method
    public function UpdateStatus(Request $request)
    {

        $order_id = $request->id;

        Order::findOrFail($order_id)->update(['order_status' => 'complete']);

        $noti = [
            'message' => 'Order Done  Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('pending#order')->with($noti);
    } // End Method

      // Pending Order Method
      public function CompleteOrder()
      {
          $order = Order::where('order_status', 'complete')->get();
          return view('backend.order.complete_order', compact('order'));

      } // End Method

      // Manage Stock Method
      public function ManageStock (){

        $product = Product::latest()->get();
        return view('backend.stock.all_stock',compact('product'));
      } // End Method
}
