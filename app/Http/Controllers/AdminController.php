<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

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

    public function mobil_store()
    {
        $data = request()->all();

        if (request()->hasFile('foto')) {
            $data['foto'] = request()->file('foto')->store('mobil');
        }

        Mobil::create($data);
        return redirect()->route('mobil')->with('sukses', 'Mobil berhasil ditambah');
    }
}
