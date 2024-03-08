<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
   
    #[Layout('layouts.app')]
    protected $listeners = [
        'confirmed',
    ];
    public $search;
    public $perPage = 8;
    public $sorting = 'all';
    public $status = 'all';
    public $categoryId;
    public function delete($id)
    {
        $this->categoryId = $id;
        $category = Category::find($id);

        if ($category) {
            $this->confirm('Are you sure you want to delete this category?', [
                'onConfirmed' => 'confirmed',
                'allowOutsideClick' => false,
                'timer' => null,
                'showConfirmButton' => true,
                'confirmButtonText' => 'Yes',
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancel',
                'onDismissed' => 'cancelled',
            ]);
        } else {
            $this->alert('error', 'Try again, something went wrong');
        }
    }
    public function cancelled()
    {
        $this->categoryId = null;
    }

    public function confirmed()
    {
        $category = Category::find($this->categoryId);

        if ($category) {
            if ($category->logo) {
                // Assuming 'assets/images/categories/' is the correct path to your category logos
                unlink('assets/images/categories/'. $category->logo);
            
                // if (file_exists($filePath)) {
                //     unlink($filePath);
                // }
            }
            
            $category->delete();
            $this->alert('success', 'Category has been deleted successfully');
        } else {
            $this->alert('error', 'Try again, something went wrong');
        }
        $this->categoryId = null;
    }
    public function updateStatus($id){
        $category = Category::find($id);
        if ($category) {
            if ($category->status == 'active') {
                $category->status = 'inactive';
            } elseif ($category->status == 'inactive') {
                $category->status = 'active';
            }
            $category->save();
            $this->alert('success', 'Status Updated Successfully');
        } else {
            $this->alert('error', 'Something went wrong');
        }
    }
    public function render()
    {
        try {
            $query = Category::orderBy('id', 'desc');
            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            }
            if ($this->status != 'all') {
                $query->where('status', $this->status);
            }
            if ($this->sorting != 'all') {
                $query->where('created_at', $this->status);
            }
            $categories = $query->paginate($this->perPage);

            return view('livewire.admin.category.categories-component', get_defined_vars());
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('liveiwre.admin.error-component', get_defined_vars());
        }
    }
}
