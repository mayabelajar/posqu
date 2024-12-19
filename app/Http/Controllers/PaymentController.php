<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ListPesanan;

class PaymentController extends Controller
{
    /**
     * Display the payment method page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $dataKeranjang = $request->session()->get('dataKeranjang', []);
        return view('payment.index', compact('dataKeranjang'));
    }

    /**
     * Process the payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'payment_method' => 'required|in:cash,card,bank_transfer',
            'table_type' => 'required|in:indoor,outdoor',
            'total_payment' => 'required|numeric',
        ]);

        // Process the payment based on the selected method
        if ($request->payment_method === 'cash') {
            // Process cash payment
        } elseif ($request->payment_method === 'card') {
            // Process card payment
        } elseif ($request->payment_method === 'bank_transfer') {
            // Process bank transfer payment
        }

        // Store the order information
        // ...

        // Redirect to the success page
        return redirect()->route('payment.success');
    }

    /**
     * Display the payment success page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function success()
    {
        return view('payment.success');
    }

    public function show(Request $request)
    {
        
        $this->validate($request, [
            'dataKeranjang' => 'required|array',
        ]);

        $request->session()->put('dataKeranjang', $request->dataKeranjang);

        return redirect()->route('transaksi');
    }

    public function get_session_category()
    {
        try {
            $dataKeranjang = session('keranjang', []);

            return response()->json(['keranjang' => $dataKeranjang], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data.', 'error' => $e->getMessage()], 500); 
        }
    }

    public function cetakStruk()
    {
        return view('payment.cetak-struk');
    }
}