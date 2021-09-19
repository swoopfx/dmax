<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BooksService;


class BooksController extends Controller
{
    private $booksService;

    public function __construct(BooksService $service)
    {
        $this->booksService = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bookService = $this->booksService;
        return response()->json(
           [
               "status_code"=>200,
               "status"=>"success",
               "data"=>$bookService->readBooks()
           ], 200
       );
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
        
            $data = $request->validate([
                "name"=>"required",
                "isbn"=>"required",
                "number_of_pages"=>"required|integer",
                "country"=>"required",
                "publisher"=>"required",
                "authors"=>"required|string",
                "release_date"=>"required|date_format:Y-m-d",
            ]);
            
            $res = $this->booksService->createBook($data);
            return response()->json(
                [
                    "status_code"=>201,
                    "status"=>"success",
                    "data"=>$res
                ], 201
            );
        
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route()->parameter('id');
         $bookService = $this->booksService;
         return response()->json(
            [
                "status_code"=>200,
                "status"=>"success",
                "data"=>$bookService->getBook($id)
            ], 200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      
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
        $data = $request->validate([
            "name"=>"required",
            "isbn"=>"required",
            "number_of_pages"=>"required|integer",
            "country"=>"required",
            "publisher"=>"required",
            "authors"=>"required|string",
            "release_date"=>"required|date_format:Y-m-d",
        ]);

        $id = $request->route()->parameter('id');
        $res = $this->booksService->updateBook($data, $id);
        
        return response()->json(
            [
                "status_code"=>200,
                "status"=>"success",
                "message"=>"The book {$res[0]['name']} was updated successfully",
                "data"=>$res
            ], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route()->parameter('id');
        $bookName = $this->booksService->removeBook($id);
        
        return response()->json(
            [
                "status_code"=>204,
                "status"=>"success",
                "message"=>"The book {$bookName} was updated successfully",
                "data"=>[]
            ], 200
        );
    }
}
