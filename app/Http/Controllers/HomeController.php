<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\kategori;
use App\Models\order;
use App\Models\pembeli;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');

        $data['kategori'] = Kategori::count();
        $data['produk'] = Produk::count();
        $data['pelanggan'] = pembeli::count();
        $data['selesai'] = order::where('status', 'selesai')->count();
        $data['proses'] = order::where('status', 'proses')->count();

        $tstart = Carbon::today("GMT+7");
        $tend = Carbon::today("GMT+7")->endOfDay("GMT+7");
        $data['baru'] = order::whereBetween('date', [$tstart, $tend])->where('status', '=', 'proses')->count();
        $data['kirim'] = order::where([['date', '<=', Carbon::yesterday("GMT+7")], ['status', '=', 'proses']])->count();
        $data['omset'] = order::where('status', 'selesai')->sum('total_harga');
        return view('home', $data);
    }
}
