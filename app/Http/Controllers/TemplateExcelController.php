<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\NamedRange;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;


class TemplateExcelController extends Controller
{
    public function generetaNakes()
    {
        $spreadsheet = new Spreadsheet();
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('nakes');

        $sheet1->setCellValue('A1', 'NIK');
        $sheet1->setCellValue('B1', 'Nama');
        $sheet1->setCellValue('C1', 'Jenis Kelamin');
        $sheet1->setCellValue('D1', 'Alamat');
        $sheet1->setCellValue('E1', 'Nomer HP / WA');
        $sheet1->getStyle('A')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $sheet1->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

        $sheet1->setCellValue('J2', 'Jenis Kelamin');
        $sheet1->setCellValue('J3', 'L / P');
        $sheet1->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet1->getStyle('A1:E1')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);


        $tulis = new Xlsx($spreadsheet);
        $namaFile = 'data_nakes.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $namaFile);
        $tulis->save($temp_file);
        return response()->download($temp_file, $namaFile, ['Cache-Control' => 'no-cache, must-revalidate'])->deleteFileAfterSend(true);
        return redirect()->route('nakes.index');
    }

    public function generateKader()
    {
        $spreadsheet = new Spreadsheet();
        $sheet2 = $spreadsheet->getActiveSheet();
        $sheet2->setTitle('kader');

        $sheet2->setCellValue('A1', 'NIK');
        $sheet2->setCellValue('B1', 'Nama');
        $sheet2->setCellValue('C1', 'Jenis Kelamin');

        $sheet2->setCellValue('D1', 'Alamat');
        $sheet2->setCellValue('E1', 'Nomer HP / WA');
        $sheet2->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $sheet2->getStyle('A')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

        // template isi yang akan disii
        $sheet2->setCellValue('J2', 'Jenis Kelamin');
        $sheet2->setCellValue('J3', 'L / P');
        $sheet2->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet2->getStyle('A1:E1')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);


        $tulis = new Xlsx($spreadsheet);
        $namaFile = 'data_kader.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $namaFile);
        $tulis->save($temp_file);
        return response()->download($temp_file, $namaFile, ['Cache-Control' => 'no-cache, must-revalidate'])->deleteFileAfterSend(true);
        return redirect()->route('kader.index');
    }
}
