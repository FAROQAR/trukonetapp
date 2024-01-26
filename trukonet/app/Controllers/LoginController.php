<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\MBaseModel;

/**
 * Description of LoginController
 *
 * @author nasywan
 */
class LoginController extends BaseController{
    //put your code here
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
//        if ($this->isLoggedIn()) {
//            return redirect()->to(base_url('dashboard'));
//        }

        // $data = [
        //     'title' => 'Login | Seri Tutorial CodeIgniter 4: Login dan Register @ qadrlabs.com'
        // ];

        // return view('auth/login', $data);
        return view('auth/login');
    }

//    private function isLoggedIn(): bool
//    {
//        if (session()->get('logged_in')) {
//            return true;
//        }
//
//        return false;
//    }
    
    public function login()
    {
        $email = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $credentials = ['username' => $email];

        $user = $this->model->where($credentials)
            ->first();

        if (! $user) {
            session()->setFlashdata('error', 'Username atau password anda salah.');
            return redirect()->back();
        }

        $passwordCheck = password_verify(md5($password), $user['password_hash']);
        if((md5($password))===$user['password_hash'] ){
            $passwordCheck=true;
        }
// $udata=json_encode($user);
        if (! $passwordCheck) {
            session()->setFlashdata('error', 'Username atau password anda salah.');
            return redirect()->back();
        }
$bm=new MBaseModel();
$retval=$bm->callFunction('getBmaName', array($user['kode_bma']));
        $userData = [
            'username' => $user['username'],
            'nama' => $user['nama'],
            'bma_id' => $user['kode_bma'],
            'bma_nama'=>$retval,
            'role_id' => $user['role_id'],            
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('/'));
    }
}
