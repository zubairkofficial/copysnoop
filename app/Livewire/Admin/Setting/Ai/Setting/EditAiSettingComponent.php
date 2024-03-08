<?php

namespace App\Livewire\Admin\Setting\Ai\Setting;

use App\Models\AiSetting;
use App\Models\Category;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditAiSettingComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]
    public $name;
    public $slug;
    public $api_key;
    
    public $status;
    public $category_id;
    public $aiId;
    public function mount($id)
    {
        $this->aiId = $id;
        $ai = AiSetting::find($this->aiId);
        $this->name = $ai->name;
        $this->slug = $ai->slug;
        $this->api_key = $ai->api_key;
      
        $this->status = $ai->status;
        $this->category_id = $ai->category_id;
    }
    public function genSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function editAi()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|string|unique:ai_settings,slug,'.$this->aiId,
            'api_key' => 'required|unique:ai_settings,api_key,'.$this->aiId,
            
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
        ]);
        try {
            $ai_setting = AiSetting::find($this->aiId);
            $ai_setting->name = $this->name;
            $ai_setting->slug = $this->slug;
            $ai_setting->api_key = $this->api_key;
            
            $ai_setting->status = $this->status;
            $ai_setting->category_id = $this->category_id;
            $ai_setting->save();
            $this->alert('success', 'Ai Setting Updated Successfully');
            
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        $categories = Category::get();
        return view('livewire.admin.setting.ai.setting.edit-ai-setting-component', get_defined_vars());
    }
}
