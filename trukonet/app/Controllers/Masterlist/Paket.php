<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers\Masterlist;

use App\Models\MasterModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\Firebase;
//use Kreait\Firebase\Firestore;
use Google\Cloud\Firestore\FirestoreClient;
use App\Collections\PaketCollection;
/**
 * Description of Paket
 *
 * @author nasywan
 */
class Paket extends BaseController {

    //put your code here
    use ResponseTrait;

    // protected $dbfb;

//    public function __construct()
//    {
//        parent::__construct();
//	    $this->load->model('Mdata');  
//
//    }
    public function index() {
        $model = new MasterModel();
        $result = $model->loadBma();
        $result['success'] = true;
        $result['data'] = $result[0];

        return $this->respond($result, 200);
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
            $where = "(nama_paket like'%$search%')";
        }
        $model = new MasterModel();
        $result = $model->getPaketPaging($limit, $offset, $where);

        $result['success'] = true;

        echo json_encode($result);
    }

    public function updateRows() {
        // $model = new MasterModel();
        $data 	= $this->request->getGetPost();        
        $cmd=strtolower($data['cmd']);
        // if($cmd == 'simpan'){
        //     $postdata=$data;
        //     unset($postdata["cmd"]);
            
        //     $model = new MasterModel();
        //     $isValid=$model->validatePaketByName($data['nama_paket']);
        //     if($isValid){
        //         $retval=$model->insertBuild('master_paket',$postdata);
        //     }
            
        // }
        if($cmd == 'edit'){
            $postdata=$data;
            unset($postdata["cmd"]);

            $model = new MasterModel();
            // $isValid=$model->validatePaketEdit($data['idpaket'],$data['nama_paket']);
            // if($isValid){
            //     $retval=$model->updateBuild('master_paket',$postdata,array('idpaket'=>$data['idpaket']));
            // }
            // $retval=$model->updateBuild('master_paket',$postdata,array('idpaket'=>$data['idpaket']));

            
        }
        // if($cmd == 'delete'){
        //     $postdata=$data;
        //     unset($postdata["cmd"]);

        //     $model = new MasterModel();
        //     $retval=$model->deleteBuild('master_paket',$postdata);
        // }
        $retval=1;
        if ($retval > 0) {
            $results['success'] = true;         
            $results['message'] = 'Execute successfully';
        }else{
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }
      
        return $this->response->setJSON($results);
       
    }

}
