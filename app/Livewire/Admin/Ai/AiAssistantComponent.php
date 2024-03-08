<?php

namespace App\Livewire\Admin\Ai;

use App\Models\AiAssistant;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AiAssistantComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.app')]
    public $search;
    public $perPage = 8;
    public $sorting = 'all';
    public $status = 'all';
    public $type ='all';

    public function updateSetting($id){
        $ai = AiAssistant::find($id);
        if ($ai) {
            if($ai->status == 'active'){
                $ai->status = 'inactive';
            }else{
                $ai->status = 'active';
            }
            $ai->save();
            $this->alert('success', 'Status Updated Successfully');
        } else {
            $this->alert('error', 'Something went wrong');
        }
    }
    public function render()
    {
        try {
            $query = AiAssistant::orderBy('id', 'asc');

            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
                   
            }

            if ($this->status != 'all') {
                $query->where('status', $this->status);
            }
            if($this->type != 'all'){
                $query->where('type', $this->type);
            }
            if ($this->sorting != 'all') {
                $query->orderBy('created_at', $this->sorting);
            }

            $ais = $query->paginate($this->perPage);

            return view('livewire.admin.ai.ai-assistant-component', get_defined_vars());
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.admin.error-component', get_defined_vars());
        }
    }
}
