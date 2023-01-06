<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Controllers\API\ResponseFormatter;

class CheckoutController extends Controller
{
    public function checkout(TransactionRequest $request)
    {
        $data = $request->except("transaction_details");
        $data["uuid"] = "TRX".mt_rand(10000,99999).mt_rand(100,999);
        $transaction_total = 0;
        foreach($request->transaction_details as $product_total_price){
            $product = Product::find($product_total_price);
            $transaction_total += $product->price;
        }
        $data["transaction_total"] = $transaction_total;
        $transaction = Transaction::create($data);

        foreach($request->transaction_details as $product)
        {
            $details[] = new TransactionDetail([
                "transaction_id" => $transaction->id,
                "product_id" => $product    
            ]);
            
            Product::find($product)->decrement("quantity");
        }

        $transaction->TransactionDetails()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
