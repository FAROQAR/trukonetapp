<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/printstyle.css">
        <title>Cetak Label</title>
    </head>
    <body>
        <div class="ticket">
            <!-- <img src="./logo.png" alt="Logo">
            <p class="centered">RECEIPT EXAMPLE
                <br>Address line 1
                <br>Address line 2</p> -->
            <table cellpadding="0">
                <!-- <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">$$</th>
                    </tr>
                </thead> -->
                <tbody>
                
                    <tr>
                        <td class="judulkiri">ID</td>
                        <td class="titik2">:</td>
                        <td class="nilai"><?= $profile->id_pelanggan; ?></td>                    
                    </tr>
                    <tr>
                        <td class="judulkiri">Wifi ID</td>
                        <td class="titik2">:</td>
                        <td class="nilai"><?= $profile->wifi_id; ?></td>                      
                    </tr>
                    <tr>
                        <td class="judulkiri">Wifi Pass</td>
                        <td class="titik2">:</td>
                        <td class="nilai"><?= $profile->wifi_pass; ?></td>                      
                    </tr>
                    <tr>
                        
                        <td class="nama" colspan="3"><?= $profile->nama; ?></td>                      
                    </tr>

                    <!-- <tr>
                        <td class="quantity">2.00</td>
                        <td class="description">JAVASCRIPT BOOK</td>
                        <td class="price">$10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">STICKER PACK</td>
                        <td class="price">$10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price">$55.00</td>
                    </tr> -->
                </tbody>
            </table>
           
        </div>
        <button id="btnPrint" class="hidden-print button" style="margin-top: 10px;">Print</button>
        <script src="<?= base_url(); ?>/assets/js/print.js"></script>
    </body>
</html>