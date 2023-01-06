<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, Transaction $transaction)
    {
        $product = Transaction::with("TransactionDetails.Product")->find($transaction->id);
        if($product)
            return ResponseFormatter::success($product, "Data ditemukan");
        return ResponseFormatter::error("Data tidak ditemukan", 404);
    }
}
