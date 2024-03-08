<?php

namespace App\Livewire\Admin\Ai;

use App\Models\AiAssistant;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AssistantPromptDetailComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]

    public $assistant;
    public $ai;
    public function mount($prompt){
        try{
            $this->assistant = $prompt;
        $this->ai = AiAssistant::find($this->assistant);
        }catch(\Exception $e){
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.ai.assistant-prompt-detail-component');
    }
}
