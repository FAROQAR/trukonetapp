<?php

namespace App\Controllers\Technician;

use App\Controllers\BaseController;
use App\Models\MikrotikCommModel;
use Google\Service\Pubsub\PublishRequest;
class ActionController extends BaseController
{
    public function index()
    {
        echo 'welcome';
    }

    public function getRows(){
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 20;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $offset = ($pageIndex - 1) * $limit;

        $ros=new MikrotikCommModel();
        $retval=$ros->getSecretAll();
        $data=array();
        $result['success'] = false;
        if($retval['success']){
            $result['success'] = true;
            $result['record'] = count($retval['data']);
            
            
            $data= $retval['data'];
            $data=array_slice($data, $offset,$limit);
            $result['data']=$data;

            for($i=0;$i<count($result['data']);$i++){
                $result['data'][$i]['id']=$result['data'][$i]['.id'];
                $result['data'][$i]['macaddress']=$result['data'][$i]['last-caller-id'];
                unset($result['data'][$i]['.id']);
                unset($result['data'][$i]['last-caller-id']);
            }
            $keys = array_column($result['data'], 'name');
            array_multisort($keys, SORT_ASC, $result['data']);
        }else{
            $result['record'] = 0;
            $result['data']=array();
        }

        return $this->response->setJSON($result);
        // echo var_dump($retval['data'][0]);
    }

    public function getRowsActive(){
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 20;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $offset = ($pageIndex - 1) * $limit;

        $ros=new MikrotikCommModel();
        $retval=$ros->getSecretActiveAll();

        // echo var_dump($retval['data'][0]);
        // return;
        $data=array();
        $result['success'] = false;
        if($retval['success']){
            $result['success'] = true;
            $result['record'] = count($retval['data']);
            
            
            $data= $retval['data'];
            $data=array_slice($data, $offset,$limit);
            $result['data']=$data;

            for($i=0;$i<count($result['data']);$i++){
                $result['data'][$i]['id']=$result['data'][$i]['.id'];
                $result['data'][$i]['macaddress']=$result['data'][$i]['caller-id'];
                unset($result['data'][$i]['.id']);
                unset($result['data'][$i]['caller-id']);
            }
            $keys = array_column($result['data'], 'name');
            array_multisort($keys, SORT_ASC, $result['data']);
        }else{
            $result['record'] = 0;
            $result['data']=array();
        }

        return $this->response->setJSON($result);
        // echo var_dump($retval['data'][0]);
    }
}
