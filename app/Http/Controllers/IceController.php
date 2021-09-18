<?php

namespace App\Http\Controllers;

use App\Services\IceConsumer;
use Illuminate\Http\Request;

class IceController extends Controller
{
    /**
     * @var IceConsumer
     */
    private $iceService ;

    public function __construct(IceConsumer $iceService)
    {
        $this->iceService = $iceService;
    }
    
    public function externalbookByName(Request $request){
        if($request->has("name")){
            $bookName = $request->input("name");
            $data = $this->iceService->setBookName($bookName)->getExternalBooks();
        
            return response()->json([
                "status_code"=>200,
                "status"=>"success",
                "data"=>$data
            ], 200);
        }
       
    }
}
