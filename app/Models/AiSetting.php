<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
     'slug',
        'category_id',
     'status',
     'api_key',
     'api_secret',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function assistant(){
        return $this->belongsTo(AiAssistant::class);
    }
}
