<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $projects = Project::all();

        if ($request->ajax()) {
            $data  = Project::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-sm editProject">  
                    <span class="material-symbols-outlined">
                        edit
                    </span></a>';

                    $btn = $btn . ' <a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-sm deleteProject"><span class="material-symbols-outlined">
                    delete
                    </span></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user/projects', compact('projects'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Project::updateOrCreate(

            ['id' => $request->project_id],
            [
                'employee_id' => $request->employee_id,
                'project_name' => $request->project_name,
                'project_due' => $request->project_due,
                'project_sub' => $request->project_sub,
                'project_status' =>   $request->project_status
            ]
        );

        return response()->json(['success' => 'Project saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();

        return response()->json(['success' => 'Project deleted successfully.']);
    }
}
