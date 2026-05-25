<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{

    protected $table = 'properties';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'status',
        'type',
        'bedrooms',
        'bathrooms',
        'parking_spaces',
        'address',
        'city',
        'state',
        'country',
        'image',
        'contact',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
