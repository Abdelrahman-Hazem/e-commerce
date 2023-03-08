<?php 

namespace App\Http\Services ;

//use Facade\FlareClient\Http\Client;
use GuzzleHttp\Client;
class FatoorahServices 
{
   private $base_url;
   private $headers;
   private $request_client;
   public function __construct(Client $request_client)
   {
     $this->request_client = $request_client;
     $this->base_url = env('fatoora_base_url');
     $this->headers = [
      'Content-Type' => 'application/json',
      'authorization'=> 'Bearer'. env('fatoora_token')
   ];
   }

   private function buildRequest($url, $method, $body=[])
   {
      # code...
   }

   public function sendPayment($data)
   {
     
   }
}