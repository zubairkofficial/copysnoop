<?php

namespace App\Livewire\Admin\Packages;

use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreatePackageComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]

    public $name;
    public $slug;
    public $description;
    public $package_image;
    public $reviews_request;
    public $duration;
    public $price;
    public $status;
    public $platform;
    public $files;

    public function genSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function createPackage()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:packages,slug',
            'description' => 'required',
            'package_image' => 'required|image|max:2048',
            'reviews_request' => 'required|numeric',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'files' => 'required|numeric',
            'platform'=>'required|in:all,amazon,goodreads,b&n',
            'status'=>'required|in:active,inactive'

        ]);
        try{
            $package = new \App\Models\Package();
            $package->name = $this->name;
            $package->slug = $this->slug;
            $package->description = $this->description;
            if($this->package_image){
                $image = Carbon::now()->timestamp. '.'. $this->package_image->extension();
                $this->package_image->storeAs('assets/images/packages', $image);
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
            $this->reset();
        }catch(\Exception $e){
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.packages.create-package-component');
    }
}
