<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\GSheetModel;

class CustomerController extends BaseController
{

    public function index()
    {
        //
    }
    public function getRows()
    {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 20;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex-1)*$limit;

        $gmodel = new GSheetModel();
        $values = $gmodel->getCustomer();
        $data = array();
        $arr = array();
        $i = 0;
        foreach ($values as $v) {
            if (empty($v[0])) {
                break;
            }
            if($v[0] == 'No'){
                continue;
            }
            if (empty($v[11])) {
                $arr = array(
                    'no' => $v[0],
                    'nama' => $v[1],
                    'kontak' => $v[3],
                    'desa' => $v[5],
                    'dusun' => $v[6],
                    'rtrw' => $v[7],
                    'idpel' => $v[8],
                    'paket' => $v[9],
                    'counter' => ($i + 1)
                );
                if ($i >= $offset && $i < ($limit * $pageIndex)) {
                    array_push($data, $arr);
                }

                $i++;
            }
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result["totalCount"]= $i;
        $result["offset"]=$offset;
        $result["limit"]=$limit;
        echo json_encode($result);
    }
}