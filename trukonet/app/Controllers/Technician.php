<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;
class Technician extends BaseController
{
    public function load() {
        $uri = current_url(true);
        $lengthsegment = $uri->getTotalSegments();
       $page= $uri->getSegment($lengthsegment);
       $title= ucwords($page);
       $model = new SettingModel();
        $model->setMenuActive($page);
        $roleid = session()->role_id;
        $menu =$model->getRoleMenu($roleid, 0);
//         $menu =$model->getMenu(0);
        // $title= ucwords($page) ;
        $breadcrumbactive = ucwords($page);
        $breadcrumbhref = '/';
        $breadcrumbhreftext = 'Home';
        $preload = false;
//        echo json_encode($menu);return;
//        return view('welcome_message');
        return view("technician/$page", [
            'menu' => $menu,
            'title' => $title,
            'breadcrumbactive' => $breadcrumbactive,
            'breadcrumbhref' => $breadcrumbhref,
            'breadcrumbhreftext' => $breadcrumbhreftext,
            'preload' => $preload
        ]);
    }

    public function index($page, $title) {
//        return view('welcome_message');

        $model = new SettingModel();
        $model->setMenuActive($page);
        $roleid = session()->role_id;
        $menu =$model->getRoleMenu($roleid, 0);
//         $menu =$model->getMenu(0);
        // $title= ucwords($page) ;
        $breadcrumbactive = ucwords($page);
        $breadcrumbhref = '/';
        $breadcrumbhreftext = 'Home';
        $preload = false;
//        echo json_encode($menu);return;
//        return view('welcome_message');
        return view("master/$page", [
            'menu' => $menu,
            'title' => $title,
            'breadcrumbactive' => $breadcrumbactive,
            'breadcrumbhref' => $breadcrumbhref,
            'breadcrumbhreftext' => $breadcrumbhreftext,
            'preload' => $preload
        ]);
//        return view("master/$page");
    }
}
