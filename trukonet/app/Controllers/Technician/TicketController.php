<?php

namespace App\Controllers\Technician;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\MikrotikCommModel;
class TicketController extends BaseController
{
    public function index()
    {
        //
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
            $where .= "status='ticket' and (id_pelanggan like'%$search%' or nama like'%$search%')";
        }

        $model = new CustomerModel();
        $result = $model->getTicketingPaging($limit, $offset, $where, $sortField, $sortOrder);

        $result['success'] = true;

        return $this->response->setJSON($result);
    }

    public function executeTicket(){
        $data = $this->request->getGetPost();
        $cmd = $data['opt'];
        $retval = array();
        if($cmd == 'D'){
            $ros= new MikrotikCommModel();
            $retval=$ros->setEnable(false,$data['id_pelanggan']);
            $model=new CustomerModel();
            if($retval['success']){
                $ret=$model->updateBuild('tehnisi_ticketing',array('status'=>'execute'),array('no_ticket'=>$data['no_ticket']));
            }
        }
        if($cmd == 'E'){
            $ros= new MikrotikCommModel();
            $retval=$ros->setEnable(true,$data['id_pelanggan']);
            $model=new CustomerModel();
            if($retval['success']){
                $ret=$model->updateBuild('tehnisi_ticketing',array('status'=>'execute'),array('no_ticket'=>$data['no_ticket']));
            }
        }
        if($cmd == 'P'){
            $ros= new MikrotikCommModel();
            $retval=$ros->setProfile($data['id_pelanggan'],$data['profile']);
            $model=new CustomerModel();
            if($retval['success']){
                $ret=$model->updateBuild('tehnisi_ticketing',array('status'=>'execute'),array('no_ticket'=>$data['no_ticket']));
            }
        }
        if($cmd == 'A'){
            $ros= new MikrotikCommModel();
            $retval=$ros->setAdd($data['id_pelanggan'],$data['profile'],$data['comment']);
            $model=new CustomerModel();
            if($retval['success']){
                $ret=$model->updateBuild('tehnisi_ticketing',array('status'=>'execute'),array('no_ticket'=>$data['no_ticket']));
            }
        }
        return $this->response->setJSON($retval);
    }

    public function abortedTicket(){
        $data = $this->request->getGetPost();
        $model=new CustomerModel();
        $retval=$model->updateBuild('tehnisi_ticketing',array('status'=>'aborted'),array('no_ticket'=>$data['no_ticket']));
        if ($retval > 0) {
            $results['success'] = true;
            $results['message'] = 'Execute successfull';
        } else {
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }

        return $this->response->setJSON($results);
    }
}
