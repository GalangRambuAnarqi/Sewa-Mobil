<?php
// changes
namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $data['active'] = 'order';
        $data['order'] = Order::with('mobil', 'user')->where('user_id', Auth::id())->get();
        return view('user.order', $data);
    }

    public function profile_saya()
    {
        $data['active'] = 'profile';
        return view('user.profile', $data);
    }

    public function order_mobil()
    {
        if (Auth::user()->ktp_foto == 'user/avatar.png' || Auth::user()->ktp_foto == '') {
            return redirect()->route('user.profile.saya')->with('sukses', 'Sebelum order, foto ktp wajib diunggah');
        }

        // return request();
        $data = request()->all();
        $data['user_id'] = Auth::id();
        $data['invoice'] = "INV" . date('dmYHis') . Auth::id();

        if (request()->hasFile('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = request()->file('bukti_pembayaran')->store('bukti');
        }

        Mobil::find(request()->mobil_id)->update([
            'order' => "sudah"
        ]);

        Order::create($data);
        return redirect()->route('user.mobil')->with('sukses', 'Berhasil mengorder');
    }

    public function user_profile()
    {
        User::find(Auth::id())->update(request()->all());
        return redirect()->route('user.profile.saya')->with('sukses', 'Akun Berhasil Update');
    }

    public function user_foto()
    {
        if (Auth::user()->foto != 'user/avatar.png') {
            Storage::delete(Auth::user()->foto);
        }

        $path = request()->file('foto')->store('user');

        User::find(Auth::id())->update([
            'foto' => $path
        ]);

        return redirect()->route('user.profile.saya')->with('sukses', 'Foto Profile Berhasil Diubah');
    }

    public function user_ktp()
    {
        if (Auth::user()->ktp_foto != 'ktp/avatar.png') {
            Storage::delete(Auth::user()->ktp_foto);
        }

        $path = request()->file('ktp_foto')->store('ktp');

        User::find(Auth::id())->update([
            'ktp_foto' => $path
        ]);

        return redirect()->route('user.profile.saya')->with('sukses', 'Foto KTP Berhasil Diubah');
    }

    public function user_password()
    {
        request()->validate([
            'password' => 'required|same:password2',
            'password2' => 'required',
        ], [
            'password.required' => 'wajib diisi',
            'password2.required' => 'wajib diisi',
            'password.same' => 'password tidak sama',
        ]);

        User::find(Auth::id())->update([
            'password' => Hash::make(request()->password)
        ]);

        return redirect()->route('user.profile.saya')->with('sukses', 'Password Berhasil Diubah');
    }
}
