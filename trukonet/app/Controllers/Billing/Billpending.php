<?php

namespace App\Controllers\Billing;

use App\Models\BillingModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Billpending extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
    }
    public function getRows()
    {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $sortField = isset($_GET['sortField']) ? $this->request->getGet('sortField') : 'id';
        $sortOrder = isset($_GET['sortOrder']) ? $this->request->getGet('sortOrder') : 'asc';
        $offset = ($pageIndex - 1) * $limit;
        // if($offset < 1){
        //     $offset = 1;
        // }

        //        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';
        
            $where = "lunas=0 and (customer_dpp.id_pelanggan like'%$search%' or customer.nama like'%$search%')";
        
        $model = new BillingModel();
        $result = $model->getBillPaging($limit, $offset, $where, $sortField, $sortOrder);

        $result['success'] = true;

        // echo json_encode($result);
        return $this->response->setJSON($result);
    }

    public function setPayment()
    {
        $model = new BillingModel();
        $data = $this->request->getGetPost();
        $tgllunas = date("Y-m-d");
        $reflunas = $model->getsetMasterCode(true, 'infouser', 'IBA' . date("Ymd") . '-', true, 1);
        $retval = $model->updateBuild(
            'customer_dpp',
            array('lunas' => 1, 'tgl_lunas' => $tgllunas, 'ref_lunas' => $reflunas),
            array('lunas' => 0,'thbl' => $data["thbl"], 'id_pelanggan' => $data["id_pelanggan"])
        );
        
        if ($retval > 0) {
            $results['success'] = true;
            // $results['message'] = $data['cmd'];
            $results['message'] = 'Execute successfully';
            $results['data'] = array('tgl_lunas' => $tgllunas, 'ref_lunas' => $reflunas);
        }else{
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }
        // $results['success'] = true;
        // $results['message'] = 'Execute successfully ' . $data["id_pelanggan"];

        return $this->response->setJSON($results);

    }

    public function setCode()
    {
        $model = new BillingModel();
        $retval = $model->getsetMasterCode(false, 'infouser', 'IBA' . date("Ymd") . '-', true, 1);
        echo $retval;
    }
}