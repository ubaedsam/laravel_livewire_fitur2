<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Exports\AppointmentExport;
use Livewire\Component;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointment;
use Maatwebsite\Excel\Excel;

class ListAppointments extends AdminComponent
{
    // Sweet alert delete data
    protected $listeners = ['deleteConfirmed' => 'deleteAppointment'];

    public $appointmentIdBeingRemoved = null;

    // Filter data by status
    public $status = null;
    protected $queryString = ['status'];

    // Untuk tempat filter memilih data yang ingin di hapus atau mengubah status
    public $selectedRows = [];

    // Untuk keterangan data yang dipilih apakah semua atau tidak
    public $selectPageRows = false;

    public function confirmAppointmentRemoval($appointmentId)
    {
        $this->appointmentIdBeingRemoved = $appointmentId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAppointment()
    {
        $appointment = Appointment::findOrFail($this->appointmentIdBeingRemoved);

        $appointment->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Appointment berhasil dihapus']);
    }

    public function filterAppointmentsByStatus($status = null)
    {
        $this->resetPage();

        $this->status = $status;
    }

    // Untuk mengubah perubahan data yang dipilih
    public function updatedselectPageRows($value)
    {
        // dd($value); // untuk mengecek sementara

        if($value){
            $this->selectedRows = $this->appointments->pluck('id')->map(function($id){
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    // Untuk mengambil data dari tabel di database
    public function getAppointmentsProperty()
    {
        return Appointment::with('client')
        ->when($this->status, function ($query, $status){
            return $query->where('status', $status);
        })
        ->orderBy('order_position', 'asc')
        ->paginate(10);
    }

    // Untuk menghapus semua data yang dipilih
    public function deleteSelectedRows()
    {
        Appointment::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Semua data yang dipilih berhasil dihapus']);

        $this->reset(['selectPageRows', 'selectedRows']);
    }

    // Untuk mengubah status data appointment menjadi scheduled
    public function markAllAsScheduled()
    {
        Appointment::whereIn('id', $this->selectedRows)->update(['status' => 'SCHEDULED']);

        $this->dispatchBrowserEvent('updated', ['message' => 'Semua data yang dipilih berhasil diubah status menjadi SCHEDULED']);

        $this->reset(['selectPageRows', 'selectedRows']);
    }

    // Untuk mengubah status data appointment menjadi closed
    public function markAllAsClosed()
    {
        Appointment::whereIn('id', $this->selectedRows)->update(['status' => 'CLOSED']);

        $this->dispatchBrowserEvent('updated', ['message' => 'Semua data yang dipilih berhasil diubah status menjadi CLOSED']);

        $this->reset(['selectPageRows', 'selectedRows']);
    }

    // Export data excel (costum)
    public function exportExcel()
    {
        return (new AppointmentExport($this->selectedRows))->download('Data Appointments.xls');
    }

    // Untuk drag and drop data appointment berdasarkan id
    public function updateAppointmentOrder($items)
    {
        foreach($items as $item){
            Appointment::find($item['value'])->update(['order_position' => $item['order']]);
        }

        $this->dispatchBrowserEvent('updated', ['message' => 'Data appointment berhasil di pindahkan']);
    }

    public function render()
    {
        // $appointments = Appointment::with('client')
        // ->when($this->status, function ($query, $status){
        //     return $query->where('status', $status);
        // })
        // ->latest()
        // ->paginate('1');

        $appointments = $this->appointments; // untuk select data

        $appointmentsCount = Appointment::count();
        $scheduledAppointmentsCount = Appointment::where('status', 'scheduled')->count();
        $closedAppointmentsCount = Appointment::where('status', 'closed')->count();

        return view('livewire.admin.appointments.list-appointments',[
            'appointments' => $appointments,
            'appointmentsCount' => $appointmentsCount,
            'scheduledAppointmentsCount' => $scheduledAppointmentsCount,
            'closedAppointmentsCount' => $closedAppointmentsCount,
        ]);
    }
}
