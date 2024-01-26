<html>
    <head>
        <title>Cetak Nota <?= $profile['idpel'] ?></title>
        
    </head>
    <style>
       @page {
    margin: 0
}

body {
    margin: 0;
    font-size: 12px;
    font-family: arial;
    font-weight: bold;
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


/** Paper sizes **/

body.struk .sheet {
    width: 50mm;
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
        font-family: arial;
        /* font-weight: bold; */
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
        /* font-weight: bold; */
    }
    body.struk {
        width: 50mm;
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
        <?php
            // echo '<table cellpadding="0" cellspacing="0">
            //         <tr>
            //             <td>ID :'.$profile['idpel'].'</td>
            //         </tr>
            //         <tr>
            //             <td>Wifi ID : '.$profile['wifiid'].'</td>
            //         </tr>
            //         <tr>
            //             <td>WIfi Pass: '.$profile['wifipass'].'</td>
            //         </tr>
            //         <tr>
            //             <td>'.$profile['nama'].'</td>
            //         </tr>
            //     </table>';
            // echo(str_repeat("=", 30)."<br/>");
            $idpel = $profile['idpel']. str_repeat("&nbsp;", (30 - (strlen($profile['idpel']))));
            $wifiid = $profile['wifiid']. str_repeat("&nbsp;", (30 - (strlen($profile['wifiid']))));
            $wifipass = $profile['wifipass']. str_repeat("&nbsp;", (30 - (strlen($profile['wifipass']))));
            // $customer = '['. $customer->nia.'] '.$customer->name;
            $nama = $profile['nama']. str_repeat("&nbsp;", (30 - (strlen($profile['nama']))));

            echo '<table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                        <td align="left" class="txt-left">ID&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $idpel. '.</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Wifi&nbsp;ID&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $wifiid.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">WIfi&nbsp;Pass&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $wifipass.'</td>
                    </tr>
                    <tr>
                        <td align="left" colspan="3" class="txt-left">'.$nama.'</td>
                    </tr>
                </table>';
           
            // echo '</table>';
            echo("<br/><br/>");
            echo '<p>&nbsp;</p>';  
            // $footer = 'Terima kasih atas kunjungan anda';
            // $starSpace = ( 32 - strlen($footer) ) / 2;
            // $starFooter = str_repeat('*', $starSpace+1);
            // echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/><br/><br/><br/>");
            // echo '<p>&nbsp;</p>';  
            
        ?>
        </section>
        
    </body>
</html>