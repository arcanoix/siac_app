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


    public function show($id)
    {
      if($manga = Manga::find($id)){

        return $manga;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }


    public function update(Request $request, $id)
    {
      if($manga = Manga::find($id)){
        $manga->name = $request->name;
        $manga->address = $request->address;
        $manga->description = $request->description;

        //dd($manga);

          $manga->save();
        return $manga;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }


    public function destroy($id)
    {
        $manga=Manga::find($id);
        $manga->delete();
    }
}
