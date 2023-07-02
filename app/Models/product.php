<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'user_id',
        'product_name',
        'category',
        'description',
        'price',
        'image_path'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = str_replace(' ', '-', $product->product_name);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
