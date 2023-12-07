<?php

namespace App\Http\Controllers\App;

use App\Models\Type;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Traits\App\TypesTrait;

class TypeController extends Controller
{

    use TypesTrait;

    protected $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function index()
    {
        $types = $this->type->all();

        return view('app.types.index', ['types' => $types]);
    }

    public function create()
    {
        $genres = Genre::where('user_id', auth()->user()->id)->get();
        return view('app.types.create', ['genres' => $genres]);
    }

    public function store(StoreTypeRequest $request)
    {
        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $this->type->create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
