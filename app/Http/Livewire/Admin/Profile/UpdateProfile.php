<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Actions\Fortify\UpdateUserProfileInformation;

class UpdateProfile extends Component
{
    use WithFileUploads;
    
    public $image;

    public $state = [];

    // Mengambil data user untuk edit profile (menggunakan library fortify)
    public function mount()
    {
        $this->state = auth()->user()->only(['name','email']);
    }

    // Mengubah data gambar
    public function updatedImage()
    {
        $previousPath = auth()->user()->avatar;

        $path = $this->image->store('/', 'avatars');

        auth()->user()->update(['avatar' => $path]);

        Storage::disk('avatars')->delete($previousPath);

        $this->dispatchBrowserEvent('updated', ['message' => 'Profile berhasil diubah']);
    }

    // Untuk membersihkan gambar lama
    // protected function cleanupOldUploads()
    // {
    //     $storage = Storage::disk('local');

    //     foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
    //         $yesterdaysStamp = now()->subSeconds(4)->timestamp;
    //         if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
    //             $storage->delete($filePathname);
    //         }
    //     }
    // }

    // Mengubah data profile (menggunakan library fortify)
    public function updateProfile(UpdateUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'name' => $this->state['name'],
            'email' => $this->state['email']
        ]);

        $this->emit('nameChanged', auth()->user()->name); // untuk menggubah perubahan nama di berbagai halaman

        $this->dispatchBrowserEvent('updated', ['message' => 'Data profile berhasil diubah']);
    }

    // Mengubah data password (menggunakan library fortify)
    public function changePassword(UpdatesUserPasswords $updater)
    {
        // Untuk proses mengubah data password
        $updater->update(
            auth()->user(),
            $attributes = Arr::only($this->state, ['current_password', 'password', 'password_confirmation'])
        );

        // Untuk mengkosongkan form input data password
        collect($attributes)->map(function ($value, $key){
            $this->state[$key] = '';
        });
        
        // Untuk eksekusi
        $this->dispatchBrowserEvent('updated', ['message' => 'Data password berhasil diubah']);
    }

    public function render()
    {
        return view('livewire.admin.profile.update-profile');
    }
}
