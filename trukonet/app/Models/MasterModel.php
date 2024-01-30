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
class MasterModel extends MBaseModel
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

    public function getBmaPaging($limit, $offset, $strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT kode_bma, nama FROM bumdesma_profile";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

        //        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }

    public function getAreaPaging($limit, $offset, $strwhere = "")
    {
        $sql = "SELECT id_area,
                    area,
                    subdomain From tbl_area";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;

        //        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }



    public function getPaketCombo($strwhere = "")
    {
        $sql = "SELECT id_paket, paket, harga, deskripsi, subdomain FROM tbl_paket";
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

    public function getPerangkatPaging($limit, $offset, $strwhere = "")
    {
        $sql = "SELECT id_perangkat, nama_alat, ip_address, mac_address, user_platform, frekuensi, lokasi, area, status, tbl_perangkat.subdomain";
        $sql .= " FROM tbl_perangkat inner join tbl_area on tbl_perangkat.lokasi=tbl_area.id_area";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;

        //        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }

    public function getsetMasterCode($getset, $trx, $code, $useCode, $codeLength)
    {

        if ($getset) {
            $result = $this->callFunction('genidmaster_param', array($trx, $code, $useCode, $codeLength));
        } else {
            $result = $this->callFunction('getidmaster_param', array($trx, $code, $useCode, $codeLength));
        }

        return $result;
        //        echo json_encode($result);
    }

    public function getsetMasterCodeBma($getset, $kodebma, $trx, $code, $useCode, $codeLength)
    {

        if ($getset) {
            $result = $this->callFunction('genidmaster_parambma', array($kodebma, $trx, $code, $useCode, $codeLength));
        } else {
            $result = $this->callFunction('getidmaster_parambma', array($kodebma, $trx, $code, $useCode, $codeLength));
        }

        return $result;
        //        echo json_encode($result);
    }

    //    ============ server list------------------
    public function loadServer()
    {
        //        $kodebma = $this->getsetMasterCode(0, 'bumdesma_profile', 'BMA-', 1, 4);
        $sql = "SELECT id, id_server, lokasi, dedicated_bandwith, core, user_per_core, max_user, merk_no_seri, latitude, longitude, descript, date_install, install_by, create_by, update_by, update_date 
FROM master_server";

        $result = $this->db->query($sql);
        $response = $result->getResultArray();

        $result->freeResult();
        return $response;

    }
    public function getServerCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT id, id_server, lokasi, dedicated_bandwith, core, user_per_core, max_user, merk_no_seri, latitude, longitude, descript, date_install, install_by, create_by, update_by, update_date 
FROM master_server";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql);
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

        //        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }
    public function getServerPaging($limit, $offset, $strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT id, id_server, lokasi, dedicated_bandwith, core, user_per_core, max_user, merk_no_seri, latitude, longitude, descript, date_install, install_by, create_by, update_by, update_date 
FROM master_server";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["totalCount"] = $result->getNumRows();

        $result->freeResult();
        return $response;

        //        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }

    public function getServerCorePaging($limit, $offset, $strwhere = "")
    {
        $sql = "SELECT id, idcore, id_server, core_no, line_color, max_user, laser_out, in_use 
FROM master_servercore";
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
    public function getCoreCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT id, idcore, id_server, core_no, line_color, max_user, laser_out, in_use  
FROM master_servercore";
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

    public function getRatioCombo($strwhere = "")
    {
        //        $sql = "SELECT bma_id, kode_bma, nama, tglpembentukan, telp, alamat, kecamatan, kabupaten, propinsi, ketua, sign_code_ketua, sekretaris, sign_code_sekretaris, bendahara, sign_code_bendahara, ketua_bkad, sign_code_bkad, bp, sign_code_bp, logo_profile, if(aktif=1,'true','false') aktif, create_at, lastupdate_at 
//FROM bumdesma_profile
//";
        $sql = "SELECT nama FROM ref_ratio";
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
    public function getOdpPaging($limit, $offset, $strwhere = "",$sortField="id",$sortOrder="asc")
    {
        $sql = "SELECT id, idodp, slot, idcore, ratio, slot_use, odp_loc, latitude, longitude 
FROM master_odp";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        if ((strlen($sortField) > 0 ) && (strlen($sortOrder) > 0 )) {
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
    //paket
    public function getPaketPaging($limit, $offset, $strwhere = "")
    {
        $sql = "SELECT  idpaket, nama_paket, tarif, `profile`
        FROM master_paket";
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

    public function validatePaketByName($nama)
    {
        $sql = "SELECT  idpaket, nama_paket, tarif 
        FROM master_paket where nama_paket='$nama'";

        $result = $this->db->query($sql);
        $retval = $result->getNumRows();
        $result->freeResult();

        $response = true;
        if ($retval > 0) {
            $response = false;
        }

        return $response;
    }
    public function validatePaketEdit($idpaket, $nama)
    {
        $sql = "SELECT  idpaket, nama_paket, tarif 
        FROM master_paket where idpaket='$idpaket'";

        $result = $this->db->query($sql);
        $retval = $result->getNumRows();
        $result->freeResult();

        $valid = true;

        if ($retval < 1) {
            $valid = false;
            // return $response;
        }
        if ($valid) {
            $sql = "SELECT  idpaket, nama_paket, tarif  
                    FROM master_paket where nama_paket='$nama' and idpaket!='$idpaket' ";

            $result = $this->db->query($sql);
            $retval = $result->getNumRows();
            $result->freeResult();

            if ($retval > 0) {
                $valid = false;
            }
        }



        

        return $valid;
    }
    // end paket

    public function loadBma()
    {
        $kodebma = $this->getsetMasterCode(0, 'bumdesma_profile', 'BMA-', 1, 4);
        $sql = "SELECT 0 bma_id, '$kodebma' as kode_bma, '' nama, '' tglpembentukan, '' telp, "
            . "'' alamat,'33' propinsi, '3324' kabupaten, '' logo_profile";

        $result = $this->db->query($sql);
        //        $response['data'] = $result->getResultArray();      
//        $response["record"] = $result->getNumRows();
        $response = $result->getResultArray();

        $result->freeResult();
        return $response;

        //        $result = $this->selectQueryPaging($sql, $limit, $offset);
//        return $result;
    }

    //    ============ kelompok_spp------------------

    public function loadKlpSpp($kodebma)
    {
        $kodeklp = $this->getsetMasterCodeBma(false, $kodebma, 'kelompok_spp', 'KLPSPP', 0, 0);
        $sql = "SELECT 0 klp_id, '$kodeklp' klp_kode, '' nama_klp, '' rkl_kode, '$kodebma' bma_kode, null create_at, null update_at, '' create_by, '' update_by";

        $result = $this->db->query($sql);
        $response = $result->getResultArray();
        $result->freeResult();
        return $response;
    }

    public function getKlpSppPaging($limit, $offset, $strwhere = "")
    {
        $sql = "SELECT klp_id, klp_kode, nama_klp, rkl_kode, getnamakelurahan(rkl_kode) rkl_nama, bma_kode, create_at, update_at, create_by, update_by 
FROM kelompok_spp
";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;
    }

    public function getKlpSppDetailPaging($limit, $offset, $strwhere = "")
    {
        $sql = "SELECT angg_id, angg_kode, klp_kode, bma_kode, rkl_kode, nama, alamat, jabatan, create_at, update_at, create_by, update_by 
FROM kelompok_anggspp;
";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql . " limit $offset,$limit");
        $response['data'] = $result->getResultArray();
        //        $response["record"] = $result->getNumRows();
        $result->freeResult();

        $result = $this->db->query($sql);
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;
    }

    public function getKlpSppDetail($strwhere = "")
    {
        $sql = "SELECT angg_id, angg_kode, klp_kode, bma_kode, rkl_kode, nama, rt,rw, jabatan, create_at, update_at, create_by, update_by 
FROM kelompok_anggspp
";
        if (strlen($strwhere) > 0) {
            $sql .= " where $strwhere";
        }
        $result = $this->db->query($sql);
        $response['data'] = $result->getResultArray();
        $response["record"] = $result->getNumRows();

        $result->freeResult();
        return $response;
    }

    public function updateAnggSpp($data, $strwhere = "", $arrwhere)
    {
        $sql = "select * from kelompok_anggspp " . $strwhere;
        $result = $this->selectQuery($sql);
        $retval = '';
        if ($result->getNumRows() > 0) {
            $retval = $this->updateBuild('kelompok_anggspp', $data, $arrwhere);
        } else {
            $retval = $this->insertBuild('kelompok_anggspp', $data);
        }
        return $retval;
    }

}