<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
class AdsController extends Controller
{
    //

    public function index()
    {
      $ads = Ads::all();

      return response()->json([
          'ads' => $ads
      ]);
    }

    public function store(Request $request)
    {
          $ads_new = new Ads();
          $ads_new->name= $request->name;
          $ads_new->type_ads = $request->type_ads;
          $ads_new->cc = $request->cc;
          $ads_new->cl = $request->cl;
          $ads_new->pc = $request->pc;
          $ads_new->pl = $request->pl;
          $ads_new->address = $request->address;
          $ads_new->sleeve_id = $request->sleeve_id;
          $ads_new->state_id = $request->state_id;
          $ads_new->municipality_id = $request->municipality_id;
          $ads_new->parish_id = $request->parish_id;
          $ads_new->sector_id = $request->sector_id;
          $ads_new->coord_x = $request->coord_x;
          $ads_new->coord_y = $request->coord_y;

          $ads_new->save();

          return response()->json([
            'ads_new' => $ads_new
          ]);

    }

    public function destroy($id)
    {
        $find_ads = Ads::find($id);
        $find_ads->delete();

        return response()->json([
          'success' => 'delete'
        ]);
    }
}
