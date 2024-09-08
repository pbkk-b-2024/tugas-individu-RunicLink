<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'id', 'service_id', 'reservation_id', 'quantity'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}

