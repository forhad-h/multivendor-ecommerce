<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Product extends Model
{
    use HasFactory;

    const THUMBNAIL_SIZES = [
        ['212', '200'],
        ['100', '140'],
        ['75', '75'],
        ['720', '660'],
    ];
    const IMAGE_SIZES = [['720', '660']];
    const PRODUCT_HEIGHT = 930;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'price',
        'discount_price',
        'stock',
        'code',
        'details',
        'weight',
        'status'
    ];

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function (Product $product) {
            $product->slug = slug($product->name);
        });

        static::updating(function (Product $product) {
            $product->slug = slug($product->name);
        });
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function seo(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class)->where('status', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function attributes(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductAttr::class);
    }
}
