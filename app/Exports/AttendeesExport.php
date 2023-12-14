<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Attendance::select('student_id', 'AttendanceDate', 'IsPresent')->get();
    }

    public function headings(): array
    {
        return ['Student ID', 'Attendance Date', 'Is Present'];
    }
}

