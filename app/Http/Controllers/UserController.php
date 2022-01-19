<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mobil()
    {
        $data['active'] = 'mobil';
        $data['mobil'] = Mobil::latest()->get();
        return view('user.mobil', $data);
    }
}
