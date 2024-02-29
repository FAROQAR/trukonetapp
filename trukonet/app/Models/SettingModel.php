<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;

/**
 * Description of SettingModel
 *
 * @author nasywan
 */
class SettingModel extends MBaseModel {

    //put your code here

    public function getAdminPaging($limit, $offset, $strwhere = "") {
        $sql = "SELECT a.id_admin,
       a.id_area,
       b.area,
       a.nama,
       a.email,
       a.username,
       a.password,
       a.level,
       b.subdomain
FROM tbl_admin a
     INNER JOIN tbl_area b
        ON (a.id_area = b.id_area)";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;
    }

    public function getRoleCombo($strwhere = "") {
        $sql = "SELECT role_id, role_name,active from sys_role ";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql);
        $response['data'] = $result->getResultArray();
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;

//        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }
public function setMenuActive($routeid) {
    $table='sys_menu';
    $data = $this->selectBuilder($table, ['routeId' => $routeid])->getRowArray();
    $this->updateBuild($table, array('active'=>''), array());
    if($data['id_parent']>0){
        $this->updateBuild($table, array('active'=>'active'), "id in ($data[id],$data[id_parent])");
    }else{
        $this->updateBuild($table, array('active'=>'active'), "id in ($data[id])");
    }   
    
}
    public function getMenu($id_parent) {
        $result = [];
        $data = $this->selectBuilder('sys_menu', ['id_parent' => $id_parent])->getResultArray();
        foreach ($data as $key => $value) {
            $result[$key] = $value;

            $children = $this->getMenu($value["id"]);
            $result[$key]['leaf'] = count($children) == 0;
            if (count($children) > 0) {
                $result[$key]['children'] = $children;
            }
        }

        return $result;
    }

    public function getRoleMenu($roleid=0,$idparent=0) {
        $sql = "SELECT sys_rolemenu.idmenu as id,
       sys_menu.id_parent,
       sys_menu.`text`,
       sys_menu.iconCls,
       sys_menu.rowCls,
       sys_menu.viewType,
       sys_menu.routeId,
       sys_menu.sequence,
       sys_menu.leaf,
       sys_menu.active,
       sys_menu.isadmin
FROM sys_menu sys_menu
     INNER JOIN sys_rolemenu sys_rolemenu
        ON (sys_menu.id = sys_rolemenu.idmenu) 
        where sys_rolemenu.role_id=$roleid and sys_menu.id_parent=$idparent order by sys_rolemenu.idmenu";
        $results = [];
        $result = $this->db->query($sql);
        $data = $result->getResultArray();
        foreach ($data as $key => $value) {
            $results[$key] = $value;

            $children = $this->getRoleMenu($roleid,$value["id"]);
            $results[$key]['leaf'] = count($children) == 0;
            if (count($children) > 0) {
                $results[$key]['children'] = $children;
            }
        }

//        $result->freeResult();
        return $results;

//        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }
    
    public function getRoleMenuEdit($roleid=0,$idparent=0) {
        $sql = "SELECT if(sys_rolemenu.role_id is null,'',1) as `checked`,
       sys_menu.id as idmenu,
       sys_menu.id_parent,
       sys_menu.`text`,
       sys_menu.iconCls,
       sys_menu.rowCls,
       sys_menu.viewType,
       sys_menu.routeId,
       sys_menu.leaf
FROM sys_rolemenu sys_rolemenu
     RIGHT JOIN sys_menu sys_menu
        ON (sys_rolemenu.idmenu = sys_menu.id and sys_rolemenu.role_id=$roleid)        
        where sys_menu.id_parent=$idparent order by sys_menu.id";
        $results = [];
        $result = $this->db->query($sql);
        $data = $result->getResultArray();
        foreach ($data as $key => $value) {
            
            
            $results[$key] = $value;
            $children = $this->getRoleMenuEdit($roleid,$value["idmenu"]);
            $results[$key]['leaf'] = count($children) == 0;
            if (count($children) > 0) {
                $results[$key]['children'] = $children;
            }
        }

        $result->freeResult();
        return $results;

//        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }
    
    public function roleMenuValidate($roleid) {
        $result= $this->selectBuilder('sys_rolemenu', "role_id = $roleid");
        
        if($result->getNumRows()>0){
            $this->deleteBuild('sys_rolemenu', "role_id = $roleid");
        }
        
        
    }

    public function getOrder(){
        $retval = $this->selectQuery("select count(*) as retval from customer_reg where status !='on' ");
        return $retval->getRow();
    }
    public function getUserActive(){
        $retval = $this->selectQuery("select status,count(*) as jml from customer group by status");
        return $retval->getResultObject();
    }

    public function getDppM(){
        $tgl=date('Ym');

        $retval = $this->selectQuery("select lunas, sum(jml) as jml from (select lunas,1 as jml from customer_dpp where thbl=period_add($tgl,-1) 
        union all select lunas,1 as jml from customer_dpp where thbl<period_add($tgl,-1) and lunas=0  ) a group by lunas");
        $ret=$retval->getResultObject();
        $rec=$retval->getNumRows();
        $lunas=0;
        $tunggakan=0;
        if($rec>0){
            foreach($ret as $r){
                if($r->lunas=='0'){
                    $tunggakan=$r->jml;
                }
                if($r->lunas=='1'){
                    $lunas=$r->jml;
                }
            }
        }
        $result=$lunas.'/'.$tunggakan;
        return $result;
    }
    public function getDppH(){
        $tgl=date('Ym');

        $retval = $this->selectQuery("select lunas,count(*) as jml from customer_dpp where thbl=$tgl group by lunas");
        $ret=$retval->getResultObject();
        $rec=$retval->getNumRows();
        $lunas=0;
        $tunggakan=0;
        if($rec>0){
            foreach($ret as $r){
                if($r->lunas=='0'){
                    $tunggakan=$r->jml;
                }
                if($r->lunas=='1'){
                    $lunas=$r->jml;
                }
            }
        }
        $result=$lunas.'/'.$tunggakan;
        return $result;
    }


}
