<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
