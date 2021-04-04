<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'shop_id',
        'email',
        'phone'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}
