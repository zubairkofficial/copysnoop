<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiChain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
      'slug',
        'api_key',
      'secret_key',
    ];

    public function assistant(){
        return $this->belongsTo(AiAssistant::class);
    }
    public function chaining(){
      return $this->hasMany(AiChaining::class,'ai_chain_id');
    }
    
}
