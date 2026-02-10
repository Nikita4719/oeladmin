<?php

namespace App\Exports;

use App\Models\StudentByAgent;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromCollection, WithHeadings
{
    protected $leads;

    public function __construct($leads)
    {
        $this->leads = $leads;
    }

    public function headings(): array
    {
        $tableColumns = Schema::getColumnListing((new StudentByAgent())->getTable());
        $headings = array_map('ucfirst', $tableColumns);
        return $headings;
    }
    public function collection()
    {
        return $this->leads;
    }
}
