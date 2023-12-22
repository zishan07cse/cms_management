<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'category_id',

    ]; 
    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function blog(){
        return $this->belongsTo(Category::class);
  }
}
