<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AppointmentExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $selectedRows;

    public function __construct($selectedRows)
    {
        $this->selectedRows = $selectedRows;        
    }

    public function map($appointment): array
    {
        return [
            $appointment->id,
            $appointment->client->name,
            $appointment->date,
            $appointment->time,
            $appointment->status,
        ];
    }

    public function headings(): array
    {
        return [
            '#NO',
            'Client Name',
            'Date',
            'Time',
            'Status',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Appointment::with('client:id,name')->whereIn('id', $this->selectedRows);
    }
}
