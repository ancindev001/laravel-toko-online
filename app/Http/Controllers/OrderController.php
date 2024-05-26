<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{

    /**
     * List of orders
     */
    function index()
    {
        $status = [
            'onprocess' => 'warning',
            'delivered' => 'success',
            'waiting' => 'info',
            'ondelivery' => 'secondary',
            'reject' => 'danger',
            'cancel' => 'danger'
        ];
        if (Gate::allows('isAdmin')) {
            $order = Order::with(['details', 'user'])->get();
        } else {
            $order = Order::byUser()->with('details')->get();
        }
        return view('order', compact('order', 'status'));
    }

    function update(Request $request, Order $order)
    {
        if (Gate::allows('isAdmin')) {
            if (in_array($request->status, ['reject', 'ondelivery', 'onprocess'])) {
                $order->update([
                    'status' => $request->status
                ]);
            }
        }

        if (Gate::allows('isCustomer')) {
            if (in_array($request->status, ['cancel', 'delivered'])) {
                $order->update([
                    'status' => $request->status
                ]);
            }
        }

        return redirect()->back()->with('message', 'Success update');
    }

    function store()
    {
        // DB::beginTransaction();
        // DB::rollBack();
        // DB::commit();

        // cek apakah orderan sebelumnya sudah selesai ? kalau belum tidak boleh buat orderan lagi
        // tunggu sampai selesai dlu
        if (
            Order::byUser()->where('status', 'ondelivery')
            ->orWhere('status', 'onprocess')
            ->count() > 0
        ) {
            return redirect()->route('dashboard')->with('message', 'error');
        }

        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $total = collect($carts)->reduce(function ($val, $item) {
            return $val + ($item->qty * $item->product->price);
        }, 0);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'staff_id' => 1,
            'total' => $total,
            'status' => 'onprocess'
        ]);
        Cart::query()
            ->where('user_id', auth()->user()->id)
            ->each(function ($oldRecord) use ($order) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' =>  $oldRecord->product_id,
                    'qty' =>  $oldRecord->qty
                ]);

                // update stock
                Product::find($oldRecord->product_id)
                    ->update(['stock' => DB::raw('stock-' . $oldRecord->qty)]);
                $oldRecord->delete();
            });

        return redirect()->route('order.index')->with('message', 'order berhasil dibuat');
    }

    function show(Order $order)
    {
        $orders = OrderDetail::byOrderId($order->id)->with('product')->get();
        return view('order-details', compact('orders', 'order'));
    }



    // function storex(Product $product)
    // {
    //     // cek transaction apabila ada dengan product yg sama
    //     // $count = TransactionDetail::whereHas('transaction', function ($q) {
    //     //     $q->where('status', '');
    //     // })->where('product_id', $product->id);

    //     $tr = Transaction::where('status', '')->where('user_id', auth()->user()->id);


    //     if ($tr->count() == 0) {
    //         // create tr
    //         $transaction = Transaction::create([
    //             'user_id' => auth()->user()->id,
    //             'petugas_id' => 1,
    //         ]);
    //     }

    //     $prod = TransactionDetail::where('transaction_id', $tr->first()->id)
    //         ->where('product_id', $product->id);

    //     if ($prod->count() == 0) {
    //         TransactionDetail::create([
    //             'transaction_id' => $tr->first()->id,
    //             'product_id' => $product->id,
    //             'qty' => 1,
    //             'subtotal' => $product->harga
    //         ]);
    //         return redirect()->back()->with('message', 'Success add transaction');
    //     } else {
    //         $prod = $prod->first();
    //         $prod->qty = $prod->qty + 1;
    //         $prod->subtotal = $prod->product->harga * $prod->qty;
    //         $prod->save();
    //         return redirect()->back()->with('message', 'Success update qty');
    //     }



    //     // } else {
    //     //     // update
    //     //     $prod = TransactionDetail::whereHas('transaction', function ($q) {
    //     //         $q->where('status', '');
    //     //     })->where('product_id', $product->id)->first();
    //     //     $prod->qty = $prod->qty + 1;
    //     //     $prod->subtotal = $prod->product->harga * $prod->qty;
    //     //     $prod->save();
    //     //     return redirect()->back()->with('message', 'Success update qty');
    //     // }


    //     // if ($count->count() > 0) {
    //     //     // update
    //     //     $prod = TransactionDetail::whereHas('transaction', function ($q) {
    //     //         $q->where('status', '');
    //     //     })->where('product_id', $product->id)->first();
    //     //     $prod->qty = $prod->qty + 1;
    //     //     $prod->subtotal = $prod->product->harga * $prod->qty;
    //     //     $prod->save();
    //     //     return redirect()->back()->with('message', 'Success update qty');
    //     // } else {
    //     //     // create

    //     //     $transaction = Transaction::create([
    //     //         'user_id' => auth()->user()->id,
    //     //         'petugas_id' => 1,
    //     //     ]);
    //     //     TransactionDetail::create([
    //     //         'transaction_id' => $transaction->id,
    //     //         'product_id' => $product->id,
    //     //         'qty' => 1,
    //     //         'subtotal' => $product->harga
    //     //     ]);
    //     //     return redirect()->back()->with('message', 'Success add transaction');
    //     // }
    // }
}
