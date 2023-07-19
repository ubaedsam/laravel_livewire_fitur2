<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class CreateAppointmentForm extends Component
{
    // State ini adalah tempat data yang ingin disimpan
    public $state = [
        'status' => 'SCHEDULED', // Default data status
    ];

    public function createAppointment()
    {
        // Validation
        Validator::make($this->state, [
            'client_id' => 'required',
            'members' => 'required',
            'color' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required|in:SCHEDULED,CLOSED',
        ],[
            'client_id.required' => 'Data client wajib di isi!'
        ])->validate();
        
        Appointment::create($this->state);

        $this->dispatchBrowserEvent('alert', ['message'=>'Appointment berhasil ditambahkan!']);
    }

    public function render()
    {
        $clients = Client::all();

        return view('livewire.admin.appointments.create-appointment-form',['clients' => $clients]);
    }
}
