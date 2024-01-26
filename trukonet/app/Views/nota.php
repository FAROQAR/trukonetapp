<html>
    <head>
        <title>Cetak Nota <?= $profile->idpel ?></title>
        
    </head>
    <style>
       @page {
    margin: 0
}

body {
    margin: 0;
    font-size: 12px;
    font-family: Arial;
    /* font-family: monospace; */
}

td {
    font-size: 12px;
}

.sheet {
    margin: 0;
    overflow: hidden;
    position: relative;
    box-sizing: border-box;
    page-break-after: always;
}
.centered {
    text-align: center;
    align-content: center;
}

/** Paper sizes **/

body.struk .sheet {
    width: 58mm;
}

body.struk .sheet {
    padding: 2mm;
}

.txt-left {
    text-align: left;
}

.txt-center {
    text-align: center;
}

.txt-right {
    text-align: right;
}


/** For screen preview **/

@media screen {
    body {
        background: #e0e0e0;
        font-family: monospace;
    }
    .sheet {
        background: white;
        box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
        margin: 5mm;
    }
}


/** Fix for Chrome issue #273306 **/

@media print {
    body {
        font-family: monospace;
    }
    body.struk {
        width: 58mm;
        text-align: left;
    }
    body.struk .sheet {
        padding: 2mm;
    }
    .txt-left {
        text-align: left;
    }
    .txt-center {
        text-align: center;
    }
    .txt-right {
        text-align: right;
    }
}
    </style>
    <script>
            var lama = 1000;
            t = null;
            function printOut(){
                window.print();
                t = setTimeout("self.close()",lama);
            }
</script>
    <body class="struk" onload="printOut()">
        <section class="sheet">
        <p class="centered" style="font-size:14px;" > <b>BUMDesa
                <br>Berkah Amanah</b></p>
        <?php
            // 
            $invoice = $profile->ref_lunas. str_repeat("&nbsp;", (30 - (strlen($profile->ref_lunas))));
            //$kasir='';
            $iduser = $profile->idpel. str_repeat("&nbsp;", (40 - (strlen($profile->idpel))));
            //$tgl = date('d-m-Y H:i:s', strtotime($d->created_at)). str_repeat("&nbsp;", (40 - (strlen(date('d-m-Y H:i:s', strtotime($d->created_at))))));
            $tgl = $profile->tgl_lunas. str_repeat("&nbsp;", (40 - (strlen($profile->tgl_lunas))));
            $nama = $profile->nama. str_repeat("&nbsp;", (40 - (strlen($profile->nama))));
            $alamat = $profile->alamat.' '.$profile->dusun;
            $alamat = $alamat. str_repeat("&nbsp;", (48 - (strlen($alamat))));
            $dusun = $profile->dusun. str_repeat("&nbsp;", (48 - (strlen($profile->dusun))));
            $paket = $profile->paket. str_repeat("&nbsp;", (40 - (strlen($profile->paket))));
            $tglon = $profile->tgl_on. str_repeat("&nbsp;", (40 - (strlen($profile->tgl_on))));
            // $tarif = $profile->tarif_bln. str_repeat("&nbsp;", (40 - (strlen($profile->tarif_bln))));
            // $tagihan = $profile->tagihan. str_repeat("&nbsp;", (40 - (strlen($profile->tagihan))));
            // $bi_admin = $profile->bi_admin. str_repeat("&nbsp;", (40 - (strlen($profile->bi_admin))));
            // $total_tagihan = $profile->total_tagihan. str_repeat("&nbsp;", (40 - (strlen($profile->total_tagihan))));
            $tarif =  str_repeat("&nbsp;", (12 - (strlen($profile->tarif_bln)))).$profile->tarif_bln;
            $tagihan =  str_repeat("&nbsp;", (12 - (strlen($profile->tagihan)))).$profile->tagihan;
            $bi_admin =  str_repeat("&nbsp;", (12 - (strlen($profile->bi_admin)))).$profile->bi_admin;
            $total_tagihan =  str_repeat("&nbsp;", (12 - (strlen($profile->total_tagihan)))).$profile->total_tagihan;
            

            echo '<table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                        <td align="left" class="txt-left">Ref&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $invoice. '.</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Tgl&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $tgl.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">IDUser&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $iduser.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Nama&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $nama.'</td>
                    </tr>
                    <tr>
                        <td align="left" colspan="3" class="txt-left">'.$alamat.'</td>                                             
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Aktif&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $tglon.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Paket&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $paket.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Tarif&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $tarif.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Tagihan&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $tagihan.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Bi.Admin&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $bi_admin.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Total&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $total_tagihan.'</td>
                    </tr>
                </table>';
            echo '<br/>';
            
            $footer = 'Terima kasih';
            $starSpace = ( 28 - strlen($footer) ) / 2;
            $starFooter = str_repeat('*', $starSpace);
            echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/>");
            $footer = 'Atas Kerjasamanya';
            $starSpace = ( 28 - strlen($footer) ) / 2;
            $starFooter = str_repeat('*', $starSpace);
            echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/><br/><br/><br/>");
            echo '<p>&nbsp;</p>';  
            
        ?>
        </section>
        
    </body>
</html>