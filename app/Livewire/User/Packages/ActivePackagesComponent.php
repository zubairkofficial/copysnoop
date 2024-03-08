<?php

namespace App\Livewire\User\Packages;

use App\Models\Package;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ActivePackagesComponent extends Component
{
    #[Layout('layouts.user')]
    public function render()
    {
        $packages = Package::where('status','active')->get();
        return view('livewire.user.packages.active-packages-component',get_defined_vars());
    }
}
