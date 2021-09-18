<?php
namespace App\Services;

use GuzzleHttp\Client;

class IceConsumer {

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $bookName;

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getBookName(){
        return $this->bookName;
    }

    public function setBookName($bookName){
        $this->bookName = $bookName;
        return $this;
    }

    public function setHttpClient($httpClient){
        $this->httpClient = $httpClient;
        return $this;
    }

    public function getExternalBooks(){
        $httpClient = $this->httpClient;
        $url = "https://www.anapioficeandfire.com/api/books";

        $params = [
            'query' => [
                'name' => $this->bookName
                
             ]
        ];

        
        $response = $httpClient->request('GET', $url, $params);
        $responseBody = json_decode($response->getBody());
        
        
        array_walk($responseBody, function($e){
            unset($e->characters);
            unset($e->povCharacters);
            unset($e->url);
            unset($e->mediaType);
        });
        
        return $responseBody;

    }

    
}