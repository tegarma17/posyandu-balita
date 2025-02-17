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
        $sheet1->setTitle('Sheet1');

        $sheet1->setCellValue('A1', 'NIK');
        $sheet1->setCellValue('B1', 'Kode Nakes');
        $sheet1->setCellValue('C1', 'Nama');
        $sheet1->setCellValue('D1', 'Jenis Kelamin');
        $sheet1->setCellValue('E1', 'Pilih Posisi');
        $sheet1->setCellValue('F1', 'Alamat');
        $sheet1->setCellValue('G1', 'Nomer HP / WA');

        $sheet1->getStyle('G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

        // template isi yang akan disii
        $sheet1->setCellValue('K2', 'Kode Nakes');
        $sheet1->setCellValue('K3', 'NKS001 / KDR001');
        $sheet1->setCellValue('J2', 'Jenis Kelamin');
        $sheet1->setCellValue('J3', 'L / P');
        $sheet1->setCellValue('K2', 'Posisi');
        $sheet1->setCellValue('K3', 'Ketik Angka 2 dan 3');
        $sheet1->setCellValue('K4', '2 ( Kader )');
        $sheet1->setCellValue('K5', '3 ( Nakes )');


        $sheet1->getStyle('A1:G1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet1->getStyle('A1:G1')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);

        $tulis = new Xlsx($spreadsheet);
        $namaFile = 'data_nakes.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $namaFile);
        $tulis->save($temp_file);
        return response()->download($temp_file, $namaFile, ['Cache-Control' => 'no-cache, must-revalidate'])->deleteFileAfterSend(true);

        return redirect()->route('nakes.index');
    }
}
