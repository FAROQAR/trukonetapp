<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers\Masterlist;

use App\Models\MasterModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

/**
 * Description of Bumdesmalist
 *
 * @author nasywan
 */
class Bumdesmalist extends BaseController {

    //put your code here
    use ResponseTrait;

    public function index() {
        $model = new MasterModel();
        $result = $model->loadBma();
        $result['success'] = true;
        $result['data'] = $result[0];

        return $this->respond($result, 200);
    }
    

    public function getRows() {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex-1)*$limit;
        $offset = 0;
//        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';
        if (strlen($search) > 0) {
            $where = "(nama like'%$search%' or kecamatan like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getBmaPaging($limit, $offset, $where);
        $result['success'] = true;

        echo json_encode($result);
    }

    public function updateRows() {
        $model = new MasterModel();

        $bma_id = isset($_POST['bma_id']) ? $this->request->getPost('bma_id') : 0;
        $kode_bma = isset($_POST['kode_bma']) ? $this->request->getPost('kode_bma') : '';
        $nama = isset($_POST['nama']) ? $this->request->getPost('nama') : '';
        $tglpembentukan = isset($_POST['tglpembentukan']) ? $this->request->getPost('tglpembentukan') : '';
        $telp = isset($_POST['telp']) ? $this->request->getPost('telp') : '';
        $alamat = isset($_POST['alamat']) ? $this->request->getPost('alamat') : '';
        $kecamatan = isset($_POST['kecamatan']) ? $this->request->getPost('kecamatan') : '';
        $kabupaten = isset($_POST['kabupaten']) ? $this->request->getPost('kabupaten') : '';
        $propinsi = isset($_POST['propinsi']) ? $this->request->getPost('propinsi') : '';
        $aktif = isset($_POST['aktif']) ? $this->request->getPost('aktif') : 0;
        $logo_profile = isset($_POST['logo_profile']) ? $this->request->getPost('logo_profile') : '';
        $postdata = isset($_POST['postdata']) ? json_decode($this->request->getPost('postdata')) : array();
        $cmd = isset($_POST['cmd']) ? $this->request->getPost('cmd') : '';
        if ($cmd == 'delete') {
            $param = array(
                $cmd,
                $postdata->bma_id,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            );
        } else {
            if ($cmd == 'insert') {
                $kode_bma = $model->getsetMasterCode(0, 'bumdesma_profile', 'BMA-', 1, 4);
            }
            $validationRule = [
                'photopath' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[photopath]',
                        'is_image[photopath]',
                        'mime_in[photopath,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'max_size[photopath,100]',
                        'max_dims[photopath,1024,768]',
                    ],
                ],
            ];
            if ($this->validate($validationRule)) {
                $img = $this->request->getFile('photopath');
                // return $img;
                $results['img'] = $img;
                // return $this->respond($results, 200);
                $extfileName = $img->getClientExtension();
                $fileName = "$kode_bma.$extfileName";
                $logo_profile = $fileName;
                //            echo $fileName;
                if (file_exists('../../resources/images/profile/' . $fileName)) {
                    unlink('../../resources/images/profile/', $fileName);
                }
                $img->move('../../resources/images/profile/', $fileName);
            }


            //        $results = array();

            $param = array(
                $cmd,
                $bma_id,
                $kode_bma,
                $nama,
                $tglpembentukan,
                $telp,
                $alamat,
                $kecamatan,
                $kabupaten,
                $propinsi,
                $logo_profile,
                $aktif == 'on' ? true : false
            );
        }




        $spname = 'sp_bma';
        $result = $model->SP_execData($spname, $param);
        $data = $result->getResultArray();
        $results = [];
        if (count($data) > 0) {

            $results['success'] = $data[0]['success'];
            $results['message'] = $data[0]['message'];
        }
        return $this->respond($results, 200);

//        echo json_encode($results);
    }

}
