<?php

namespace App\Http\Controllers\App;

use App\Models\Score;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use App\Http\Traits\App\ScoreTrait;
use Illuminate\Support\Facades\Gate;

class ScoreController extends Controller
{

    use ScoreTrait;

    protected $score;

    public function __construct(Score $score)
    {
        $this->score = $score;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $score = $this->score->where('user_id', auth()->user()->id)->get();

        return view('app.score.index', ['scores' => $score]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.score.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScoreRequest $request)
    {
        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $this->score->create($request->all());

        return redirect()->route('score.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $score = $this->score->findOrFail($id);
            return redirect()->route('score.edit', $id);
        }catch(\Exception $e){
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $score = $this->score->findOrFail($id);
        } catch (\Exception $e) {
            abort(404); 
        }

        if(!Gate::allows('score-owner', $score)){
            return redirect()->route('score.index');
        }

        return view('app.score.edit', ['score' => $score]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScoreRequest $request, $id)
    {
        try{
            $score = $this->score->findOrFail($id);
        }catch (\Exception $e){
            abort(404);
        }

        if(!Gate::allows('score-owner', $score)){
            return redirect()->route('score.index');
        }

        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $score->update($request->all());

        return redirect()->route('score.index');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $score = $this->score->findOrFail($id);
        }catch(\Exception $e){
            abort(404);
        }

        if(!Gate::allows('score-owner', $score)){
            return redirect()->route('score.index');
        }

        $score->delete();

        return redirect()->route('score.index');
    }
}
