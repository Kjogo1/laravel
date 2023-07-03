<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\Discount;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'sku',
        'quantity',
        'category_id',
        'discount_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongTo(Category::class);
    }

    public function discount() {
        return $this->belongTo(Discount::class);
    }

    // public function inventory() {
    //     return $this->belongTo(Inventory::class);
    // }

    // protected function name(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => url('uploads/'.$value),
    //     );
    // }
}