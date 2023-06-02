<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use GuzzleHttp\Client;

/**
 *
 */
trait API_ProductTraits
{
    public function ApiExternGetByReq($pram_url = null)
    {
        $client = new Client();
        if ($pram_url != null) {
            $url = "$pram_url->url";
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);
            $responseBody = json_decode($response->getBody());
            //$result = json_encode($responseBody);
            return response()->json($responseBody->products);
        } else {
            return response()->json('Not Found', 404);
        }

        // $cek = $request->url ? $request->url : 'https://api.slingacademy.com/v1/sample-data/photos';
        // $client = new Client();
        // $url = "$request->url";
        // $response = $client->request('GET', $url, [
        //     'verify'  => false,
        // ]);
        // $responseBody = json_decode($response->getBody());
        // dd(json_encode($responseBody));
    }

    public function ApiProductSample()
    {
        $client = new Client();
        $url = "https://api.slingacademy.com/v1/sample-data/photos";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return response()->json($responseBody);

        // $result = json_encode($responseBody);
        // if (!empty($result)) {
        //     return response()->json($result);
        // } else {
        //     return response()->json(
        //         'Not Found',
        //         404
        //     );
        // }
    }
}
