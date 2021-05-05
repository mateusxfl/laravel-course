<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Informa que items é um array.
    protected $casts = [
        'items' => 'array'
    ];

    // Informa que date é um campo de data.
    protected $date = ['date'];

    // Usuário dono do evento.
    public function user() {

        // "Pertence a alguem"
        return $this->belongsTo('App\Models\User');

    }
}
