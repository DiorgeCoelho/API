<?php
require_once __DIR__ . '/../models/LogModel.php';

class Films
{
    public static function getAll()
    {
        $url = API_BASE_URL; 
        $response = self::Request($url);

        $logModel = new LogModel();
        $status = $response ? 200 : 500; 
        $logModel->saveLog($url, $status, 'GET');

        return $response['results'];
    }

    public static function getDetails($id)
    {

        $url = API_BASE_URL . $id . '/';
        $response = self::Request($url);

        $logModel = new LogModel();
        $status = $response ? 200 : 500; 
        $logModel->saveLog($url, $status, 'GET');

    if (isset($response['characters']) && is_array($response['characters'])) {
        $characters = [];
        foreach ($response['characters'] as $character_url) {
            
            $character_response = self::Request($character_url);
            if (isset($character_response['name'])) {
                $characters[] = $character_response['name'];
            }
        }
    
        $response['characters_names'] = $characters;
    }
        return $response;
    }

    private static function Request($url)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    public static function calculate($releaseDate)
    {
        $releaseDate = new DateTime($releaseDate);
        $currentDate = new DateTime(CURRENT_DATE);
        $diff = $releaseDate->diff($currentDate);
        return $diff;
    }
}
