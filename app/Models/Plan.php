<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'price',
        'description'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    

    
}
