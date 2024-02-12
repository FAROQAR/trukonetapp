<?php

namespace App\Controllers;
use App\Models\SettingModel;

class Home extends BaseController
{
    
    public function index()
    {
        $model=new SettingModel();
        $model->setMenuActive('home');
        $roleid=session()->role_id;
        $menu=$model->getRoleMenu($roleid,0);
        $title='Dashboard';
        $breadcrumbactive='Dashboard';
        $breadcrumbhref='#';
        $breadcrumbhreftext='Home';
        $preload=true;
        $order=$model->getOrder();
        $userd=$model->getUserActive();
        $useron=0;
        $useroff=0;
        if(count($userd)>0){
            foreach($userd as $r){
                if($r->status == 'on'){
                    $useron=$r->jml;
                }
                if($r->status == 'off'){
                    $useroff=$r->jml;
                }
            }
        }
        $useraktif=$useron.'/'.$useroff;
        $dppm=$model->getDppM();
        $dpph=$model->getDppH();
        // $session = session();
        // echo json_encode($menu);return;
//        return view('welcome_message');
        return view('home',[
            'menu'=>$menu,
            'title'=>$title,
            'breadcrumbactive'=>$breadcrumbactive,
            'breadcrumbhref'=>$breadcrumbhref,
            'breadcrumbhreftext'=>$breadcrumbhreftext,
            'preload'=>$preload,
            'order'=>$order->retval,
            'useraktif'=>$useraktif,
            'dppm'=>$dppm,
            'dpph'=>$dpph,
//            'username'=>$session->
            ]);
    }
    public function dashboard(){
        $model=new SettingModel();
        $model->setMenuActive('home');
        $menu=$model->getMenu(0);
        $title='Dashboard';
        $breadcrumbactive='Dashboard';
        $breadcrumbhref='#';
        $breadcrumbhreftext='Home';
        $preload=true;
        $order=$model->getOrder();
//        echo json_encode($menu);
//        return view('welcome_message');
        return view('home',[
            'menu'=>$menu,
            'title'=>$title,
            'breadcrumbactive'=>$breadcrumbactive,
            'breadcrumbhref'=>$breadcrumbhref,
            'breadcrumbhreftext'=>$breadcrumbhreftext,
            'preload'=>$preload,
            'order'=>$order,
            ]);
    }
    public function widgets()
    {
//        return view('welcome_message');
        return view('pages/widgets');
    }
}
