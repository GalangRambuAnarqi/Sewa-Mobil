<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $guarded = ['id'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
