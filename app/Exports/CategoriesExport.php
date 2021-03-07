<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return collect([
            [
                'Categroy1' => 'Sub_Categroy1',
                'Categroy2' => 'Sub_Categroy2',
                'Categroy3' => 'Sub_Categroy3',
                'Categroy4' => 'Sub_Categroy4',
                'Categroy5' => 'Sub_Categroy5',
                'Categroy6' => 'Sub_Categroy6',
                'Categroy7' => 'Sub_Categroy7',
                'Categroy8' => 'Sub_Categroy8',
                'Categroy9' => 'Sub_Categroy9',
            ],
            [
                'Categroy1' => 'Sub_Categroy1',
                'Categroy2' => 'Sub_Categroy2',
                'Categroy3' => 'Sub_Categroy3',
                'Categroy4' => 'Sub_Categroy4',
                'Categroy5' => 'Sub_Categroy5',
                'Categroy6' => 'Sub_Categroy6',
                'Categroy7' => 'Sub_Categroy7',
                'Categroy8' => 'Sub_Categroy8',
                'Categroy9' => 'Sub_Categroy9',
            ],
            [
                'Categroy1' => 'Sub_Categroy1',
                'Categroy2' => 'Sub_Categroy2',
                'Categroy3' => 'Sub_Categroy3',
                'Categroy4' => 'Sub_Categroy4',
                'Categroy5' => 'Sub_Categroy5',
                'Categroy6' => 'Sub_Categroy6',
                'Categroy7' => 'Sub_Categroy7',
                'Categroy8' => 'Sub_Categroy8',
                'Categroy9' => 'Sub_Categroy9',
            ],
            [
                'Categroy1' => 'Sub_Categroy1',
                'Categroy2' => 'Sub_Categroy2',
                'Categroy3' => 'Sub_Categroy3',
                'Categroy4' => 'Sub_Categroy4',
                'Categroy5' => 'Sub_Categroy5',
                'Categroy6' => 'Sub_Categroy6',
                'Categroy7' => 'Sub_Categroy7',
                'Categroy8' => 'Sub_Categroy8',
                'Categroy9' => 'Sub_Categroy9',
            ],
            [
                'Categroy1' => 'Sub_Categroy1',
                'Categroy2' => 'Sub_Categroy2',
                'Categroy3' => 'Sub_Categroy3',
                'Categroy4' => 'Sub_Categroy4',
                'Categroy5' => 'Sub_Categroy5',
                'Categroy6' => 'Sub_Categroy6',
                'Categroy7' => 'Sub_Categroy7',
                'Categroy8' => 'Sub_Categroy8',
                'Categroy9' => 'Sub_Categroy9',
            ],
            [
                'Categroy1' => 'Sub_Categroy1',
                'Categroy2' => 'Sub_Categroy2',
                'Categroy3' => 'Sub_Categroy3',
                'Categroy4' => 'Sub_Categroy4',
                'Categroy5' => 'Sub_Categroy5',
                'Categroy6' => 'Sub_Categroy6',
                'Categroy7' => 'Sub_Categroy7',
                'Categroy8' => 'Sub_Categroy8',
                'Categroy9' => 'Sub_Categroy9',
            ],

        ]);
    }

    public function headings(): array
    {
        return [
            'Categroy1',
            'Categroy2',
            'Categroy3',
            'Categroy4',
            'Categroy5',
            'Categroy6',
            'Categroy7',
            'Categroy8',
            'Categroy9',
        ];
    }

}