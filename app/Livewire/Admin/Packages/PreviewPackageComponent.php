<?php

namespace App\Livewire\Admin\Packages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PreviewPackageComponent extends Component
{
    #[Layout('layouts.app')]
    public $packageId;
    public function mount($id){
        $this->packageId = $id;
    }
    public function render()
    {
        $package = \App\Models\Package::find($this->packageId);
        return view('livewire.admin.packages.preview-package-component',get_defined_vars());
    }
}
