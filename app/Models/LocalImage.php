<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalImage extends Model
{
    /** @use HasFactory<\Database\Factories\LocalImageFactory> */
        use HasFactory, SoftDeletes;

    protected $fillable = [
        'local_id',
        'image_path',
    ];

    // Relationship: image belongs to a Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }
}
