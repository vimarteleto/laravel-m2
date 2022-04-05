<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'campaign_group');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
