<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Export_model');
    }

    private function sendResponse($status, $message, $input_data, $response_code)
    {
        $data['status'] = $status;

        $data['message'] = $message;

        $data['data'] = $input_data;

        $this->response($data, $response_code);
    }

    public function index_get()
    {

        $user_id = $this->get('user_id');

        $keramba_id = $this->get('keramba_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($keramba_id === null) {
            $this->sendResponse(false, "Keramba Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {

            $keramba = $this->Export_model->getKerambaInfo($keramba_id);

            $spreadsheet = new Spreadsheet;
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Laporan Panen')
                ->setCellValue('A3', 'Nama Keramba')
                ->setCellValue('B3', $keramba['nama'])
                ->setCellValue('A4', 'Diameter (m)')
                ->setCellValue('B4', $keramba['ukuran'])
                ->setCellValue('A5', 'Tanggal Installasi')
                ->setCellValue('B5', $keramba['tanggal_install']);

            $listPanen = $this->Export_model->getPanenList($keramba_id);

            if (count($listPanen) > 0) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A8', 'Data Hasil Panen')
                    ->setCellValue('A9', 'No')
                    ->setCellValue('B9', 'Jenis Biota')
                    ->setCellValue('C9', 'Panjang (cm)')
                    ->setCellValue('D9', 'Bobot (gr)')
                    ->setCellValue('E9', 'Jumlah Hidup')
                    ->setCellValue('F9', 'jumlah Mati')
                    ->setCellValue('G9', 'Tanggal Panen')
                    ->setCellValue('H9', 'Tanggal Tebar');

                $kolom = 10;
                $nomor = 1;
                foreach ($listPanen as $panen) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $panen['jenis_biota'])
                        ->setCellValue('C' . $kolom, $panen['panjang'])
                        ->setCellValue('D' . $kolom, $panen['bobot'])
                        ->setCellValue('E' . $kolom, $panen['jumlah_hidup'])
                        ->setCellValue('F' . $kolom, $panen['jumlah_mati'])
                        ->setCellValue('G' . $kolom, $panen['tanggal_panen'])
                        ->setCellValue('H' . $kolom, $panen['tanggal_tebar']);
                    $kolom++;
                    $nomor++;
                }
            }

            $listBiotaData = $this->Export_model->getBiotaData($keramba_id);

            if (count($listBiotaData) > 0) {

                $biota = [];

                for ($i = 0; $i < count($listBiotaData); $i++) {
                    $biotaKeys = array_keys($biota);
                    if (in_array($listBiotaData[$i]['jenis_biota'], $biotaKeys)) {
                        $c = count($biota[$listBiotaData[$i]['jenis_biota']]);
                        $biota[$listBiotaData[$i]['jenis_biota']][$c]['panjang'] = $listBiotaData[$i]['panjang'];
                        $biota[$listBiotaData[$i]['jenis_biota']][$c]['bobot'] = $listBiotaData[$i]['bobot'];
                        $biota[$listBiotaData[$i]['jenis_biota']][$c]['tanggal_ukur'] = $listBiotaData[$i]['tanggal_ukur'];
                    } else {
                        $biota[$listBiotaData[$i]['jenis_biota']][0]['panjang'] = $listBiotaData[$i]['panjang'];;
                        $biota[$listBiotaData[$i]['jenis_biota']][0]['bobot'] = $listBiotaData[$i]['bobot'];
                        $biota[$listBiotaData[$i]['jenis_biota']][0]['tanggal_ukur'] = $listBiotaData[$i]['tanggal_ukur'];
                    }
                }


                $kolom += 2;
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $kolom, 'Data Pengukuran Biota');

                $biotaKeys = array_keys($biota);
                $kolom++;
                $nomor = 1;
                foreach ($biotaKeys as $key) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, 'No')
                        ->setCellValue('B' . $kolom, 'Biota')
                        ->setCellValue('C' . $kolom, 'Panjang (cm)')
                        ->setCellValue('D' . $kolom, 'Bobot (gr)')
                        ->setCellValue('E' . $kolom, 'Tanggal Ukur');

                    $kolom++;
                    foreach ($biota[$key] as $row) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $key)
                            ->setCellValue('C' . $kolom, $row['panjang'])
                            ->setCellValue('D' . $kolom, $row['bobot'])
                            ->setCellValue('E' . $kolom, $row['tanggal_ukur']);
                        $kolom++;
                        $nomor++;
                    }

                    $kolom += 1;
                    $nomor = 1;
                }
            }

            $startDate = $this->Export_model->getMinTanggalTebar($keramba_id);
            $endDate = $this->Export_model->getMaxTanggalPanen($keramba_id);

            $listFeeding = $this->Export_model->getBiotaFeeding($startDate, $endDate, $keramba_id);

            $kolom--;
            if (count($listFeeding) > 0) {
                $kolom += 2;
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $kolom, 'Data Pemberian Pakan');

                $kolom++;
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $kolom, 'No')
                    ->setCellValue('B' . $kolom, 'Tanggal')
                    ->setCellValue('C' . $kolom, 'Jam')
                    ->setCellValue('D' . $kolom, 'Ukuran Tebar')
                    ->setCellValue('E' . $kolom, 'Jenis Pakan');

                $kolom++;
                foreach ($listFeeding as $feeding) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $feeding['tanggal_feeding'])
                        ->setCellValue('C' . $kolom, $feeding['jam_feeding'])
                        ->setCellValue('D' . $kolom, $feeding['ukuran_tebar'])
                        ->setCellValue('E' . $kolom, $feeding['jenis_pakan']);
                    $kolom++;
                    $nomor++;
                }
            }

            // $this->sendResponse(true, "", $biota, self::HTTP_OK);
            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="laporan-panen-' . $keramba["nama"] . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
    }
}