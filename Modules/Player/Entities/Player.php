<?php

namespace Modules\Player\Entities;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'answers', 'points'];
}
