<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mobil()
    {
        $data['active'] = 'mobil';
        $data['mobil'] = Mobil::latest()->get();
        return view('admin.mobil', $data);
    }

    public function mobil_tambah()
    {
        $data['active'] = 'mobil';
        return view('admin.mobilTambah', $data);
    }

    public function mobil_edit($id)
    {
        $data['active'] = 'mobil';
        $data['mbl'] = Mobil::find(Crypt::decrypt($id));
        return view('admin.mobilEdit', $data);
    }

    public function mobil_store()
    {
        $data = request()->all();

        if (request()->hasFile('foto')) {
            $data['foto'] = request()->file('foto')->store('mobil');
        }

        Mobil::create($data);
        return redirect()->route('mobil')->with('sukses', 'Data Mobil berhasil ditambah');
    }

    public function mobil_update()
    {
        $data = request()->all();

        if (request()->hasFile('foto')) {
            Storage::delete(request()->img_lama);
            $data['foto'] = request()->file('foto')->store('mobil');
        } else {
            $data['foto'] = request()->img_lama;
        }

        Mobil::find(request()->id)->update($data);
        return redirect()->route('mobil')->with('sukses', 'Data Mobil berhasil diupdate');
    }

    public function mobil_delete()
    {
        Mobil::destroy(request()->id);
        return redirect()->route('mobil')->with('sukses', 'Data Mobil berhasil dihapus');
    }

    public function user()
    {
        $data['active'] = 'user';
        $data['user'] = User::where('level', 'user')->get();
        return view('admin.user', $data);
    }

    public function user_delete()
    {
        $user = User::find(request()->id);

        if ($user->foto != 'user/avatar.PNG') {
            Storage::delete($user->foto);
        }

        $user->delete();
        return redirect()->route('user')->with('sukses', 'Data User berhasil dihapus');
    }

    public function order()
    {
        $data['active'] = 'order';
        $data['order'] = Order::with('mobil', 'user')->latest()->get();
        // return $data['order'];
        return view('admin.order', $data);
    }

    public function order_info($id)
    {
        $data['active'] = 'order';
        $data['ord'] = Order::with('mobil', 'user')->find(Crypt::decrypt($id));
        return view('admin.orderInfo', $data);
    }

    public function order_status()
    {
        $ord = Order::find(request()->id);

        Mobil::find(request()->mobil_id)->update([
            'order' => 'belum'
        ]);

        $ord->update([
            'status' => "Selesai"
        ]);

        return redirect()->route('admin.order')->with('sukses', 'Invoice ' . $ord->invoice . ' selesai order mobil');
    }
}
