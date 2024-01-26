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
//        echo json_encode($menu);
//        return view('welcome_message');
        return view('home',[
            'menu'=>$menu,
            'title'=>$title,
            'breadcrumbactive'=>$breadcrumbactive,
            'breadcrumbhref'=>$breadcrumbhref,
            'breadcrumbhreftext'=>$breadcrumbhreftext,
            'preload'=>$preload
            ]);
    }
    public function widgets()
    {
//        return view('welcome_message');
        return view('pages/widgets');
    }
}
