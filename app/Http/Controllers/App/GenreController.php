<?php

namespace App\Http\Controllers\App;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Traits\App\GenreTrait;
use Illuminate\Support\Facades\Gate;

class GenreController extends Controller
{

    use GenreTrait;

    protected $genre;

    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = $this->genre->where('user_id', auth()->user()->id)->get();

        return view('app.genres.index', ['genres' => $genres]);
    }

    /**
        * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('app.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $this->genre->create($request->all());

        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $genre = $this->genre->findOrFail($id);

            return redirect()->route('genre.edit', $id);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $genre = $this->genre->findOrFail($id);
        } catch(\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('genre-owner', $genre)){
            return redirect()->route('genre.index');
        }

        return view('app.genres.edit', ['genre' => $genre]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, $id)
    {
        try {
            $genre = $this->genre->findOrFail($id);
        } catch(\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('genre-owner', $genre)){
            return redirect()->route('genres.index');
        }

        $request->validated();

        $genre->update($request->all());

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $genre = $this->genre->findOrFail($id);
        } catch(\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('genre-owner', $genre)){
            return redirect()->route('genres.index');
        }

        $genre->delete();

        return redirect()->route('genres.index');
    }
}
