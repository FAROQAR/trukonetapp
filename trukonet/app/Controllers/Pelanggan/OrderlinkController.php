<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class OrderlinkController extends BaseController
{
    public function index()
    {
        $client = new \Google_Client();
$client->setApplicationName('Google Sheets Api');
$client->setScopes([\Google\Service\Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig('keyfile.json');

$service = new \Google\Service\Sheets($client);
$spreadsheetId = "1FEkB1KXgU-blyKstnq5vdEJxzv0xL32tLGE2g2yrXxk";
$get_range = 'pasang baru!A2:M19';
$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

$values = $response->getValues();
$data=array();
$arr=array();
foreach($values as $v){
   if(empty($v[11])){
    $arr=array(
        'no'=>$v[0],
        'nama'=>$v[1],
        'kontak'=>$v[2],
        'desa'=>$v[3],
        'dusun'=>$v[4],
        'rtrw'=>$v[5],
        'areacode'=>$v[6],
        'paket'=>$v[7],
        'idpel'=>$v[8],
        'odp'=>$v[9],
        'modemsn'=>empty($v[10])?'':$v[10]
       );
       array_push($data,$arr);
   }
   
   

}
        $result['success'] = true;
        $result['data'] = $data;

        return $this->respond($result, 200);
    }
    public function getRows() {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex-1)*$limit;
      
//        startIndex = (filter.pageIndex - 1) * filter.pageSize
$client = new \Google_Client();
$client->setApplicationName('Google Sheets Api');
$client->setScopes([\Google\Service\Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig('keyfile.json');

$service = new \Google\Service\Sheets($client);
$spreadsheetId = "1FEkB1KXgU-blyKstnq5vdEJxzv0xL32tLGE2g2yrXxk";
$get_range = 'pasang baru';
$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

$values = $response->getValues();
$data=array();
$arr=array();
$i=0;
foreach($values as $v){
    if (empty($v[0])){
        break;
    }
    
    
   if(empty($v[11])){
    $arr=array(
        'no'=>$v[0],
        'nama'=>$v[1],
        'kontak'=>$v[2],
        'desa'=>$v[3],
        'dusun'=>$v[4],
        'rtrw'=>$v[5],
        'areacode'=>$v[6],
        'paket'=>$v[7],
        'idpel'=>$v[8],
        'odp'=>$v[9],
        'modemsn'=>empty($v[10])?'':$v[10],
        'counter'=>($i+1)
       );
       if ($i>=$offset  && $i<($limit*$pageIndex)){
            array_push($data,$arr);
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
}
