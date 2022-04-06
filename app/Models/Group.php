<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['pivot', 'updated_at'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
