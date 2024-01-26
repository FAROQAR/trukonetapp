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
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex - 1) * $limit;
        // if($offset < 1){
        //     $offset = 1;
        // }

        //        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';
        
            $where = "lunas=1 and (id_pelanggan like'%$search%' or id_pelanggan like'%$search%')";
        
        $model = new BillingModel();
        $result = $model->getBillPaging($limit, $offset, $where);

        $result['success'] = true;

        // echo json_encode($result);
        return $this->response->setJSON($result);
    }

    
}