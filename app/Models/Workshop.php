<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
    use HasFactory, SoftDeletes;

    protected $filleble = [
        'name',
        'slug',
        'thumbnail',
        'venue_thumbnail',
        'bg_map',
        'address',
        'about',
        'price',
        'is_open',
        'has_started',
        'started_at',
        'time_at',
        'category_id',
        'workshop_instructor_id',
    ];
    protected $casts = [
        'started_at' => 'date',
        'time_at' => 'datetime:Hi',
    ];

    public function setNameAttribute($value)
    {
        $this ->attributes['name'] = $value;
        $this ->attributes['name'] = Str::slug($value);
    }
    public function benefits():HasMany
    {
        return $this->hasMany(WorkshopBenefit::class);

    }

    public function participants():HasMany
    {
        return $this->hasMany(WorkshopParticipant::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function instructor():BelongsTo
    {
        return $this->belongsTo(WorkshopInstructor::class,'workshop_instructor_id');
    }
}
