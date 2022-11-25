<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','parent_id','title','keywords','description','image','slug','status'];
    public function products(){

        return $this->hasMany(Product::class);
    }
}
