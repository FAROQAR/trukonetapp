<?php

namespace App\Controllers\Masterlist;

use App\Models\MasterModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Servercore extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
    }
    public function getRowsCombo() {
 
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
   
        $where = '';
        if (strlen($search) > 0) {
            $where = "(idcore like'%$search%' or core_no like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getCoreCombo( $where);
        $output = '<option value="">--Pilih Core--</option>';
        $results['success']=false;
        // echo json_encode($result) ;
       if($result['totalCount'] >0){
        $results['success']=true;
        foreach($result['data'] as $row){
            $output .= '<option value="'.$row['idcore'].'">'.$row['id_server'].'-'.$row['core_no'].'-'.$row["line_color"].'</option>';
           
        }
        $results['data']= $output;
        // while($row = $result['data']){
        //     echo json_encode($row) ;
        //    // $output .= '<option value="'.$row['id_server'].'">'.$row["lokasi"].'</option>';
        // }
        // $results['data']= $output;
       }
       
       return $this->response->setJSON($results);      
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
        if (strlen($search) > 0) {
            $where = "(idcore like'%$search%' or id_server like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getServerCorePaging($limit, $offset, $where);

        $result['success'] = true;

        return $this->response->setJSON($result);
    }

    public function updateRows()
    {
        // $model = new MasterModel();
        $data 	= $this->request->getGetPost();
        if($data['in_use'] == 'on'){
            $data['in_use'] =1;
        }else{
            $data['in_use'] =0;
        }
        // $data->id_server;
        $cmd=strtolower($data['cmd']);
        if($cmd == 'simpan'){
            $postdata=$data;
            unset($postdata["cmd"]);

            $model = new MasterModel();
            $retval=$model->insertBuild('master_servercore',$postdata);
        }
        if ($retval > 0) {
            $results['success'] = true;
            // $results['message'] = $data['cmd'];
            $results['message'] = 'Execute successfully';
        }else{
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }
        // $results['success'] = true;
        // $results['message'] = 'Execute successfully';

        return $this->response->setJSON($results);

    }
}