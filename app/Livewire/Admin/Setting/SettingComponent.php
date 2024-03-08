<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Analyizer;
use App\Models\WebSetting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    #[Layout('layouts.app')]
    public $name;
    public $tag_line;
    public $copy_right;
    public $logo;
    public $favicon;
    public $footer_logo;
    public $email;
    public $phone;
    public $address;
    public $map;
    public $facebook;
    public $instagram;
    public $twitter;
    public $linkedin;
    public $pinterest;
    public $youtube;
    public $whatsapp;
    public $telegram;
    public $url;
    public $new_logo;
    public $new_favicon;
    public $new_footer_logo;

    public $analyzier;
    public $slug;
    public $user_id;
    public $password;
    public $status;
    public $amazonId;
    public $analyzer2;
    public $goodReadId;
    public $gslug;
    public $gtoken;
    public $gstatus;
    public $actor_id;
    public $gplatform;
    public $platform;
    
    public function mount()
    {
        $setting = WebSetting::find(1);
        if ($setting) {
            $this->name = $setting->name;

            $this->tag_line = $setting->tag_line;
            $this->copy_right = $setting->copy_rights;
            $this->logo = $setting->logo;
            $this->favicon = $setting->favicon;
            $this->footer_logo = $setting->footer_logo;
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->facebook = $setting->facebook;
            $this->instagram = $setting->instagram;
            $this->twitter = $setting->twitter;
            $this->linkedin = $setting->linkedin;
            $this->pinterest = $setting->pinterest;
            $this->youtube = $setting->youtube;
            $this->whatsapp = $setting->whatsapp;
            $this->telegram = $setting->telegram;
            $this->url = $setting->url;

        } else {
            $setting = new WebSetting();
            $setting->save();
        }
        $analyzer = Analyizer::where('name', 'Amazon')->first();
        if ($analyzer) {
            $this->amazonId = $analyzer->id;
            $this->analyzier = $analyzer->name;
            $this->slug = $analyzer->slug;
            $this->user_id = $analyzer->user_id;
            $this->password = $analyzer->password;
            $this->status = $analyzer->status;
            $this->platform = $analyzer->platfrom;
        } else {
            $analyzer = new Analyizer();
            $analyzer->name = 'Amazon';
            $analyzer->slug = 'amazon';
            $analyzer->user_id = 'user';
            $analyzer->password = 'password';
            $analyzer->platfrom = 'amazon';
            $analyzer->status = 'active';
            $analyzer->save();
            $this->amazonId = $analyzer->id;
        }
        $analyzer2 = Analyizer::where('name', 'GoodReads')->first();
        if ($analyzer2) {
            $this->goodReadId = $analyzer2->id;
            $this->analyzer2 = $analyzer2->name;
            $this->gslug = $analyzer2->slug;
            $this->gtoken = $analyzer2->token;
            $this->actor_id = $analyzer2->actor_id;
            $this->gstatus = $analyzer2->status;
            $this->gplatform = $analyzer2->platfrom;
        } else {
            $analyzer2 = new Analyizer();
            $analyzer2->name = 'GoodReads';
            $analyzer2->slug = 'goodreads';
            $analyzer2->token = '<KEY>';
            $analyzer2->actor_id = '<actor_id>';
            $analyzer->platfrom = 'goodreads';
            $analyzer2->status = 'active';
            $analyzer2->save();
            $this->goodReadId = $analyzer2->id;
        }
    }
    public function genAmazonSlug()
    {
        $this->slug = Str::slug($this->analyzier, '-');
    }
    public function genGoodReadSlug()
    {
        $this->gslug = Str::slug($this->analyzer2, '-');
    }
    public function saveGoodReads()
    {
        $this->validate([
            'analyzer2' => 'required',
            'gslug' => 'required|string|unique:analyizers,slug,' . $this->goodReadId,
            'gtoken' => 'required',
            'gstatus' => 'required|in:active,inactive',
            'actor_id' => 'required|unique:analyizers',
            'gplatform'=>'required|in:goodreads'
        ]);
        $analyzer = Analyizer::find($this->goodReadId);
        $analyzer->name = $this->analyzer2;
        $analyzer->slug = $this->gslug;
        $analyzer->token = $this->gtoken;
        $analyzer->status = $this->gstatus;
        $analyzer->actor_id = $this->actor_id;
        $analyzer->platfrom = $this->gplatform;
        $analyzer->save();
        $this->alert('success', 'Successfully Saved');
    }
    public function saveAmazon()
    {
        $this->validate([
            'analyzier' => 'required',
            'slug' => 'required|string|unique:analyizers,slug,' . $this->amazonId,
            'user_id' => 'required|unique:analyizers,token,' . $this->amazonId,
            'password'=>'required',
            'platform'=>'required|in:amazon',
            'status' => 'required|in:active,inactive',
        ]);
        try {
            $analyzer = Analyizer::where('name', $this->analyzier)->first();

            $analyzer->name = $this->analyzier;
            $analyzer->slug = $this->slug;
            $analyzer->user_id = $this->user_id;
            $analyzer->password = $this->password;
            $analyzer->platfrom = $this->platform;
            $analyzer->status = $this->status;
            $analyzer->save();
            $this->alert('success', 'amazon has been created successfully');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function saveData()
    {
        $this->validate([
            'name' => 'required',
            'tag_line' => 'required',
            'copy_right' => 'required',
            'new_logo' => 'nullable|image|max:2048',
            'new_favicon' => 'nullable|image|max:2048',
            'new_footer_logo' => 'nullable|image|max:2048',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'map' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'pinterest' => 'required',
            'youtube' => 'required',
            'whatsapp' => 'required',
            'telegram' => 'required',
            'url' => 'nullable|url',
        ]);
        $setting = WebSetting::find(1);
        if ($setting) {
            $setting->name = $this->name;

            $setting->tag_line = $this->tag_line;
            $setting->copy_rights = $this->copy_right;
            if ($this->new_logo) {
                $image = Carbon::now()->timestamp . '.' . $this->new_logo->extension();
                $this->new_logo->storeAs('assets/images/logos', $image);
                $setting->logo = $image;
            }
            if ($this->new_favicon) {
                $image = Carbon::now()->timestamp . '.' . $this->new_favicon->extension();
                $this->new_favicon->storeAs('assets/images/logos', $image);
                $setting->favicon = $image;
            }
            if ($this->new_footer_logo) {
                $image = Carbon::now()->timestamp . '.' . $this->new_footer_logo->extension();
                $this->new_footer_logo->storeAs('assets/images/logos', $image);
                $setting->footer_logo = $image;
            }

            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->address = $this->address;
            $setting->map = $this->map;
            $setting->facebook = $this->facebook;
            $setting->instagram = $this->instagram;
            $setting->twitter = $this->twitter;
            $setting->linkedin = $this->linkedin;
            $setting->pinterest = $this->pinterest;
            $setting->youtube = $this->youtube;
            $setting->whatsapp = $this->whatsapp;
            $setting->telegram = $this->telegram;
            $setting->url = $this->url;
            $setting->save();
            $this->alert('success', 'setting successfully saved');
        } else {
            $this->alert('error', 'please check your settings');
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.setting-component');
    }
}
