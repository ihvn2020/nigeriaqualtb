<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class screening extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dscapture()
    {
        return $this->HasOne(dscaptures::class, 'screenid', 'id');
    }
}
