<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $income = Transaction::whereTransactionStatus("Sukses")->sum("transaction_total");
        $sales = Transaction::count();
        $transactions = Transaction::latest()->limit(5)->get();
        $pie = [
            "Pending" => Transaction::whereTransactionStatus("Pending")->count(),
            "Sukses" => Transaction::whereTransactionStatus("Sukses")->count(),
            "Gagal" => Transaction::whereTransactionStatus("Gagal")->count(),
        ];
        return view('pages.dashboard', [
            "income" => $income,
            "sales" => $sales,
            "transactions" => $transactions,
            "pie" => $pie
        ]);
    }
}
