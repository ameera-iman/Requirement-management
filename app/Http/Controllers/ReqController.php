<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Requirement;
use App\Models\Status;
use App\Models\Label;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        //$reqs = Requirement::where('project_id', $pid)->with(['status','project']) ->get();
        $reqs = Requirement::where('project_id', $pid)->get();
        $project = Project::find($pid);

        return view ('req.req_index', compact('reqs', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid)
    {
        $statuses = Status::all();
        $labels = Label::all();
        $project = Project::find($pid);

        return view('req.req_create', compact('statuses', 'project','labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reqs = new Requirement;

        $reqs->name = $request->input('name');
        $reqs->status_id = $request->input('status_id');
        $reqs->project_id = $request->input('project_id');

        $reqs-> save();
        $reqs->labels()->sync($request->labels);
        $pid = $request->input('project_id');

        return redirect()->route('req.req_index', $pid)->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $req = Requirement::find($id);
        return view('req.req_show', compact('req'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuses = Status::all();
        $labels = Label::all();
        $req = Requirement::find($id);

        return view('req.req_edit',compact('req','statuses','labels'));
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
        $req = Requirement::find($id);

        $req->name = $request->input('name');
        $req->status_id = $request->input('status_id');

        $req-> save();
        $req->labels()->sync($request->labels);
        $pid = $request->input('project_id');

        return redirect()->route('req.req_index', $pid)->with('success', 'Successfully added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid, $id)
    {
        Requirement::find($id)->delete();
        return redirect()->route('req.req_index', $pid)->with('success', 'Successfully deleted');
    }
}
