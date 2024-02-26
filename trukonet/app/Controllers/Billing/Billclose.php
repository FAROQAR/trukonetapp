<?php

namespace App\Controllers\Billing;

use App\Models\BillingModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Billclose extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
    }
    public function getRows()
    {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 1;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $tanggal = isset($_GET['tanggal']) ? $this->request->getGet('tanggal') : '';
        $sortField = isset($_GET['sortField']) ? $this->request->getGet('sortField') : 'id';
        $sortOrder = isset($_GET['sortOrder']) ? $this->request->getGet('sortOrder') : 'asc';
        
        $offset = ($pageIndex - 1) * $limit;
        // if($offset < 1){
        //     $offset = 1;
        // }

        //        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';
        if(strlen($tanggal)>0){
            $where = "lunas=1 and tgl_lunas='$tanggal'";
        }else{
            $tglawal = (new \DateTime('first day of this month'))->format('Y-m-d');
            $tglakhir= (new \DateTime('last day of this month'))->format('Y-m-d');
            $tglakhir= date('Y-m-d');

                // $where = "lunas=1 and (tgl_lunas between '$tglawal' and '$tglakhir')";
                $where = "lunas=1 and tgl_lunas='$tglakhir'";
            
        }

        if(strlen($search)>0){
            $where .=" and (customer_dpp.id_pelanggan like'%$search%' or customer.nama like'%$search%')";
        }
        
        $model = new BillingModel();
        $result = $model->getBillPaging($limit, $offset, $where, $sortField, $sortOrder);

        $result['success'] = true;

        // echo json_encode($result);
        return $this->response->setJSON($result);
    }

    
}