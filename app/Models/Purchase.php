<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['user_id', 'nutrition_item_id'];

    public function item()
    {
        return $this->belongsTo(NutritionItem::class, 'nutrition_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
