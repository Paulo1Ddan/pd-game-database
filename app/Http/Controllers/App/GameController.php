<?php

namespace App\Http\Controllers\App;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Console;
use App\Models\Difficulty;
use App\Models\Genre;
use App\Models\Score;
use App\Models\Type;

class GameController extends Controller
{

    protected $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function index()
    {
        $games = $this->game->where('user_id', auth()->user()->id)->get();

        return view('app.games.index', ['games' => $games]);
    }

    public function create()
    {
        $genres = Genre::where('user_id', auth()->user()->id)->get();

        $consoles = Console::where('user_id', auth()->user()->id)->get();
        $genres = Genre::where('user_id', auth()->user()->id)->get();
        $types = Type::where('user_id', auth()->user()->id)->get();
        $scores = Score::where('user_id', auth()->user()->id)->get();
        $difficulties = Difficulty::where('user_id', auth()->user()->id)->get();

        return view('app.games.create', [
            'consoles' => $consoles,
            'genres' => $genres,
            'types' => $types,
            'scores' => $scores,
            'difficulties' => $difficulties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
