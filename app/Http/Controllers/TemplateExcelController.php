<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\NamedRange;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class TemplateExcelController extends Controller
{
    public function generatePosyandu()
    {
        $spreadsheet = new Spreadsheet();
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Sheet1');

        $sheet1->setCellValue('A1', 'Header1');
        $sheet1->setCellValue('B1', 'Header2');
        $sheet1->setCellValue('C1', 'Header3');
        $sheet1->setCellValue('D1', 'Header4');
        $sheet1->setCellValue('E1', 'Header5');
        $sheet1->setCellValue('F1', 'Header6');
        $sheet1->setCellValue('G1', 'Select Product'); // Header untuk dropdown list

        // Buat sheet kedua dan tambahkan data produk
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Sheet2');
        $sheet2->setCellValue('A1', 'Product');
        $sheet2->setCellValue('A2', 'Apple');
        $sheet2->setCellValue('A3', 'Banana');
        $sheet2->setCellValue('A4', 'Cherry');

        // Tambahkan nama rentang untuk data produk
        $spreadsheet->addNamedRange(new NamedRange('ProductList', $sheet2, 'A2:A4'));

        // Buat dropdown list (data validation) di kolom ketujuh Sheet1 (kolom G) mulai dari baris kedua
        $validation = $sheet1->getCell('G2')->getDataValidation();
        $validation->setType(DataValidation::TYPE_LIST);
        $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
        $validation->setAllowBlank(false);
        $validation->setShowInputMessage(true);
        $validation->setShowErrorMessage(true);
        $validation->setShowDropDown(true);
        $validation->setFormula1('=ProductList');

        // Terapkan data validation ke rentang yang lebih besar jika perlu
        $sheet1->getCell('G2')->setDataValidation(clone $validation);
        for ($row = 3; $row <= 100; $row++) { // Misalnya, untuk baris 2 sampai 100
            $sheet1->getCell("G$row")->setDataValidation(clone $validation);
            // Simpan file Excel
        }
        $tulis = new Xlsx($spreadsheet);
        $namaFile = 'data_posyandu.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $namaFile);
        $tulis->save($temp_file);
        return response()->download($temp_file, $namaFile, ['Cache-Control' => 'no-cache, must-revalidate'])->deleteFileAfterSend(true);

        return redirect()->route('psynd.index');
    }
}
