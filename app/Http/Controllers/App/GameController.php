<?php

namespace App\Http\Controllers\App;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Traits\App\GameTrait;
use App\Models\Console;
use App\Models\Difficulty;
use App\Models\Genre;
use App\Models\Score;
use App\Models\Type;
use Illuminate\Contracts\View\View;

class GameController extends Controller
{

    use GameTrait;

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

        $auth_user = auth()->user()->id;

        $genres = Genre::where('user_id', $auth_user)->get();
        $consoles = Console::where('user_id', $auth_user)->get();
        $genres = Genre::where('user_id', $auth_user)->get();
        $types = Type::where('user_id', $auth_user)->get();
        $scores = Score::where('user_id', $auth_user)->get();
        $difficulties = Difficulty::where('user_id', $auth_user)->get();

        return view('app.games.create', [
            'consoles' => $consoles,
            'genres' => $genres,
            'types' => $types,
            'scores' => $scores,
            'difficulties' => $difficulties
        ]);
    }

    public function store(StoreGameRequest $request)
    {

        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $cover = $request->cover;

        $cover_name = $cover->store('img/game', 'public');

        $data = $this->getGameData($request->all(), $cover_name);

        $this->game->create($data);

        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $game = Game::findOrFail($id);

        return view("app.games.show", ["game" => $game]);
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
