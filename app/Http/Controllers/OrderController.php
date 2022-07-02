<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\order as AppPesanan;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\produk;
use App\Models\pembeli;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!request('search')) {
            $data['dataPesanan'] = order::orderBy('date', 'ASC')->get();
            return view('order.index', $data);
        } else {
            $search = $request->search;

            $data['dataPesanan'] = order::where('invoice_id', 'like', "%" . $search . "%")->paginate();
            return view('order.index', $data);}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['produk'] = Produk::get();
        $datas['pelanggan'] = pembeli::get();
        return view('order.tambah', $data, $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::now('GMT+7');
        $random = random_int(10000, 99999);
        $invoice = $today->year . '/' . $today->month . '/' . $today->day . '/' . $random;

        $produk = Produk::find($request->produk_id);
        $total = $request->qty * $produk->harga;

        //tinggal cetak array merge
        $store = order::create(array_merge($request->all(), ['invoice_id' => $invoice, 'total_harga' => $total]));
        if (!$store) {
            return redirect()->route('createPesanan')->with('error', 'Data Added Failed.');
        } else {
            return redirect()->route('indexPesanan')->with('success', 'Data Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit'] = order::find($id);
        $data['produk'] = Produk::get();
        $data['pelanggan'] = pembeli::get();

        if (!$data['edit']) {
            return redirect()->route('indexPesanan')->with('error', 'Data Not Found!.');
        }

        return view('order.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = order::updateOrCreate(['id' => $id], $request->all());
        if (!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexPesanan')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = order::find($id);
        if (!$destroy) {
            return redirect()->route('indexPesanan')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if (!$destroy) {
            return redirect()->route('indexPesanan')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexPesanan')->with('success', 'Data Has Been Deleted.');
    }
}
