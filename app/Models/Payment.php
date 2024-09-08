<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'id', 'reservation_id', 'amount', 'payment_date', 'payment_method'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}

