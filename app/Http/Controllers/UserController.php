<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mobil()
    {
        $data['active'] = 'mobil';
        $data['mobil'] = Mobil::latest()->get();
        return view('user.mobil', $data);
    }

    public function order_saya()
    {
        $data['active'] = 'user';
        $data['mobil'] = Order::with('mobil', 'user')->where('user_id', Auth::id())->get();
        return view('user.order', $data);
    }

    public function order_mobil()
    {
        $data = request()->all();
        $data['user_id'] = Auth::id();

        if (request()->hasFile('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = request()->file('bukti_pembayaran')->store('bukti');
        }

        Mobil::find(request()->mobil_id)->update([
            'order' => "sudah"
        ]);

        Order::create($data);
        return redirect()->route('user.mobil');
    }
}
