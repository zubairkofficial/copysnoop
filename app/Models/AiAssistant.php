<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiAssistant extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function chaining(){
        return $this->belongsTo(AiChaining::class,'ai_assistan_id');
    }
    public function setting(){
        return $this->belongsTo(AiSetting::class,'ai_setting_id');
    }
    public function prompts(){
        return $this->hasMany(PromptOutput::class,'ai_assistant_id');
    }
   
}
