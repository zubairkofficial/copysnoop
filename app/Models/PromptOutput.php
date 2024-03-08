<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptOutput extends Model
{
    use HasFactory;

    public function assistants(){
        return $this->belongsTo(AiAssistant::class);
    }
}
