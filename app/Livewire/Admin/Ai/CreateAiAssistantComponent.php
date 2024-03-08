<?php

namespace App\Livewire\Admin\Ai;

use App\Models\AiAssistant;
use App\Models\AiSetting;
use App\Models\Category;
use App\Models\PromptOutput;
use App\Services\ApifyGoodReads;
use App\Services\BazaarvoiceBN;
use App\Services\OxylabAmazon;
use App\Services\Sacraping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAiAssistantComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]
    public $name;
    public $file_name;

    public $prompt;
    public $status;
    public $category_id;

    public $ai_id;

    public $out_put;

    public $category;
    public $isOpen = false;

    public $data = '';
    public $product;
    public $loaderMessage = 'Starting geting reviews...';
    public $platform;
    public $api_key;

    public function createAI()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'status' => 'required|in:active,inactive',
            'prompt' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id',
            'ai_id' => 'required|exists:ai_settings,id',

        ]);
        try {
            $ai = new AiAssistant();
            $ai->name = $this->name;
            if ($this->category_id == null) {
                $cat = Category::create([
                    'name' => $this->category,
                    'slug' => Str::slug($this->category, '-'),
                    'status' => 'active',
                ]);
                $ai->category_id = $cat->id;
            } else {
                $ai->category_id = $this->category_id;
            }
            $ai->status = $this->status;
            $ai->prompt = $this->prompt;
            $ai->ai_setting_id = $this->ai_id;
            $ai->save();
            $this->saveData();
            $this->alert('success', 'Ai created successfully');
            $this->reset();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $this->alert('error', $errorMessage, [
                'timer' => 5000,
                'toast' => true,
            ]);

        }

    }
    public function openModal()
    {
        
        
        if ($this->ai_id != null && $this->prompt != null && $this->status != null && $this->file_name) {
            $this->isOpen = true;
            if ($this->ai_id != null) {
                $ai = AiSetting::find($this->ai_id);
                $this->api_key = $ai->api_key;
            }
        } else {
            $this->alert('error', 'Please fill all fields');
        }
    }
    public function previewPromptResult()
    {
        try {
            $this->validateProduct('Starting geting reviews...');

            if ($this->out_put) {
                $this->processOutput($this->out_put,'We start analysis on reviews...');
            }

            if ($this->platform === 'amazon') {
                $this->validate([
                    'product' => 'required',
                ]);

                $getreviews = (new OxylabAmazon)->genUrl($this->product);
                  //dd($getreviews);
                if($getreviews['status'] == 200){
                    $this->processOutput($getreviews['reviews'],'We start analysis on reviews...');
                }else{
                    $this->alert('error',$getreviews['message']);
                }
                

                
            } elseif ($this->platform === 'b&n') {
                $this->validate([
                    'product' => 'required',
                ]);

                $getreviews = (new BazaarvoiceBN)->bN($this->product);
               

                $this->processOutput($getreviews,'We start analysis on reviews...');

            } elseif ($this->platform === 'goodreads') {
                $this->validate([
                    'product' => 'required',
                ]);
                $getreviews = (new ApifyGoodReads)->goodReads($this->product);
               
                $this->processOutput($getreviews,'We start analysis on reviews...');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $this->alert('error', $errorMessage, [
                'timer' => 5000,
                'toast' => true,
            ]);
        }
    }


    #[On('updateLoader')]
    private function processOutput($output, $message = null)
    {
        sleep(1);
        if($message != null){
            $this->loaderMessage = $message;
        }else{
            $this->dispatch('updateLoader', 'We start analysis on reviews...');
        }
        if ($this->out_put != null) {
            $data = PromptOutput::find($this->out_put);
            $getreviews = $data->output;
        } else {
            $getreviews = $output;
        }
        $sacrapingInstance = new Sacraping();
        $data = $sacrapingInstance->promptGenForAmazon($getreviews, $this->api_key, $this->prompt);

        $this->handleScrapingResult($data,'Analysis complete');
    }


    #[On('updateLoader')]
    private function handleScrapingResult($data, $message =null)
    {
        if($message != null){
            $this->loaderMessage = $message;
        }else{
            $this->dispatch('updateLoader', 'Analysis complete.');
        }
        if ($data['status'] === 200) {
            

            $response = $data['response'];
            $this->data = nl2br($response);

        } elseif ($data['status'] === 201 || $data['status'] === 403) {
            $this->dispatch('updateLoader', $data['status'] === 201 ? 'Error: ' : 'Exception: ' . $data['response']);
            $error = $data['response']['error']['message'];
            // dd($data['response']);
            $this->alert('error', $error);

        }
    }


    #[On('updateLoader')]
    private function validateProduct($message = null)
    {
        if($message != null){
            $this->loaderMessage = $message;
        }else{
            $this->loaderMessage = 'Starting geting reviews...';
        }
        if ($this->platform !== 'amazon' || $this->platform !== 'goodreads' || $this->platform !== 'b&n') {
            return;
        }

        $this->validate([
            'product' => 'required',
        ]);
    }

    
    public function saveData()
    {
        try {
            $out = new PromptOutput();
            $out->user_id = Auth::user()->id;
            $out->file_name = $this->file_name;
            $out->output = $this->data;
            $out->words = str_word_count($this->data);
            $out->save();
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function isSave()
    {
        $this->saveData();
        $this->alert('success', 'prompt output result has been saved');
    }

    
    public function render()
    {
       
        $categories = Category::where('status', 'active')->get();
        $ais = AiSetting::where('status', 'active')->get();
        $p_out_puts = PromptOutput::where('user_id', Auth::user()->id)->get();
        return view('livewire.admin.ai.create-ai-assistant-component', get_defined_vars());
    }
}
