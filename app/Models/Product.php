<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'tags',
    ];
    public function galleries(){
        return $this->hasMany(ProductGalery::class, 'products_id', 'id');
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class , 'categories_id', 'id');
    }
}
