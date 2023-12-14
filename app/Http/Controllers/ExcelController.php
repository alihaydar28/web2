<?php

namespace App\Http\Controllers;
// app/Http/Controllers/ExcelController.php

use App\Exports\AttendeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class ExcelController extends Controller
{
    public function exportAttendeesToExcel($classId)
    {
        $attendeesExport = new AttendeesExport();

        return Excel::download($attendeesExport, 'attendees.xlsx');
    }
}
