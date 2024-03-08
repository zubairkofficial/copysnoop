<?php

namespace App\Livewire\Admin\Chaining;

use App\Models\AiChain;
use App\Models\AiChaining;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ChainingComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.app')]
    protected $listeners = [
        'confirmed',
        'confirmedUpdate',
    ];

    public $search;
    public $chainingId;
    public $chain;
    public $orderedIds = [];

    public $old_position;

    public function delete($id)
    {
        $this->chainingId = $id;
        $ai_chain = AiChain::find($id);

        if ($ai_chain) {
            $this->confirm('Are you sure you want to delete this AiChain?', [
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
        $this->chainingId = null;
    }

    public function confirmed($data)
    {

        $ai_chain = AiChain::find($this->chainingId);

        if ($ai_chain) {
            $chaining = AiChaining::where('ai_chain_id', $ai_chain->id)->get();
            if ($chaining->count() > 0) {
                foreach ($chaining as $chain) {
                    $chain->delete();
                }
            }
            $ai_chain->delete();
            $this->alert('success', 'AiChain has been deleted successfully');
        } else {
            $this->alert('error', 'Try again, something went wrong');
        }
        $this->chainingId = null;
    }
    public function updateAiStatus($id)
    {
        $ai_chain = AiChain::find($id);
        if ($ai_chain) {
            if ($ai_chain->status == 'active') {
                $ai_chain->status = 'inactive';
            } elseif ($ai_chain->status == 'inactive') {
                $ai_chain->status = 'active';
            }
            $ai_chain->save();
            $this->alert('success', 'Status Updated Successfully');
        } else {
            $this->alert('error', 'Something went wrong');
        }
    }
    public function updatePosition($id, $position)
    {
        $this->chainingId = $id;
        $this->old_position = $position; // Corrected variable name

        $ai_chain = AiChaining::find($id);

        if ($ai_chain) {
            $this->alert('warning', 'Please enter new position', [
                'showConfirmButton' => true,
                'confirmButtonText' => 'Submit',
                'onConfirmed' => 'confirmedUpdate',
                'input' => 'text',
                'inputLabel' => 'Enter New Position',

                'allowOutsideClick' => false,
                'timer' => null,
                'position' => 'center',

            ]);
        } else {
            $this->alert('error', $ai_chain, $position);
        }
    }

    public function confirmedUpdate($value)
    {

        $pos = $value;
        $ai_chain = AiChaining::find($this->chainingId);
        if ($ai_chain) {
            $sweap = AiChaining::where('position', $pos)->first();
            $ai_chain->position = $pos;
            $sweap->position = $this->old_position;
            $sweap->save();
            $ai_chain->save();

            $this->alert('success', 'AiChain has been updated successfully');
        } else {
            $this->alert('error', 'Error updating AiChain');
        }

        $this->chainingId = null;
    }

    public function render()
    {
        $chains = AiChain::where('name', 'like', '%' . $this->search . '%')
            ->with(['chaining' => function ($query) {
                $query->orderBy('position', 'asc');
            }])
            ->paginate(10);
        return view('livewire.admin.chaining.chaining-component', get_defined_vars());
    }
}
