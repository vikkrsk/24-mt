<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(client::class, 'clients_id');
    }
}
