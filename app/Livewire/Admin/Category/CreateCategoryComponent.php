<?php

namespace App\Livewire\Admin\Category;

use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateCategoryComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]

    public $name;
    public $slug;
    public $status;
    public $logo;

    public function genSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function createCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'logo' => 'required|image|max:2048',
        ]);

        try {

            $category = new \App\Models\Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->status = $this->status;
            if ($this->logo) {
                $image = Carbon::now()->timestamp . '.' . $this->logo->extension();
                $this->logo->storeAs('assets/images/categories', $image);
                $category->logo = $image;
            }
            
            $category->save();

            $this->alert('success', 'Category Created Successfully');
            $this->reset();
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.category.create-category-component');
    }
}
