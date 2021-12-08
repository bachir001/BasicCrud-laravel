<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'image',
    ];
    

    public function products()
    {
        return $this->hasOne('App\Models\Product','category_id');
    }

    // public function getDisplayName(){
    //     return $this->name;
    // }

}
