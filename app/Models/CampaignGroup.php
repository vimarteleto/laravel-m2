<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignGroup extends Model
{
    use HasFactory;

    protected $table = 'campaign_group';

    protected $guarded = [];
    protected $hidden = ['updated_at'];

}
