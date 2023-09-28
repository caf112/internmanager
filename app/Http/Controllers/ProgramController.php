<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = $request->query('order', 'asc');
        $programs = Program::orderBy('date', $order)->orderBy('time', $order)->get();
        return view('programs.index', compact('programs', 'order'));
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
        $program->period = $request->period;
        $program->selection = $request->selection;
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
        $program->period = $request->period;
        $program->selection = $request->selection;
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

    public function sort(Program $program)
    {
        $program = Program::orderBy('date', 'asc')->get();
    }

    public function search(Request $request)
    {
        Log::debug('test2');

        $order = $request->query('order', 'asc');
         $programs = Program::paginate(20);

        $search = $request->input('search');

        $query = Program::query();

        if ($search) {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }
            $programs = $query->paginate(20);
        }

        return view('programs.index')
            ->with([
                'programs' => $programs,
                'search' => $search,
                'order' => $order
            ]);
        }
        public function industryFilter(Request $request){
            $industry = $request->input('industry');
            $order = $request->query('order', 'asc');
    
            if ($industry === 'all') {
                // カテゴリが「全て」の場合はすべてのアイテムを取得
                $programs = Program::all();
            } else {
                // 指定されたカテゴリで絞り込み
                $programs = Program::where('industry', $industry)->get();
            }
    
            return view('programs.index', compact('programs','order'));
        }
    
        public function periodFilter(Request $request){
            $period = $request->input('period');
            $order = $request->query('order', 'asc');
    
            if ($period === 'all') {
                // カテゴリが「全て」の場合はすべてのアイテムを取得
                $programs = Program::all();
            } else {
                // 指定されたカテゴリで絞り込み
                $programs = Program::where('period', $period)->get();
            }
    
            return view('programs.index', compact('programs','order'));
        }
}