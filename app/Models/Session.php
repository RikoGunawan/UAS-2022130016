<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'computer_id',
        'start_time',
        'end_time',
        'duration',
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Computer
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
