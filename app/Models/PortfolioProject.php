<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = ['title', 'description', 'projectUrl', 'image', 'status'];
}
