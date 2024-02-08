<?php

namespace App\Models;

use CodeIgniter\Model;

class MikrotikCommModel extends MikrotikModel
{
    public function getSecretAll(){
              
        $retval = array();
        if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
            $retval = $this->comm('/ppp/secret/print');
            $this->disconnect();
            // $aa='';
            // foreach($retval as $r){
            //     $aa.= "$r[name] $r[comment] $r[profile]\r\n";
            // }
            // echo nl2br($aa);
            if(count($retval)>0){
                return $this->returnValue(true,'Execute Successfull',$retval);
            }else{
                return $this->returnValue(false,'No Data Found',[]);
            }

            
        }else{
            return $this->returnValue(false,'Connection Aborted',[]);
            
        }
    }

    public function getSecretByName($name){
        // $this = new MikrotikClass();        
        $retval = array();
        if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
            $retval = $this->comm('/ppp/secret/print');
            $this->disconnect();
        
            if(count($retval)>0){
                $ret= $this->findObjectByName($retval, $name);
                return $this->returnValue(true,'Execute Successfull',$ret);
            }else{
                return $this->returnValue(false,'No Data Found',[]);
            }            
        }else{
            return $this->returnValue(false,'Connection Aborted',[]);
        }
    }

    public function getSecretActiveAll(){
              
        $retval = array();
        if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
            $retval = $this->comm('/ppp/active/print');
            $this->disconnect();
            // $aa='';
            // foreach($retval as $r){
            //     $aa.= "$r[name] $r[comment] $r[profile]\r\n";
            // }
            // echo nl2br($aa);
            if(count($retval)>0){
                return $this->returnValue(true,'Execute Successfull',$retval);
            }else{
                return $this->returnValue(false,'No Data Found',[]);
            }

            
        }else{
            return $this->returnValue(false,'Connection Aborted',[]);
            
        }
    }

    public function getSecretActiveByName($name){
        // $this = new MikrotikClass();        
        $retval = array();
        if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
            $retval = $this->comm('/ppp/active/print');
            $this->disconnect();
        
            if(count($retval)>0){
                $ret= $this->findObjectByName($retval, $name);
                return $this->returnValue(true,'Execute Successfull',$ret);
            }else{
                return $this->returnValue(false,'No Data Found',[]);
            }            
        }else{
            return $this->returnValue(false,'Connection Aborted',[]);
        }
    }

    public function getSecretIdByName($name){
        // $this = new MikrotikClass();        
        $retval = array();
        if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
            $retval = $this->comm('/ppp/secret/print');
            $this->disconnect();
        
            if(count($retval)>0){
                $ret= $this->getIdByName($retval, $name);
                return $ret;
            }else{
                return false;
            }            
        }else{
            return false;
        }
    }

    public function setProfile($name,$profile){   
        $id=$this->getSecretIdByName($name);   
        if($id){
            if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
                // $this->comm('/ppp/secret/set comment="" =numbers=*3C');
                $this->comm('/ppp/secret/set',array(
                    ".id"=>$id,
                    "profile"=>$profile
                    
                )); 
                $this->disconnect();
                return $this->returnValue(true,'Execute Successfull',[]);
            }else{
                return $this->returnValue(false,'Execute Aborted',[]);
            }
        }else{
            return $this->returnValue(false,'Execute Aborted',[]);
        }
        
    }
    public function setEnable($enable,$name){   
        $id=$this->getSecretIdByName($name);   
        if($id){
            if($this->connect(env('IP_Mikrotik'), env('USER_Mikrotik'),env('PASSWORD_Mikrotik'))){
                // $this->comm('/ppp/secret/set comment="" =numbers=*3C');
                if($enable){
                    $this->comm('/ppp/secret/enable',array(
                        ".id"=>$id                    
                    )); 
                }else{
                    $this->comm('/ppp/secret/disable',array(
                        ".id"=>$id                    
                    )); 
                }
                
                $this->disconnect();
                return $this->returnValue(true,'Execute Successfull',[]);
            }else{
                return $this->returnValue(false,'Execute Aborted',[]);
            }
        }else{
            return $this->returnValue(false,'Execute Aborted',[]);
        }
        
    }

    function findObjectByName($array, $namesearch)
    {

        foreach ($array as $element) {
            if ($namesearch == $element['name']) {
                return $element;
            }
        }

        return false;
    }
    function getIdByName($array, $namesearch)
    {

        foreach ($array as $element) {
            if ($namesearch == $element['name']) {
                return $element['.id'];
            }
        }

        return false;
    }
    function returnValue($success,$message,$data){
        return array('success'=>$success,'message'=>$message,'data'=>$data);
    }
}
