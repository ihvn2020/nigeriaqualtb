<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aggreport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function faciliti()
    {
        return $this->belongsTo(facilities::class, 'facility', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'entered_by', 'id');
    }

    public function issues()
    {
        return $this->hasMany(aggreportissues::class, 'aggreport_id', 'id');
    }

}
