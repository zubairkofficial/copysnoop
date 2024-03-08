<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiChaining extends Model
{
    use HasFactory;
    protected $fillable = [
        'assistan_id',
        'position',
        'type',
      'status',
    ];
    public function assistant(){
        return $this->belongsTo(AiAssistant::class,'ai_assistant_id');
    }
    public function chain(){
        return $this->belongsTo(AiChain::class,'ai_chain_id');
    }
}
