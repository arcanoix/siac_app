<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manga;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manga = Manga::paginate(5);

        $response = [
         'pagination' => [
             'total' => $manga->total(),
             'per_page' => $manga->perPage(),
             'current_page' => $manga->currentPage(),
             'last_page' => $manga->lastPage(),
             'from' => $manga->firstItem(),
             'to' => $manga->lastItem()
         ],
         'data' => $manga
     ];

     return $response;

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
        $manga= new Manga();

        $manga->name = $request->name;
        $manga->address = $request->address;
        $manga->description = $request->description;

        //dd($manga);

          $manga->save();

        return response()->json([
            'manga' => $manga
        ]);
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
        $manga=Manga::find($id);
        $manga->delete();
    }
}
