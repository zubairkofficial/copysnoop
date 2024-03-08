<?php

namespace App\Livewire\Admin\Packages;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class EditPackageComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]

    public $name;
    public $slug;
    public $description;
    public $package_image;
    public $new_package_image;
    public $reviews_request;
    public $duration;
    public $price;
    public $status;
    public $platform;
    public $files;
    public $packageId;

    public function mount($id){
      $this->packageId = $id;
      $package = \App\Models\Package::find($id);
      $this->name = $package->name;
      $this->slug = $package->slug;
      $this->description = $package->description;
      $this->package_image = $package->package_image;
      $this->reviews_request = $package->reviews_requested;
      $this->duration = $package->duration;
      $this->price = $package->price;
      $this->status = $package->status;
      $this->files = $package->files;
      $this->platform = $package->platform;
    }

    public function genSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function updatePackage()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:packages,slug,'.$this->packageId,
            'description' => 'required',
            'new_package_image' => 'nullable|image|max:2048',
            'reviews_request' => 'required|numeric',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'files' => 'required|numeric',
            'platform'=>'required|in:all,amazon,goodreads,b&n',
            'status'=>'required|in:active,inactive'

        ]);
        try{
            $package = \App\Models\Package::find($this->packageId);
            $package->name = $this->name;
            $package->slug = $this->slug;
            $package->description = $this->description;
            if($this->new_package_image){
                $image = Carbon::now()->timestamp. '.'. $this->new_package_image->extension();
                $this->new_package_image->storeAs('assets/images/packages', $image);
                $package->package_image = $image;
            }
            $package->reviews_requested = $this->reviews_request;
            $package->duration = $this->duration;
            $package->price = $this->price;
            $package->status = $this->status;
            $package->platform = $this->platform;
            $package->files = $this->files;
            $package->save();
            $this->alert('success', 'Package Created Successfully');
        }catch(\Exception $e){
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.packages.edit-package-component');
    }
}
