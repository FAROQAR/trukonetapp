<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;

class OrderlinkController extends BaseController
{
    use ResponseTrait;
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
        $data = array();
        $arr = array();
        foreach ($values as $v) {
            if (empty($v[11])) {
                $arr = array(
                    'no' => $v[0],
                    'nama' => $v[1],
                    'kontak' => $v[2],
                    'desa' => $v[3],
                    'dusun' => $v[4],
                    'rtrw' => $v[5],
                    'areacode' => $v[6],
                    'paket' => $v[7],
                    'idpel' => $v[8],
                    'odp' => $v[9],
                    'modemsn' => empty($v[10]) ? '' : $v[10]
                );
                array_push($data, $arr);
            }



        }
        $result['success'] = true;
        $result['data'] = $data;

        return $this->respond($result, 200);
    }
    public function getRowsGoogle()
    {
        $limit = isset($_GET['pageSize']) ? $this->request->getGet('pageSize') : 10;
        $pageIndex = isset($_GET['pageIndex']) ? $this->request->getGet('pageIndex') : 0;
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';
        $offset = ($pageIndex - 1) * $limit;

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
        $data = array();
        $arr = array();
        $i = 0;
        foreach ($values as $v) {
            if (empty($v[0])) {
                break;
            }


            if (empty($v[11])) {
                $arr = array(
                    'no' => $v[0],
                    'nama' => $v[1],
                    'kontak' => $v[2],
                    'desa' => $v[3],
                    'dusun' => $v[4],
                    'rtrw' => $v[5],
                    'areacode' => $v[6],
                    'paket' => $v[7],
                    'idpel' => $v[8],
                    'odp' => $v[9],
                    'modemsn' => empty($v[10]) ? '' : $v[10],
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
        $result["totalCount"] = $i;
        $result["offset"] = $offset;
        $result["limit"] = $limit;
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
        $where = "status !='on'";
        if (strlen($search) > 0) {
            $where .= " and (no_reg like'%$search%' or id_pelanggan like'%$search%' or nama like'%$search%' or no_ktp like'%$search%')";
        }

        $model = new CustomerModel();
        $result = $model->getCustomerRegPaging($limit, $offset, $where, $sortField, $sortOrder);

        $result['success'] = true;

        return $this->response->setJSON($result);
    }
    public function getRegisterLoad()
    {
        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';

        $model = new CustomerModel();
        $result = $model->getInsertIDReg();
        $results['success'] = false;
        if ($result['totalCount'] > 0) {
            $results['success'] = true;
            $results['data'] = array('id' => $result['id'], 'no_reg' => $result['no_reg']);
        } else {
            $results['success'] = false;
            $results['message'] = 'ID No.Reg NotFound!';
        }
        return $this->response->setJSON($results);
    }


    public function getPaketCombo()
    {

        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';

        $where = '';
        if (strlen($search) > 0) {
            $where = "(nama_paket like'%$search%')";
        }
        $model = new CustomerModel();
        $result = $model->getPaketCombo($where);
        $output = '<option value="">--Pilih Paket--</option>';
        $results['success'] = false;
        // echo json_encode($result) ;
        if ($result['totalCount'] > 0) {
            $results['success'] = true;
            foreach ($result['data'] as $row) {
                $output .= '<option value="' . $row['idpaket'] . '">' . $row['nama_paket'] . '</option>';

            }
            $results['data'] = $output;
            // while($row = $result['data']){
            //     echo json_encode($row) ;
            //    // $output .= '<option value="'.$row['id_server'].'">'.$row["lokasi"].'</option>';
            // }
            // $results['data']= $output;
        }

        return $this->response->setJSON($results);
    }

    public function getKecamatanCombo()
    {

        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';

        $where = '';
        if (strlen($search) > 0) {
            $where = "(rkc_nama like'%$search%')";
        }
        $model = new CustomerModel();
        $result = $model->getKecamatanCombo($where);
        $output = '<option value="">--Pilih Kecamatan--</option>';
        $results['success'] = false;
        // echo json_encode($result) ;
        if ($result['totalCount'] > 0) {
            $results['success'] = true;
            foreach ($result['data'] as $row) {
                $output .= '<option value="' . $row['rkc_nama'] . '">' . $row['rkc_nama'] . '</option>';

            }
            $results['data'] = $output;
        }

        return $this->response->setJSON($results);
    }
    public function getDesaCombo()
    {

        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';

        $where = '';
        if (strlen($search) > 0) {
            $where = "(rkc_nama ='$search')";
        }
        $model = new CustomerModel();
        $result = $model->getDesaCombo($where);
        $output = '<option value="">--Pilih Desa--</option>';
        $results['success'] = false;
        // echo json_encode($result) ;
        if ($result['totalCount'] > 0) {
            $results['success'] = true;
            foreach ($result['data'] as $row) {
                $output .= '<option value="' . $row['rkl_nama'] . '">' . $row['rkl_nama'] . '</option>';

            }
            $results['data'] = $output;
        }

        return $this->response->setJSON($results);
    }

    public function getDusunCombo()
    {

        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';

        $where = '';
        if (strlen($search) > 0) {
            $where = "(desa ='$search')";
        }
        $model = new CustomerModel();
        $result = $model->getDusunCombo($where);
        $output = '<option value="">--Pilih Dusun--</option>';
        $results['success'] = false;
        // echo json_encode($result) ;
        if ($result['totalCount'] > 0) {
            $results['success'] = true;
            foreach ($result['data'] as $row) {
                $output .= '<option value="' . $row['iddusun'] . '">' . $row['nama'] . '</option>';

            }
            $results['data'] = $output;
        }

        return $this->response->setJSON($results);
    }

    public function updateRegister()
    {
        $data = $this->request->getGetPost();
        $cmd = strtolower($data['cmd']);
        $retval=0;
        if ($cmd == 'simpanreg') {
            $postdata = $data;
            unset($postdata["cmd"]);
            $model = new CustomerModel();
            $postdata["no_reg"] = $model->getsetMasterCode(true, 'customer_reg', 'R', 1, 4);
            $postdata["status"] = 'reg';
            $postdata["tgl_reg"] = date('y-m-d');

            $retval = $model->insertBuild('customer_reg', $postdata);
            
        }
        

        if ($retval > 0) {
            $results['success'] = true;
            // $results['message'] = $data['cmd'];
            $results['message'] = 'Execute successfully';
        } else {
            $results['success'] = false;
            $results['message'] = 'Execute Aborted!';
        }
        // $results['success'] = true;
        // $results['message'] = 'Execute successfully';

        return $this->response->setJSON($results);
    }

    public function generateRandomPassword()
    {
        $password = '';
        // $passwordSets = ['1234567890', '$@#!?', 'ABCDEFGHJKLMNPQRSTUVWXYZ', 'abcdefghjkmnpqrstuvwxyz'];
        $passwordSets = ['1234567890', 'ABCDEFGHJKLMNPQRSTUVWXYZ'];

        //Get random character from the array
        foreach ($passwordSets as $passwordSet) {
            $password .= $passwordSet[array_rand(str_split($passwordSet))];
        }

        // 6 is the length of password we want
        while (strlen($password) < 8) {
            $randomSet = $passwordSets[array_rand($passwordSets)];
            $password .= $randomSet[array_rand(str_split($randomSet))];
        }
        return $password;
    }

    public function getOdpCombo()
    {

        $search = isset($_GET['query']) ? $this->request->getGet('query') : '';

        $where = '';
        if (strlen($search) > 0) {
            $where = "(idodp like '%$search%')";
        }
        $model = new CustomerModel();
        $result = $model->getOdpCombo($where);
        $output = '<option value="">--Pilih ODP--</option>';
        $results['success'] = false;
        // echo json_encode($result) ;
        if ($result['totalCount'] > 0) {
            $results['success'] = true;
            foreach ($result['data'] as $row) {
                $output .= '<option value="' . $row['idodp'] . '">' . $row['idodp'] . '</option>';

            }
            $results['data'] = $output;
        }

        return $this->response->setJSON($results);
    }
    public function getPasangLoad()
    {
        $area_code = isset($_GET['area_code']) ? $this->request->getGet('area_code') : '';
        $no_reg = isset($_GET['no_reg']) ? $this->request->getGet('no_reg') : '';

        $model = new CustomerModel();
        $nopel = $model->getsetMasterCode(false, 'customer_link', 'P', 0, 4);
        $id_pelanggan = $area_code . $nopel;
        $wifi_id = "user" . $nopel;
        $wifi_pass = $this->generateRandomPassword();
        


        $data = array(
            
            'id_pelanggan' => $id_pelanggan,
            'wifi_id' => $wifi_id,
            'wifi_pass' => $wifi_pass
        );

        $results['success'] = true;
        $results['data'] = $data;

        return $this->response->setJSON($results);
    }

    public function updatePasang()
    {
        $data = $this->request->getGetPost();
        $cmd = strtolower($data['cmd']);
        if ($cmd == 'simpanpasang') {
            $postdata = $data;
            unset($postdata["cmd"]);
            
            $model = new CustomerModel();
            $nopel = $model->getsetMasterCode(true, 'customer_link', 'P', 0, 4);
            $postdata["id_pelanggan"] = $postdata["area_code"].$nopel;
            $postdata["status"] = 'pasang';
            $postdata["tgl_pasang"] = date('y-m-d');
            $postwhere["no_reg"]=$postdata['no_reg'];
            unset($postdata["no_reg"]);
            unset($postdata["area_code"]);
            $retval = $model->updateBuild('customer_reg', $postdata,$postwhere);
            if ($retval > 0) {
                $results['success'] = true;
                // $results['message'] = $data['cmd'];
                $results['message'] = 'Execute successfully';
            } else {
                $results['success'] = false;
                $results['message'] = 'Execute Aborted!';
            }
            // $results['success'] = true;
            // $results['message'] = 'Execute successfully';

            return $this->response->setJSON($results);
        }
    }

    public function updateRows()
    {
        $data = $this->request->getGetPost();
        $cmd = strtolower($data['cmd']);
        $retval =0;
        if ($cmd == 'simpanorder') {
            $postdata = $data;
            unset($postdata["cmd"]);
            unset($postdata["id"]);
            unset($postdata["no_reg"]);
                        
            $postwhere["no_reg"]=$data['no_reg'];
            $postwhere["id"]=$data['id'];            
            
            $model = new CustomerModel();          
            $retval = $model->updateBuild('customer_reg', $postdata,$postwhere);
            
        }
        if($cmd == 'delete'){
            $postdata=$data;
            unset($postdata["cmd"]);
            $model = new CustomerModel();
            $retval=$model->deleteBuild('customer_reg',$postdata);
        }
        if($cmd == 'activate'){
            $user=session()->get('username');
            $model = new CustomerModel();
            $result=$model->SP_execData('sp_activate_reg',array($data["no_reg"],$user));
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
    public function getsessionnama(){
        return session()->get('username');
    }
    public function printlabel(){
        $data=json_decode($this->request->getGet('data'));
        // if(is_array($data)){
        //     echo $data['nama'];
        // }else{
        //     // echo 'bukan array';
        //     // echo json_encode(array("nama"=>"aaa", 'no'=>1));
        //     $aa=(string)$data;
        //     echo $aa;
        //     echo ( json_decode( $aa , true ) == NULL ) ? 'false' : 'true' ; 
        // }
         
        
        // $arr=  explode(",", $data); 
        // $profile = $data;
        // $profile = $data;
        // $this->load->view('nota_generic', ['profile' => $profile]);
        //return view('nota_generic', ['profile' => $profile]);
        // return view('welcome_message');
        return view('labelmodem', ['profile' => $data]);
        
    }
    
}
