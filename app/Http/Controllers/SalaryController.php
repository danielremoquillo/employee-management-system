<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salary = Position::join('employees', 'employees.position_id', '=', 'positions.id')
            ->get(['positions.*', 'employees.employee_name']);

        if ($request->ajax()) {
            $data = Position::join('employees', 'employees.position_id', '=', 'positions.id')
                ->get(['positions.*', 'employees.employee_name']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin/salary', compact('salary'));
    }
}
