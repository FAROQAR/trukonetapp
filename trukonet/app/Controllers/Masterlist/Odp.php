<?php

namespace App\Controllers\Masterlist;

use App\Controllers\BaseController;
use App\Models\MasterModel;


use CodeIgniter\API\ResponseTrait;
class Odp extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
    }

    public function getRatioCombo() {
 
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
   
        $where = '';
        if (strlen($search) > 0) {
            $where = "(nama like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getRatioCombo( $where);
        $output = '<option value="">--Pilih Ratio--</option>';
        $results['success']=false;
        // echo json_encode($result) ;
       if($result['totalCount'] >0){
        $results['success']=true;
        foreach($result['data'] as $row){
            $output .= '<option value="'.$row['nama'].'">'.$row['nama'].'</option>';
           
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
        $sortField = isset($_GET['sortField']) ? $this->request->getGet('sortField') : 'id';
        $sortOrder = isset($_GET['sortOrder']) ? $this->request->getGet('sortOrder') : 'asc';
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex - 1) * $limit;
        // if($offset < 1){
        //     $offset = 1;
        // }

        //        startIndex = (filter.pageIndex - 1) * filter.pageSize
        $where = '';
        if (strlen($search) > 0) {
            $where = "(idcore like'%$search%' or idodp like'%$search%')";
        }
        
        $model = new MasterModel();
        $result = $model->getOdpPaging($limit, $offset, $where,$sortField,$sortOrder);

        $result['success'] = true;

        return $this->response->setJSON($result);
    }

    public function updateRows()
    {
        // $model = new MasterModel();
        $data 	= $this->request->getGetPost();        
        $cmd=strtolower($data['cmd']);
        if($cmd == 'simpan'){
            $postdata=$data;
            unset($postdata["cmd"]);

            $model = new MasterModel();
            $retval=$model->insertBuild('master_odp',$postdata);
        }
        if($cmd == 'edit'){
            $postdata=$data;
            unset($postdata["cmd"]);

            $model = new MasterModel();
            $retval=$model->updateBuild('master_odp',$postdata,array('idodp'=>$data['idodp']));
        }
        if($cmd == 'delete'){
            $postdata=$data;
            unset($postdata["cmd"]);

            $model = new MasterModel();
            $retval=$model->deleteBuild('master_odp',$postdata);
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
