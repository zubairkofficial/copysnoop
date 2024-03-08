<?php

namespace App\Livewire\Admin\Setting\Ai\Setting;

use App\Models\AiSetting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AiSettingComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $listeners = [
        'confirmed',
    ];
    #[Layout('layouts.app')]

    public $aiIdToDelete;
    public $search;

    public function updateAiStatus($id)
    {
        $ai = AiSetting::find($id);
        if ($ai) {
            if ($ai->status == 'active') {
                $ai->status = 'inactive';
            } elseif ($ai->status == 'inactive') {
                $ai->status = 'active';
            }
            $ai->save();
            $this->alert('success', 'Status Updated Successfully');
        } else {
            $this->alert('error', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $this->aiIdToDelete = $id;
        $ai = AiSetting::find($id);

        if ($ai) {
            $this->confirm('Are you sure you want to delete this ai-setting?', [
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
        $this->aiIdToDelete = null;
    }

    public function confirmed()
    {
        $ai = AiSetting::find($this->aiIdToDelete);

        if ($ai) {
            $ai->delete();
            $this->alert('success', 'Ai-setting has been deleted successfully');
        } else {
            $this->alert('error', 'Try again, something went wrong');
        }
        $this->aiIdToDelete = null;
    }
    public function render()
    {
        $query = AiSetting::where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('category', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });

        $ais = $query->paginate(10);

        return view('livewire.admin.setting.ai.setting.ai-setting-component', get_defined_vars());
    }
}
