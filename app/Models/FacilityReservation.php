<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityReservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'id', 'facility_id', 'reservation_id', 'usage_date'
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
