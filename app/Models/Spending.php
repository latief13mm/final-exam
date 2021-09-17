<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function resources()
    {

        return $this->belongsTo('App\Models\Resource', 'resource_id');
    }

}
