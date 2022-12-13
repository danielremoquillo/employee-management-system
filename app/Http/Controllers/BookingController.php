<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $flights = Flight::join('airports as departure_airport', 'flights.departure_airport_id', '=', 'departure_airport.id')
            ->join('airports as arrival_airport', 'flights.arrival_airport_id', '=', 'arrival_airport.id')
            ->get(['flights.*', 'departure_airport.name as departure_airport', 'arrival_airport.name as arrival_airport']);

        if ($request->ajax()) {

            $data = Flight::join('airports as departure_airport', 'flights.departure_airport_id', '=', 'departure_airport.id')
                ->join('airports as arrival_airport', 'flights.arrival_airport_id', '=', 'arrival_airport.id')
                ->get(['flights.*', 'departure_airport.name as departure_airport', 'arrival_airport.name as arrival_airport']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Reserve" class="reserve btn btn-success btn-sm reserveFlight">Reserve</a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

            return view('site.bookings', compact('flights'));
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
        $flight = Flight::find($id);
        return response()->json($flight);
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
