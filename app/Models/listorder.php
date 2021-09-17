<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listorder extends Model
{
    use HasFactory;
    
    protected $hidden = ['updated_at','created_at'];

    protected $fillable = [
        'date_order',
        'name_product',
        'quantity',
        'total',
        'resource_id'
        
    ];

    public function resources()
    {   
        return $this->belongsTo('App\Models\Resource', 'resource_id');
    }
}
