<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class UsersCount extends Component
{
    public $usersCount;

    // Tempat untuk mengambil data yang telah di hitung
    public function mount()
    {
        $this->getUsersCount();
    }

    // Untuk menghitung berapa banyak data
    public function getUsersCount($option = 'TODAY')
    {
        $this->usersCount = User::query()
        ->whereBetween('created_at', $this->getDateRange($option))
        ->count();
    }

    // Untuk panjang nilai data user
    public function getDateRange($option)
    {
        // Data Hari ini
        if($option == 'TODAY'){
            return [now()->today(), now()];
        }

        if($option == 'MTD'){
            return [now()->firstOfMonth(), now()];
        }

        if($option == 'YTD'){
            return [now()->firstOfYear(), now()];
        }

        return [now()->subDays($option), now()];
    }

    public function render()
    {
        return view('livewire.admin.dashboard.users-count');
    }
}
