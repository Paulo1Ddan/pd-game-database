<?php

namespace App\Http\Controllers\App;

use App\Models\Difficulty;
use App\Http\Requests\StoreDifficultyRequest;
use App\Http\Requests\UpdateDifficultyRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\App\DifficultyTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DifficultyController extends Controller
{

    use DifficultyTrait;

    protected $difficulty;

    public function __construct(Difficulty $difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $difficulty = $this->difficulty->where('user_id', auth()->user()->id)->get();

        return view('app.difficulty.index', ['difficulties' => $difficulty]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.difficulty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDifficultyRequest $request)
    {
        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);
        
        $request->validate($this->validateId(), $this->messagesId());

        $this->difficulty->create($request->all());

        return redirect()->route('difficulty.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $difficulty = $this->difficulty->findOrFail($id);
            return redirect()->route('difficulty.edit', $id);
        }catch(\Exception $e){
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $difficulty = $this->difficulty->findOrFail($id);
        }catch(\Exception $e){
            abort(404);
        }

        if(!Gate::allows('difficulty-owner', $difficulty)){
            return redirect()->route('difficulty.index');
        }

        return view('app.difficulty.edit', ['difficulty' => $difficulty]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDifficultyRequest $request, $id)
    {
        try{
            $difficulty = $this->difficulty->findOrFail($id);
        }catch(\Exception $e){
            abort(404);
        }

        if(!Gate::allows('difficulty-owner', $difficulty)){
            return redirect()->route('difficulty.edit');
        }

        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $difficulty->update($request->all());

        return redirect()->route('difficulty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $difficulty = $this->difficulty->findOrFail($id);
        }catch(\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('difficulty-owner', $difficulty)){
            return redirect()->route('difficulty.edit');
        }

        $difficulty->delete();

        return redirect()->route('difficulty.index'); 
    }
}
