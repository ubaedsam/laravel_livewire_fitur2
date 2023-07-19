<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class UpdateAppointmentForm extends Component
{
    public $state = [];

    public $appointment;

    // Load data appointment yangg ingin diubah
    public function mount(Appointment $appointment)
    {
        $this->state = $appointment->toArray();

        $this->appointment = $appointment;
    }

    public function updateAppointment()
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
        
        $this->appointment->update($this->state);

        $this->dispatchBrowserEvent('alert', ['message'=>'Appointment berhasil diubah!']);
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.update-appointment-form',['clients'=>$clients]);
    }
}
