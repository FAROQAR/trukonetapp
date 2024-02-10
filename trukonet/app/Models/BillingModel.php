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

    public function getBillPaging($limit, $offset, $strwhere = "", $sortField = "id", $sortOrder = "asc")
    {

        // $sql = "SELECT id, nouser, nama, alamat, kontak, kecamatan, desa, dusun, paket, id_pelanggan, odp, modem_sn, `status`, 
        // tgl_on, tarif_bln, jml_hari, tarif_hari, tanggal_akhir, lama_pakai, tagihan, thbl, lunas,tgl_lunas,ref_lunas,bi_admin, 
        // total_tagihan FROM infouser";
        //  $sql = "SELECT id, @rownum := ifnull(@rownum,0) + 1 nomor, nama, alamat, kontak, kecamatan, desa, dusun, paket, id_pelanggan, odp, modem_sn, `status`, 
        //  tgl_on, tarif_bln, jml_hari, tarif_hari,tanggal_awal, tanggal_akhir, lama_pakai, tagihan, thbl, lunas,tgl_lunas,ref_lunas,bi_admin, 
        //  total_tagihan FROM v_dpp";

        $sql="SELECT customer_dpp.id, @rownum := ifnull(@rownum,0) + 1 nomor, nama, concat(customer.desa,', ',customer.rt_rw) alamat, kontak, kecamatan, desa, dusun, 
        customer_dpp.paket, customer_dpp.id_pelanggan, odp, modem_sn, `status`, 
                customer_dpp.tgl_on, tarif_bln, jml_hari, tarif_hari, tgl_awal as tanggal_awal,tgl_akhir as tanggal_akhir, lama_pakai, tagihan, thbl, lunas,tgl_lunas,ref_lunas,bi_admin, 
                total_tagihan FROM customer_dpp inner join customer on customer_dpp.id_pelanggan = customer.id_pelanggan";

        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        if ((strlen($sortField) > 0) && (strlen($sortOrder) > 0)) {
            $sql .= " order by $sortField $sortOrder";
            // $sql .= " order by id asc";
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