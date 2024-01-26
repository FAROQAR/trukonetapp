<?php

namespace App\Models;

use CodeIgniter\Model;

class GSheetModel extends Model
{
    public function getCustomer(){
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets Api');
        $client->setScopes([\Google\Service\Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig('keyfile.json');

        $service = new \Google\Service\Sheets($client);
        $spreadsheetId = "1FEkB1KXgU-blyKstnq5vdEJxzv0xL32tLGE2g2yrXxk";
        $get_range = 'aktif';
        $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

        $values = $response->getValues();
        return $values;
    }
}
