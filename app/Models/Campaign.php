<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['pivot', 'updated_at'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'campaign_group');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function active_on()
    {
        return $this->groups()->wherePivot('active', 1);
    }

    public function inactive_on()
    {
        return $this->groups()->wherePivot('active', 0);
    }
}
