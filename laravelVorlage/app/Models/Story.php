<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'story';
    protected $fillable = [
        'headline', // string 255 required
        'story',   // longtext required
        'background'  // string 100 nullable
    ];

    public function stories() {
        return $this->belongsToMany(
            Story::class,
            'story_relation',
            'story_relation_id',
            'story_id'
        );
    }

    public function related() {
        return $this->belongsToMany(
            Story::class,
            'story_relation',
            'story_id',
            'story_relation_id'
        );
    }

}
