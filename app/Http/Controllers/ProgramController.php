<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::all();
        $sort = Program::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        $data = ['program' => $sort];
        return view('programs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = new Program();
        $data = ['program' => $program];
        return view('programs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required',
            'content' => 'required',
        ]);
        $program = new Program();
        $program->title = $request->title;
        $program->date = $request->date;
        $program->time = $request->time;
        $program->content = $request->content;
        $program->place = $request->place;
        $program->save();

        return redirect(route('programs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $data = ['program' => $program];
        return view('programs.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $data = ['program' => $program];
        return view('programs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required',
            'content' => 'required',
        ]);
        $program->title = $request->title;
        $program->date = $request->date;
        $program->time = $request->time;
        $program->content = $request->content;
        $program->place = $request->place;
        $program->save();
        return redirect(route('programs.show', $program));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect(route('programs.index'));
    }
}
