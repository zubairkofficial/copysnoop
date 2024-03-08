<?php

namespace App\Livewire\Admin\Category;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Str;
class EditCategoryComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]
    public $name;
    public $slug;
    public $status;
    public $logo;
    public $new_logo;
    public $cat_id;
    public function mount($id){
        $this->cat_id = $id;
        $category = \App\Models\Category::find($id);
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->status = $category->status;
        $this->logo = $category->logo;
    }
    public function genSlug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function editCategory(){
        $this->validate([
            'name' =>'required',
            'slug' =>'required|unique:categories,slug,'.$this->cat_id,
             'status' =>'required',
            'new_logo' =>'nullable|image|max:2048',
        ]);
        try{
            $category = \App\Models\Category::find($this->cat_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->status = $this->status;
            
            if ($this->new_logo) {
                $image = Carbon::now()->timestamp. '.'. $this->new_logo->extension();
                $this->new_logo->storeAs('assets/images/categories', $image);
                $category->logo = $image;
            }
            $category->save();
            $this->alert('success', 'Category Updated Successfully');
            
        }catch(\Exception $e){
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.category.edit-category-component');
    }
}
