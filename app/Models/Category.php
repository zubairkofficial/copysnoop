<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'logo',
    ];
    public function ais()
    {
        return $this->hasMany(AiAssistant::class, 'category_id');
    }
}
