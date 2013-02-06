<?php

namespace Sifter;

class RequestException extends \Exception { }

class Request
{

    private static $host;
    private static $token;

    public static function config($host, $token)
    {
        static::$host = $host;
        static::$token = $token;
    }

    public static function make($endpoint, $params = array())
    {
        $headers = array(
            'X-Sifter-Token: ' . static::$token,
            'Accept: application/json',
        );

        $query = http_build_query($params);
        $request_url = 'https://' . static::$host.$endpoint . '?' . $query;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $raw = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($raw, true);

        if (is_null($response)) {
            throw new RequestException(strip_tags($raw));
        } elseif (isset($response['error'])) {
            throw new RequestException($response['error'] . ': ' . $response['detail']);
        }
        return $response;
    }

}
