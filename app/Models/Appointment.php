<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = []; // Menghubungkan ke dalam tabel appointment

    // Data yang dibentuk ke dalam input date dan time
    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
        'members' => 'array',
    ];

    // Relasi antar tabel
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Costum tampilan status badge
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'SCHEDULED' => 'primary',
            'CLOSED' => 'success',
        ];

        return $badges[$this->status];
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDate(); // mengambil function dari app service provider
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->toFormattedTime(); // mengambil function dari app service provider
    }
}
