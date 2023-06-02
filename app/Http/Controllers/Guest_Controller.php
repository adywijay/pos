<?php

namespace App\Http\Controllers;

use App\Http\Traits\API_ProductTraits;
use App\Http\Traits\ProductsTraits;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use GuzzleHttp\Client;

class Guest_Controller extends Controller
{
    use API_ProductTraits;
    use ProductsTraits;

    /* ================================================= Function View ===============================*/
    public function index()
    {
        return view('guest.home_view', [
            "judul" => "Dashboard | Guest"
        ]);
    }
    public function getProductDefault()
    {
        return view('guest.mtdata_product_all', [
            "judul" => "Dashboard | ByUrl"
        ]);
    }

    public function addProductReq()
    {
        $get = $this->getProductsAll();
        $jml = $get->count();
        $publish = $jml ? $jml : 0;
        return view('guest.mdata_product_search', [
            "judul" => "Product"
        ], compact('publish'));
    }

    /* ================================================= End Function View ===============================*/

    /* ================================================= Function Insert ===============================*/
    public function insertProducts(Request $req)
    {
        $this->validate($req, [
            'title' => 'required',
            'description_product' => 'required',
            'price' => 'required',
            'discon_percentage' => 'required',
            'rating' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
            'image' => 'required'
        ]);
        $pram_insert = [
            'title'             => $req->title,
            'description_product'       => $req->description_product,
            'price'             => $req->price,
            'discon_percentage' => $req->discon_percentage,
            'rating'            => $req->rating,
            'stock'             => $req->stock,
            'brand'             => $req->brand,
            'category'          => $req->category,
            'thumbnail'         => $req->thumbnail,
            'image'             => $req->image
        ];

        return $this->addProducts($pram_insert);
    }
    /* ================================================= End Function Insert ===============================*/



    /* ================================================= Function Update ===============================*/
    public function searchProduct(Request $request)
    {
        $get_input = $request->search;
        return $this->autocompleteProducts($get_input);
    }

    public function getIdProduct($id)
    {
        return $this->getByIdProducts($id);
    }

    public function actionUpdateProduct(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateProducts($get_id, $get_all);
    }
    /* ================================================= End Function Update ===============================*/




    /* ================================================= Function Delete ===============================*/
    /* ================================================= End Function Update ===============================*/
    public function tes(Request $request)
    {
        $get = $this->ApiExternGetByReq($request);
        return $get;
        // $client = new Client();
        // $url = "https://api.slingacademy.com/v1/sample-data/photos";
        // $response = $client->request('GET', $url, [
        //     'verify'  => false,
        // ]);
        // $responseBody = json_decode($response->getBody());
        // dd($responseBody);

        // return view('guest.mtdata_product_all', [
        //     "judul" => "Dashboard | Product"
        // ], compact('responseBody'));
        //$cek = $request->url ? $request->url : NULL;
        //dd($request);
        // $cek = $request->url ? $request->url : 'https://api.slingacademy.com/v1/sample-data/photos';
        // $client = new Client();
        // $url = "$request->url";
        // $response = $client->request('GET', $url, [
        //     'verify'  => false,
        // ]);
        // //$responseBody = json_decode($response->getBody());
        // $responseBody = json_decode($response->getBody(), true);
        // dd($responseBody->context);
        // dd(json_encode($responseBody));


        // return view('guest.mtdata_product_all', [
        //     "judul" => "Dashboard | Product"
        // ], compact('responseBody'));
    }

    public function getProducts($url)
    {
        $client = new Client();
        $url = "https://api.slingacademy.com/v1/sample-data/photos";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());

        return view('guest.mtdata_product_all', [
            "judul" => "Dashboard | Product"
        ], compact('responseBody'));
    }

    public function tesGetApi()
    {
        $get = $this->ApiProductSample();
        return $get;
    }
}
