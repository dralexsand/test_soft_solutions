<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarModel extends ApiModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id',
        'name',
    ];
}
