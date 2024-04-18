<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aggreportactivities extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function issue()
    {
        return $this->belongsTo(aggreportissues::class, 'issue_id', 'id');
    }

    public function enteredby()
    {
        return $this->belongsTo(User::class, 'entered_by', 'id');
    }
}
