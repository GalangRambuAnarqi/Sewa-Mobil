<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function mobil()
    {
        $data['active'] = 'mobil';
        return view('admin.mobil', $data);
    }

    public function mobil_tambah()
    {
        $data['active'] = 'mobil';
        return view('admin.mobilTambah', $data);
    }
}
