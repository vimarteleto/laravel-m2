<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_group');
    }

    public function activeCampaign()
    {
        return $this->campaigns()->wherePivot('active', 1);
    }

    public function inactiveCampaigns()
    {
        return $this->campaigns()->wherePivot('active', 0);
    }
}
