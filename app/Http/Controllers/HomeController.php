<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Message;


class HomeController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->get();

        return view('frontend.homepage', compact('barangs'));
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        Message::create($data);
        
        return redirect()->back()->with([
            'message' => 'pesan anda berhasil dikirim',
            'alert-type' => 'success'
        ]);
    }
    public function detail(Barang $barang){
        return view('frontend.detail', compact('barang'));
    }
}
