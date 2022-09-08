<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aggreportissues extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function aggreport()
    {
        return $this->belongsTo(aggreport::class, 'aggreport_id', 'id');
    }

    public function enteredby()
    {
        return $this->belongsTo(User::class, 'entered_by', 'id');
    }

    public function qiactivities()
    {
        return $this->hasMany(aggreportactivities::class, 'issue_id', 'id');
    }
}
