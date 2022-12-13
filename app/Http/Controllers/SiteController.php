<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Flight;
use App\Models\Airport;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $airports = Airport::all();
        return view('site.booking', compact('airports'));
    }

    public function bookRegistration(Request $request)
    {
        $flight_id = $request->flight_id;
        $flights = Flight::where('flights.id', '=', $flight_id)
            ->join('airports as departure_airport', 'flights.departure_airport_id', '=', 'departure_airport.id')
            ->join('airports as arrival_airport', 'flights.arrival_airport_id', '=', 'arrival_airport.id')

            ->get(['flights.*', 'departure_airport.name as departure_airport', 'arrival_airport.name as arrival_airport'])->toArray();

        if ($flight_id) {
            return view('site.bookdetails', compact('flights'));
        }
        return redirect('site/bookings');
    }

    public function bookRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'full_name' => 'required',
            'address' => 'required'
        ]);


        $booked = new Employee();
        $booked->flight_id = $request->flight_id;
        $booked->full_name = $request->full_name;
        $booked->email = $request->email;
        $booked->address = $request->address;
        $result = $booked->save();


        if ($result) {
            return back()->with('Success', 'You have booked successfully');
        } else {
            return back()->with('Error', 'Something wrong');
        }
    }
}
