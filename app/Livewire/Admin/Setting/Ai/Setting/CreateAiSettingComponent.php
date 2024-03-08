<?php

namespace App\Livewire\Admin\Setting\Ai\Setting;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateAiSettingComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]
    public $name;
    public $slug;
    public $api_key;
   
    public $status;
    public $category_id;

    public function genSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function createAi()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|string|unique:ai_settings,slug',
            'api_key' => 'required|unique:ai_settings,api_key',
            
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
        ]);
        try {
            $ai_setting = new \App\Models\AiSetting();
            $ai_setting->name = $this->name;
            $ai_setting->slug = $this->slug;
            $ai_setting->api_key = $this->api_key;
           
            $ai_setting->status = $this->status;
            $ai_setting->category_id = $this->category_id;
            $ai_setting->save();
            $this->alert('success', 'New Ai Setting Created Successfully');
            $this->reset();
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        $categories = Category::get();
        return view('livewire.admin.setting.ai.setting.create-ai-setting-component', get_defined_vars());
    }
}
