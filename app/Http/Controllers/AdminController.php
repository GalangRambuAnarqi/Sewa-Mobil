<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
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
        $data['user'] = Mobil::latest()->get();
        return view('admin.user', $data);
    }
}
