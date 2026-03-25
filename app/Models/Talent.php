<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    protected $table = 'talents';

    protected $fillable = [
        'user_id',
        'designation',
        'id_no',
        'blood_group',
        'phone',
        'email',
        'address',
        'website',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
