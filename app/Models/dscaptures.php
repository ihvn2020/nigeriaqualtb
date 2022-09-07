<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dscaptures extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function screening()
    {
        return $this->belongsTo(screening::class, 'id', 'screenid');
    }
}

