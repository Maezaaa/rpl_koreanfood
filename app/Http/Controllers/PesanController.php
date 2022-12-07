<?php

namespace App\Http\Controllers;
use App\Models\Makanan;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $makanan = Makanan::where('id',$id)->first();

        return view('pesan.index', compact('makanan'));
    }

    public function pesan(Request $request, $id)
    {
        $makanan = Makanan::where('id',$id)->first();
        $tanggal = Carbon::now();

        //simpan ke database pesanan
        $pesanan = new Pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status = 0;
        $pesanan->jumlah_harga = $makanan->harga*$request->jumlah_pesanan;
        $pesanan->save();

        //simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        $pesanan_detail = new PesananDetail;
        $pesanan_detail->makanan_id = $makanan->id;
        $pesanan_detail->pesanan_id = $pesanan_baru->id;
        $pesanan_detail->jumlah = $request->jumlah_pesanan;
        $pesanan_detail->jumlah_harga = $makanan->harga*$request->jumlah_pesanan;
        $pesanan_detail->save();

        return redirect('home');
}
}