<?php

namespace App\Livewire\Admin\Chaining;

use App\Models\AiAssistant;
use App\Models\AiChain;
use App\Models\AiChaining;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateChainComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]
    public $assistantSections = 1;
    
    public $ai_assistant_ids = [];
    public $name;
    public $slug;
    public $type;
    

    public function genSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function addAssistantSection()
    {
        $this->assistantSections++;
    }

    public function createChain()
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:ai_chains,slug',
            'type' => 'required|in:amazon,goodreads,b&n',
            
            'ai_assistant_ids.*' => 'required|exists:ai_assistants,id',
        ]);

        $chain = new AiChain();
        $chain->name = $this->name;
        $chain->slug = $this->slug;
        $chain->status = 'active';
        $chain->save();

        foreach ($this->ai_assistant_ids as $key => $ai_assistant_id) {
            $chaing = new AiChaining();
            $chaing->position = $key;
            $chaing->ai_assistant_id = $ai_assistant_id;
            $chaing->ai_chain_id = $chain->id;
            $chaing->type = $this->type;
            $chaing->save();
        }

        $this->reset();
        $this->alert('success', 'Chain has been created successfully');
    }
    public function render()
    {
        $ais = AiAssistant::where('status', 'active')->get();
        return view('livewire.admin.chaining.create-chain-component',get_defined_vars());
    }
}
