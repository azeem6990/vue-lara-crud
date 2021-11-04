<?php 

namespace App\Exports;

use App\Models\Tel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactExport implements FromCollection,WithHeadings {

    // set the headings
    public function headings(): array
    {
        return [
            'NAME', 'PHONE'
        ];
    }

    public function collection(){
        return collect(Tel::getContacts());
    }
}