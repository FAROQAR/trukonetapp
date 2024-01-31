<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\GSheetModel;
use App\Models\CustomerModel;
class CustomerController extends BaseController
{

    public function index()
    {
        //
    }
    public function getRowsGoogle()
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

    public function getRows()
    {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $sortField = isset($_GET['sortField']) ? $this->request->getGet('sortField') : 'id';
        $sortOrder = isset($_GET['sortOrder']) ? $this->request->getGet('sortOrder') : 'asc';
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex - 1) * $limit;
        // if($offset < 1){
        //     $offset = 1;
        // }

        //        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = "";
        if (strlen($search) > 0) {
            $where .= "(id_pelanggan like'%$search%' or nama like'%$search%' or no_ktp like'%$search%')";
        }

        $model = new CustomerModel();
        $result = $model->getCustomerPaging($limit, $offset, $where, $sortField, $sortOrder);

        $result['success'] = true;

        return $this->response->setJSON($result);
    }

    public function updateRows()
    {
        $data = $this->request->getGetPost();
        $cmd = strtolower($data['cmd']);
        $retval =0;
        if ($cmd == 'editcustomer') {
            $postdata = $data;
            unset($postdata["cmd"]);
            unset($postdata["id"]);
            unset($postdata["id_pelanggan"]);
                        
            $postwhere["id_pelanggan"]=$data['id_pelanggan'];
            $postwhere["id"]=$data['id'];            
            $postdata["update_date"]=date('y-m-d h:i:s a');
            $postdata["update_by"]=session()->get('username');
            $model = new CustomerModel();          
            $retval = $model->updateBuild('customer', $postdata,$postwhere);
            
        }
        // if($cmd == 'delete'){
        //     $postdata=$data;
        //     unset($postdata["cmd"]);
        //     $model = new CustomerModel();
        //     $retval=$model->deleteBuild('customer_reg',$postdata);
        // }
        if($cmd == 'mutasi'){
            $user=session()->get('username');
            $model = new CustomerModel();
            $result=$model->SP_execData(
                'sp_mutasi_paket',
                array($data["id_pelanggan"],
                $data["paket"],
                date('y-m-d'),
                $user));
            if($result['success']){
                $retval=1;
            }
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
}