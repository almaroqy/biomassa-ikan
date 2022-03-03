<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class Feeding extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Feeding_model');
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

        $activity_id = $this->get('activity_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($keramba_id == null) {
            $this->sendResponse(false, "Keramba Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {

            if ($activity_id === null) {
                $feeding = $this->Feeding_model->getFeeding($keramba_id);

                $this->sendResponse(true, "", $feeding, self::HTTP_OK);
            } else {
                $feeding = $this->Feeding_model->getFeeding($keramba_id, $activity_id);

                $this->sendResponse(true, "", $feeding, self::HTTP_OK);
            }
        }
    }

    public function index_post()
    {
        $input['tanggal_feeding'] = $this->post('tanggal_feeding');

        $input['keramba_id'] = $this->post('keramba_id');

        $user_id = $this->post('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            $input['user_id'] = $user_id;

            try {
                if ($this->Feeding_model->createFeeding($input) > 0) {
                    $this->sendResponse(true, "Data Berhasil Ditambahkan", [], self::HTTP_CREATED);
                } else {
                    $this->sendResponse(false, "Data Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
                }
            } catch (Exception $e) {
                $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_put()
    {
        $activity_id = $this->put('activity_id');

        $input['tanggal_feeding'] = $this->put('tanggal_feeding');

        $input['keramba_id'] = $this->put('keramba_id');

        $input['user_id'] = $this->put('user_id');

        if ($this->put('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            try {
                $res = $this->Feeding_model->updateFeeding($input, $activity_id);

                if ($res > 0) {
                    $this->sendResponse(true, "Data Berhasil Diubah", [], self::HTTP_OK);
                } else {
                    $this->sendResponse(false, "Tidak Ada Perubahan Data", [], self::HTTP_BAD_REQUEST);
                }
            } catch (Exception $e) {
                $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_delete()
    {
        $activity_id = $this->delete('activity_id');

        $user_id = $this->delete('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($activity_id === null) {
            $this->sendResponse(false, "Activity Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            if ($this->Feeding_model->deleteFeeding($activity_id) > 0) {
                $this->sendResponse(true, "Delete Data Berhasil", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Activity Id Tidak Ditemukan", [], self::HTTP_BAD_REQUEST);
            }
        }
    }

    public function detail_get()
    {
        $user_id = $this->get('user_id');

        $activity_id = $this->get('activity_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($activity_id == null) {
            $this->sendResponse(false, "Activity Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            $detail = $this->Feeding_model->getFeedingDetail($activity_id);

            $this->sendResponse(true, "", $detail, self::HTTP_OK);
        }
    }

    public function detail_post()
    {
        $input['activity_id'] = $this->post('activity_id');

        $input['ukuran_tebar'] = $this->post('ukuran_tebar');

        $input['jam_feeding'] = $this->post('jam_feeding');

        $input['pakan_id'] = $this->post('pakan_id');

        $user_id = $this->post('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            if ($this->Feeding_model->createDetailFeeding($input) > 0) {
                $this->sendResponse(true, "Data Berhasil Ditambahkan", [], self::HTTP_CREATED);
            } else {
                $this->sendResponse(false, "Data Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }

    public function detail_delete()
    {
        $detail_id = $this->delete('detail_id');

        $user_id = $this->delete('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($detail_id === null) {
            $this->sendResponse(false, "Detail Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            if ($this->Feeding_model->deleteDetailFeeding($detail_id) > 0) {
                $this->sendResponse(true, "Delete Data Berhasil", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Detail Id Tidak Ditemukan", [], self::HTTP_BAD_REQUEST);
            }
        }
    }
}
