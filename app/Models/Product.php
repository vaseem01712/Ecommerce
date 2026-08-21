<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'stock',
        'image',
        'images',
        'is_active',
        'is_featured',
        'discount_type','discount_value','badge_text','discount_starts_at','discount_ends_at',
    ];

    protected $casts = [
        'discount_starts_at' => 'datetime',
        'discount_ends_at' => 'datetime',
        'images' => 'array',
    ];

    /** The hero image followed by any editorial/detail images. */
    public function getGalleryAttribute(): array
    {
        return array_values(array_filter(array_unique([
            $this->image,
            ...($this->images ?? []),
        ])));
    }

    public function getCurrentPriceAttribute(): float
    {
        $base = (float) $this->price;
        if ($this->sale_price !== null) return (float) $this->sale_price;
        $active = $this->discount_type && $this->discount_value && (!$this->discount_starts_at || $this->discount_starts_at->isPast()) && (!$this->discount_ends_at || $this->discount_ends_at->isFuture());
        return $active ? max(0, $this->discount_type === 'percent' ? $base * (1 - $this->discount_value / 100) : $base - $this->discount_value) : $base;
    }

    public function getDiscountBadgeAttribute(): ?string { return $this->current_price < $this->price ? ($this->badge_text ?: ($this->discount_type === 'percent' ? $this->discount_value . '% OFF' : 'SALE')) : null; }

    public function reviews() { return $this->hasMany(Review::class); }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
