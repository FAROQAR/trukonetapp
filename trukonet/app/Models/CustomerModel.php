<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
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
    public function getInsertIDReg(){
        $sql="select ifnull(max(id),0)+1 id,getidmaster_param('customer_reg','R',1,4) as no_reg 
        from customer_reg";
        $result = $this->db->query($sql);
        $data = $result->getRow();
        $result->freeResult();
                
        $response["id"] = $data->id;
        $response["no_reg"] = $data->no_reg;

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;
    }

    public function getPaketCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT idpaket,nama_paket FROM master_paket";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql." order by idpaket asc");
        $response['data'] = $result->getResultArray();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

    }
    public function getKecamatanCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT rkc_kode,rkc_nama FROM ref_kecamatan";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql);
        $response['data'] = $result->getResultArray();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

    }
    public function getDesaCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT rkl_kode,rkl_nama FROM ref_kelurahan";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql);
        $response['data'] = $result->getResultArray();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

    }

    public function getDusunCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT iddusun,nama FROM ref_dusun";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql);
        $response['data'] = $result->getResultArray();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

    }

    

}
