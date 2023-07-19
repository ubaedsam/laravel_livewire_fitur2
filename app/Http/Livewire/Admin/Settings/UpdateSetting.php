<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class UpdateSetting extends Component
{
    public $state = [];

    // Menampilkan data yang telah ditambahkan atau diubah
    public function mount()
    {
        $setting = Setting::first();

        if($setting){
            $this->state = $setting->toArray();
        }
    }

    // Proses menambah dan mengubah
    public function updateSetting()
    {
        $setting = Setting::first();

        if($setting){
            // update
            $setting->update($this->state);
        }else{
            // create
            Setting::create($this->state);
        }

        Cache::forget('setting');

        $this->dispatchBrowserEvent('updated',  ['message' => 'Setting website berhasil diubah']);
    }

    public function render()
    {
        return view('livewire.admin.settings.update-setting');
    }
}