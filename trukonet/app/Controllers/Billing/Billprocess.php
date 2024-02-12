<?php

namespace App\Controllers\Billing;

use App\Controllers\BaseController;
use App\Models\BillingModel;
use CodeIgniter\API\ResponseTrait;

class Billprocess extends BaseController
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
        $search = isset($_GET['query']) ? $this->request->getGet('query') : array();
        $thbl = isset($_GET['thbl']) ? $this->request->getGet('thbl') : date('Ym');
        $sortField = isset($_GET['sortField']) ? $this->request->getGet('sortField') : 'id';
        $sortOrder = isset($_GET['sortOrder']) ? $this->request->getGet('sortOrder') : 'asc';
        $offset = ($pageIndex - 1) * $limit;
        // if($offset < 1){
        //     $offset = 1;
        // }

        //        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';

        // $where = "thbl='$search[thbl]'";
        if (count($search) > 0) {
            $where = "thbl='$search[thbl]'";
            $where .= " and (customer_dpp.id_pelanggan like'%$search[cari]%' or customer.nama like'%$search[cari]%')";
        }else{
            $where = "thbl='$thbl'";
        }


        $model = new BillingModel();
        $result = $model->getBillPaging($limit, $offset, $where, $sortField, $sortOrder);

        $result['success'] = true;

        // echo json_encode($result);
        return $this->response->setJSON($result);
    }

    public function genBill(){
        $data = $this->request->getGetPost();
        $retval = 0;


        $user = session()->get('username');
        $model = new BillingModel();
        $result = $model->SP_execData(
            'hitung_billing',
            array(
                $data["thbl"]
            )
        );
        if ($result['success']) {
            $retval = 1;
        }


        if ($retval > 0) {
            $results['success'] = true;
            $results['message'] = 'Execute successfully';
        } else {
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }

        return $this->response->setJSON($results);
    }

    public function getBillRekap()
    {
        $data = $this->request->getGet();
        $retval = 0;

// $data=array('tgl'=>'2024-01-26');
        $user = session()->get('username');
        $model = new BillingModel();
        $retval=$model->selectQuery("
        Select count(id_pelanggan) as pelanggan,sum(bi_admin) as admin, sum(tagihan) as tagihan, 
        sum(total_tagihan) total_tagihan from customer_dpp 
        where tgl_lunas='$data[tgl]'");

        $result['success'] = true;
        $result['data'] = ($retval->getResultObject())[0];
        // echo json_encode($result);
        return $this->response->setJSON($result);
    }
}
