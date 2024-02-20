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
 * Description of Serverhardware
 *
 * @author nasywan
 */
class Serverhardware extends BaseController {

    //put your code here
    use ResponseTrait;

    public function index() {
        $model = new MasterModel();
        $result = $model->loadServer();
        $result['success'] = true;
        $result['data'] = $result[0];

        return $this->respond($result, 200);
    }
    

    public function getRowsCombo() {
 
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
   
        $where = '';
        if (strlen($search) > 0) {
            $where = "(id_server like'%$search%' or lokasi like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getServerCombo( $where);
        $output = '<option value="">--Pilih Server--</option>';
        $results['success']=false;
        // echo json_encode($result) ;
       if($result['totalCount'] >0){
        $results['success']=true;
        foreach($result['data'] as $row){
            $output .= '<option value="'.$row['id_server'].'">'.$row["lokasi"].'</option>';
           
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
    public function getRows() {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex-1)*$limit;
        // if($offset < 1){
        //     $offset = 1;
        // }
      
//        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';
        if (strlen($search) > 0) {
            $where = "(id_server like'%$search%' or lokasi like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getServerPaging($limit, $offset, $where);
       
        $result['success'] = true;

        return $this->response->setJSON($result);
    }

    public function updateRows() {
        // $model = new MasterModel();
        $data 	= $this->request->getGetPost();
        // $data->id_server;
        $cmd=strtolower($data['cmd']);
        if($cmd == 'simpan'){
            $postdata=$data;
            unset($postdata["cmd"]);

            $model = new MasterModel();
            $retval=$model->insertBuild('master_server',$postdata);
        }
        if ($retval > 0) {
            $results['success'] = true;
            // $results['message'] = $data['cmd'];
            $results['message'] = 'Execute successfully';
        }else{
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }
        
      
        return $this->response->setJSON($results);
   
    }

}
