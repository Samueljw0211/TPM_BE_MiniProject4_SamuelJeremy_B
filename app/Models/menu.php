<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = [
        'menuName','menuDesc','menuPrice','menuDateAdded','category_id','image'
    ];
    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
}
