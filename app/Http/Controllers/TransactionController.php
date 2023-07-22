<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        $no_urut = 1;
        return view('pages.transactions.index', [
            'transactions' => $transactions,
            'title' => 'Transaksi',
            'nomer' => $no_urut
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $no_urut = 1;
        return view('pages.transactions.create', [
            'products' => $products,
            'title' => 'Tambah transaksi baru',
            'nomer' => $no_urut
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $product = Product::findOrFail($request->product_id);
        if($request->quantity > $product->stock){
            return back()->with('error', 'Quantity melebihi stock, stock sekarang : ' . $product->stock);
        }

        // Update Stock
        $update_produk['stock'] = $product->stock - $request->quantity;
        $product->update($update_produk);

        Transaction::create($data);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $product = $transaction->products; // Mengambil produk yang terkait dengan transaksi

        // Mengembalikan stok produk dengan menambahkan kuantitas transaksi yang dihapus
        $update_produk['stock'] = $product->stock + $transaction->quantity;
        $product->update($update_produk);

        $transaction->delete();
        return redirect()->route('transaksi.index');
    }
}
