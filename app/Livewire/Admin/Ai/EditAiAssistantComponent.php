<?php

namespace App\Livewire\Admin\Ai;

use App\Models\AiAssistant;
use App\Models\AiSetting;
use App\Models\Category;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditAiAssistantComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]
    public $name;
   
    public $prompt;
    public $status;
    public $category_id;
    
    public $aiId;
    public $ai_id;
   

    public function mount($id){
        $this->aiId = $id;
        try{
            $ai = AiAssistant::findorFail($this->aiId);
            $this->name = $ai->name;
            
            $this->category_id = $ai->category_id;
            $this->status = $ai->status;
            $this->prompt = $ai->prompt;
            
            $this->ai_id = $ai->ai_setting_id;
            
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
        return view('livewire.admin.error-component',get_defined_vars());
        }

    }
    public function genSlug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function updateAi(){
        $this->validate([
            'name'=>'required|string|min:3',
            
            'status'=>'required|in:active,inactive',
            
            'prompt'=>'required|string|max:200',
            'category_id'=>'required|exists:categories,id',
            'ai_id'=>'required|exists:ai_settings,id',
            
        ]);
        try{
            $ai = AiAssistant::findorFail($this->aiId);
            $ai->name = $this->name;
       
            $ai->category_id = $this->category_id;
            $ai->status = $this->status;
            $ai->prompt = $this->prompt;
            $ai->ai_setting_id = $this->ai_id;
           
          
            $ai->save();
            $this->alert('success','Ai updated successfully');
           // return $this->route('admin.ai_assistant',navigate: true);
          
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            $this->alert('error',$errorMessage,[
                'timer'=>5000,
                'toast'=>true
            ]);

        }
    }
    public function render()
    {
       try{
        $categories = Category::where('status','active')->get();
        $ais = AiSetting::where('status','active')->get();
        return view('livewire.admin.ai.edit-ai-assistant-component',get_defined_vars());
       }catch(\Exception $e){
        $errorMessage = $e->getMessage();
        return view('livewire.admin.error-component',get_defined_vars());
       }
    }
}
