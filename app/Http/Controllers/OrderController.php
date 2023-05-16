<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    // Final Invoice Method
    public function FinalInvoice(Request $request)
    {

        $rtotal = $request->total;
        $rpay = $request->payNow;
        $mtotal = $rtotal - $rpay;


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
        $data['due'] = $mtotal;
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

        $product = OrderDetail::where('order_id',$order_id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['product_store' => DB::raw('product_store-' . $item->quantity)]);
        }

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
    public function ManageStock()
    {

        $product = Product::latest()->get();
        return view('backend.stock.all_stock', compact('product'));
    } // End Method

    // Order Invoice Download
    public function InvoiceDownload($id){

        $order = Order::where('id', $id)->first();

        $orderItem = OrderDetail::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    } // End Method

    //////////// Due /////////////

    // pending due method
    public function PendingDue(){

            $alldue = Order::where('due','>','0')->orderBy('id','DESC')->get();
            return view('backend.order.pending_due',compact('alldue'));
    }// End Method

    // order due method
    public function OrderDueAjax($id){
        $order = Order::findOrFail($id);
        return response()->json($order);
    } // End Method

    // Update Due Method
    public function UpdateDue(Request $request){

        $orderId = $request->id;
        $payAmount = $request->pay;
        $dueAmmount = $request->due;

        $allOrder = Order::findOrFail($orderId);
        $mainDue = $allOrder->due;
        $mainPay = $allOrder->pay;

        $paidDue = $mainDue - $dueAmmount;
        $paidPay = $mainPay + $dueAmmount;

        Order::findOrFail($orderId)->update([
            'pay' =>$paidPay,
            'due' =>$paidDue,
        ]);

        $noti = [
            'message' => 'Order Done  Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('pending#due')->with($noti);

    } // End Method
}
