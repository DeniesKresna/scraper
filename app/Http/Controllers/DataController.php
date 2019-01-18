<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $scrapdata = [];
    private $source_host = "http://obrallaptop.com";
    public function index()
    {
       $url='http://obrallaptop.com/category/05---LENOVO/2';
       $client = new Client();
       $crawler = $client->request('GET', $url);
       $crawler->filter('.products-list-container')->each(function ($node) {
          $product = [];
          $product["gambar"] = $this->source_host . $node->children('.products-list-photo > img')->attr('src');
          $product["tipe"] = $node->children('.products-list-info > label')->first()->text();
          $product["harga"] = $node->children()->children('.products-list-info-price')->first()->text();
          array_push($this->scrapdata, $product);
        });
        return view("home", ["data" => $this->scrapdata]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
