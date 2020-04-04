<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Apartment;
use App\Option;



class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function querySearch($lat,$lon,$circle_radius,$visibilita,$postiLetto,$stanze,$options)
    {

            $apartments = Apartment::where(function($query) use ($lat, $lon, $circle_radius){
            $query->whereRaw("6371 * acos(
                                      cos(radians(" . $lat . "))
                                    * cos(radians(apartments.lat))
                                    * cos(radians(apartments.lon) - radians(" . $lon . "))
                                    + sin(radians(" .$lat. "))
                                    * sin(radians(apartments.lat))) <= " . $circle_radius);
        })->where('visibilita', '>=', $visibilita)->where('posti_letto', '>=' , $postiLetto)->where('stanze', '>=', $stanze);

        if ($options === null){
            return $apartments;
        }else{
            $apartments->whereHas('options',function ($query) use($options){
                $query->whereIn('nome',$options);
            });
        }

        return $apartments;

    }
    public function index(Request $request)
    {

        //Get lat , lon ,visibilita and nr of posti letto
        $lat = $request->lat;
        $lon = $request->lon;
        $visibilita = $request->visibilita;
        $postiLetto = $request->posti_letto;
        $stanze = $request->stanze;
        $circle_radius = 50;//50 km
        //check if all the field as different of null
        if (!$lat || !$lon) {
            $lat = $lon = 0.0;
            $circle_radius = 20000000000;//If no lat or no lon assign  both 0.0 and assign a very large km number that cover all the earth to return alla apartment
        }
        if(!$visibilita || !$postiLetto || !$stanze){
            $visibilita =  1;//If this values are null assign 1
            $postiLetto = 1;
            $stanze = 1;
        }
        //dd($request->options);
        if ($request->options){
            $opzioni = $request->options;
        }else{
            $opzioni = null;
        }

        $options = Option::all();
        $apartments = $this->querySearch($lat,$lon,$circle_radius,$visibilita,$postiLetto,$stanze,$opzioni)->paginate();
        $apartmentsAll = Apartment::all(); //Luca: aggiunto per poter viasualizzare tutti gli appartamenti in promo indipendentemente dalla query di ricerca




        return view('apartments.index',['apartments'=>$apartments, 'options'=> $options, 'lat'=>$lat,'lon'=>$lon, 'apartmentsAll'=>$apartmentsAll ]);
    }

    public function search(Request $request)
    {

        if ($request->ajax()){
            //Get lat , lon ,visibilita and nr of posti letto
            $lat = $request->lat;
            $lon = $request->lon;
            $circle_radius = $request->circle_radius;
            $visibilita = 1;
            $stanze = $request->stanze;
            $postiLetto = $request->get('posti_letto');

            //check if all the field as different of null
            if (!$lat || !$lon) {
                $lat = $lon = 0.0;
                $circle_radius = 20000000000;//If no lat or no lon assign  both 0.0 and assign a very large km number that cover all the earth to return alla apartment
            }

            if($lat == 0 AND $lon == 0){
                $circle_radius = 20000000000;
            }
            if(!$visibilita || !$postiLetto || !$stanze){
                $visibilita =  1;//If this values are null assign 1
                $postiLetto = 1;
                $stanze = 1;
            }

            if ($request->options){
                $opzioni = $request->options;
            }else{
                $opzioni = null;
            }

            $apartments = $this->querySearch($lat,$lon,$circle_radius,$visibilita,$postiLetto,$stanze,$opzioni)->paginate();

            //return Response($request);
            return view('layouts.partials.pagination_data',compact('apartments'))->render();
            //return view('layouts.partials.pagination_data',['apartments'=>$apartments, 'query'=>$query])->render();

        }


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
      $apartment = Apartment::find($id);
      views($apartment)->record();
      // $apartment = Apartment::where('titolo')->get();
      return view('apartments.show', compact('apartment'));
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
    public function update($id)
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
