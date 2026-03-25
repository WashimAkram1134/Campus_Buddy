<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictAssociation extends Model
{
    protected $fillable = ['name', 'division', 'image', 'link', 'members_count', 'cover_image'];
}
