<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Facebook;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppMessageController extends Controller
{

    public static function index(Request $request)
    {
        $to_phone = "529181239390";

        try {

            $token    = 'EAAH6k1ZB6C6EBAHNtzTxv0aEpHZAfX0oYBZA1WnSzfZB0PZAGBfq8CEjOxEh95qUxeBvY2q0oyHYSpcreVN1JZAZB78ZCZAHZCmXfz8ZCmGQ3mTG2WPrZCTgAh57vy9dzYycTm6PKsNx4XZCfNPLUAmPtCZAlIdjUlNJ03Rgog4OQeDeZCZBxlLdEeRwHpCzRHTZC7ZACgQCqjdQLkNpJBjwZDZD';

            $id_phone = '100636559689082';

            $version  = 'v16.0';

            $payload  = [
                "messaging_product" => "whatsapp",
                "to"                => $to_phone,
                "type"              => "template",
                "template"          => [
                    "name"     => "hello_world",
                    "language" => [
                        "code" => "en_US"
                    ]
                ]
            ];

            $message = Http::withToken($token)
                ->post( 'https://graph.facebook.com/' . $version . '/' . $id_phone . '/messages', $payload )
                ->throw()
                ->json();

            return response()->json([
                'success' => true,
                'data'    => $message
            ], 200);

        } catch ( RequestException $exception ) {

            return response()->json([
                'success' => false,
                'data'    => $exception->getMessage()
            ], 500);

        }

        /*$client   = new Client();

        $base_uri = 'https://graph.facebook.com/v16.0/';

        $me_uri   = '100636559689082/messages';

        $token    = 'EAAH6k1ZB6C6EBAHNtzTxv0aEpHZAfX0oYBZA1WnSzfZB0PZAGBfq8CEjOxEh95qUxeBvY2q0oyHYSpcreVN1JZAZB78ZCZAHZCmXfz8ZCmGQ3mTG2WPrZCTgAh57vy9dzYycTm6PKsNx4XZCfNPLUAmPtCZAlIdjUlNJ03Rgog4OQeDeZCZBxlLdEeRwHpCzRHTZC7ZACgQCqjdQLkNpJBjwZDZD';

        $headers  = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ];

        $body     = '{
            "messaging_product": "whatsapp",
            "to"               : "529181239390",
            "type"             : "template",
            "template"         : {
                "name"    : "hello_world",
                "language": {
                    "code" : "en_US"
                }
            }
        }';

        $response = $client->request('POST', $base_uri . $me_uri, [
                'headers' => $headers,
                'body'    => $body
            ]);*/

        return view('system.whatsapp-message.index');
    }

    public static function show( Request $request )
    {

        $fb = new Facebook([
            'app_id' => '100636559689082',
            'app_secret' => '{tu_app_secret}',
            'default_graph_version' => 'v16.0',
        ]);

        $recipient = 'whatsapp:529181239390'; // número de teléfono en formato internacional
        $message = array(
            'text' => 'Hola desde mi aplicación de Laravel!'
        );

        $request = $fb->post('/me/messages', $message, $recipient, 'EAAH6k1ZB6C6EBAHNtzTxv0aEpHZAfX0oYBZA1WnSzfZB0PZAGBfq8CEjOxEh95qUxeBvY2q0oyHYSpcreVN1JZAZB78ZCZAHZCmXfz8ZCmGQ3mTG2WPrZCTgAh57vy9dzYycTm6PKsNx4XZCfNPLUAmPtCZAlIdjUlNJ03Rgog4OQeDeZCZBxlLdEeRwHpCzRHTZC7ZACgQCqjdQLkNpJBjwZDZD');

        $response = $request->getGraphResponse();

    }

    public static function akeditor( Request $request )
    {
        return view('system.whatsapp-message.akeditor');
    }

}
