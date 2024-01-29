<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;

/**
 * Description of MasterModel
 *
 * @author nasywan
 */
class BillingModel extends MBaseModel
{

    //put your code here
    public function getAreaCombo($strwhere = "")
    {
        $sql = "SELECT id_area,
                    area,
                    subdomain From tbl_area";
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

    public function getBillPaging($limit, $offset, $strwhere = "")
    {

        $sql = "SELECT id, nouser, nama, alamat, kontak, kecamatan, desa, dusun, paket, id_pelanggan, odp, modem_sn, `status`, 
        tgl_on, tarif_bln, jml_hari, tarif_hari, tanggal_akhir, lama_pakai, tagihan, thbl, lunas,tgl_lunas,ref_lunas,bi_admin, 
        total_tagihan FROM infouser";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

    }
    public function getsetMasterCode($is_set, $trx, $code, $useCode, $codeLength)
    {

        if ($is_set) {
            $result = $this->callFunction('genidmaster_param', array($trx, $code, $useCode, $codeLength));
        } else {
            $result = $this->callFunction('getidmaster_param', array($trx, $code, $useCode, $codeLength));
        }

        return $result;
        //        echo json_encode($result);
    }

    

    

}