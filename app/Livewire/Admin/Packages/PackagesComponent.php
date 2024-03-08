<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PackagesComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.app')]
    protected $listeners = [
        'confirmed',
    ];
    public $search;
    public $perPage = 10;
    public $sorting = 'all';
    public $status = 'all';
    public $packageId;
    
    #[Layout('layouts.app')]

    public function delete($id)
    {
        $this->packageId = $id;
        $category = Package::find($id);

        if ($category) {
            $this->confirm('Are you sure you want to delete this package?', [
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
        $this->packageId = null;
    }

    public function confirmed()
    {
        $category = Package::find($this->packageId);

        if ($category) {
            if ($category->logo) {
                // Assuming 'assets/images/categories/' is the correct path to your category logos
                unlink('assets/images/packages/'. $category->logo);
            
                // if (file_exists($filePath)) {
                //     unlink($filePath);
                // }
            }
            
            $category->delete();
            $this->alert('success', 'Package has been deleted successfully');
        } else {
            $this->alert('error', 'Try again, something went wrong');
        }
        $this->packageId = null;
    }
    public function updateStatus($id){
        $category = Package::find($id);
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
            $query = Package::orderBy('id', 'desc');
            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            }
            if ($this->status != 'all') {
                $query->where('status', $this->status);
            }
            if ($this->sorting != 'all') {
                $query->where('created_at', $this->status);
            }
            $packages = $query->paginate($this->perPage);
        return view('livewire.admin.packages.packages-component',get_defined_vars());
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.admin.error-component', get_defined_vars());
        }
    }
}
