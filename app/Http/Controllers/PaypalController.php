<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal;

class PaypalController extends Controller
{

    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => 0.1
                    ],
                    "description" => 'test'
                ]
            ]
        ]);
       
      
        DB::beginTransaction();
        $newOrder = Order::create([
            'users_id' => $data['user_id'],
            'shippings_id' => $data['shippings_id'],
            'vendor_order_id' => $order['id'],
            'type' => 'card',
            'status' => 'PENDING',
        ]);
       
        Order_detail::create([
            'products_id' => $data['products_id'],
            'orders_id' => $newOrder->id,
            'quantity' => $data['quantity'],
        ]);

        Transaction::create([
            'orders_id' => $newOrder->id,
            'vendor_order_id' => $order['id'],
            'status' => 'PENDING',
        ]);
        DB::commit();
        return response()->json($order);
    }

    public function capture(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];

        // Init PayPal
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $result = $provider->capturePaymentOrder($orderId);
        try {
            DB::beginTransaction();
            if ($result['status'] === "COMPLETED") {
                $transaction = Transaction::where('vendor_order_id', $orderId)->first();
                $transaction->status = 'COMPLETED';
                $transaction->update();
                $order = Order::where('vendor_order_id', $orderId)->first();
                $order->transactions_id = $transaction->id;
                $order->status = 'COMPLETED';
                $order->update();
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }

        return response()->json($result);
    }

    public function cancle(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderID = $data['orderID'];

        // Init PayPal
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $result = $provider->capturePaymentOrder($orderID);
        $order = Transaction::where('reference_number', $orderID)->first();
        Order::where('id', $order->order_id)->delete();
    }
}
