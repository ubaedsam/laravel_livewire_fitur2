<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\AdminComponent;
use Illuminate\Validation\Rule;

class ListUsers extends AdminComponent
{
    use WithFileUploads;

    // Tempat data yang akan dikelola dalam bentuk array
    public $state = [];

    // untuk mengambil data user yang ingin diubah
    public $user;

    // Box modal edit user
    public $showEditModal = false;

    // untuk menghapus data user
    public $userIdBeingRemoved = null;

    // Fitur Search Data
    public $searchTerm = null;

    // untuk upload gambar
    public $photo;

    // Untuk sorting data
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    // Fix bug multiple halaman pencarian data setelah ada fitur sortBy
    protected $queryString = ['searchTerm' => ['except' => '']];

    // Untu mengubah role akses halaman user
    public function changeRole(User $user, $role)
    {
        Validator::make(['role' => $role], [
            'role' => [
                'required',
                Rule::in(User::ROLE_ADMIN, User::ROLE_USER),
            ],
            'role' => 'required|in:admin,user',
        ])->validate();

        $user->update(['role' => $role]);

        $this->dispatchBrowserEvent('updated', ['message' => "Role User berhasil diubah ke {$role}"]);
    }

    // Box Modal Add User
    public function addNew()
    {
        // $this->state = []; // untuk me reset histori data di modal

        $this->reset();

        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }

    // Proses add user
    public function createUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        if($this->photo){
            $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        }

        User::create($validatedData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User berhasil ditambahkan']);
    }

    // Modal edit user sekalian mengambil data user yang ingin di ubah
    public function edit(User $user)
    {
        $this->reset();

        $this->showEditModal = true;

        $this->user = $user;

        $this->state = $user->toArray();

        $this->dispatchBrowserEvent('show-form');
    }

    // Proses edit user
    public function updateUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if(!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        if($this->photo){
            Storage::disk('avatars')->delete($this->user->avatar);
            $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        }

        $this->user->update($validatedData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User berhasil diubah']);
    }

    // Box modal delete user
    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    // Proses delete user
    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User berhasil dihapus!']);
    }

    // Untuk proses sorting data by asc or desc
    public function sortBy($columnName)
    {
        if($this->sortColumnName === $columnName){
            $this->sortDirection = $this->swapSortDirection();
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    // untuk perggantian sorting data
    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    // Fix bug multiple halaman pencarian data setelah ada fitur sortBy
    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
        ->where('name', 'like', '%'.$this->searchTerm.'%')
        ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
        ->orderBy($this->sortColumnName, $this->sortDirection)
        ->paginate(5);

        return view('livewire.admin.users.list-users',['users'=>$users]);
    }
}
