<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'name', 'slug'];

    // Tambahkan relasi ke BoardingHouse
    public function boardingHouses()
    {
        return $this->hasMany(BoardingHouse::class, 'category_id');
    }
}
