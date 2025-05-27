<?php

namespace App\Models;

use App\Models\LocalImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Local extends Model
{
    /** @use HasFactory<\Database\Factories\LocalFactory> */
    use HasFactory, SoftDeletes;

        protected $fillable = ['type', 'capacite', 'prix', 'location', 'is_enabled', 'category_id','image_path'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
{
    return $this->hasMany(LocalImage::class);
}
}
