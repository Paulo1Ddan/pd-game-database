<?php

namespace App\Http\Controllers\App;

use App\Models\Type;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Traits\App\TypesTrait;
use Illuminate\Support\Facades\Gate;

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

        return redirect()->route('types.index');
    }

    public function show($id)
    {
        try {
            $type = $this->type->findOrFail($id);

            return redirect()->route('type.edit', $id);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function edit($id)
    {
        try {
            $type = $this->type->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if (!Gate::allows('type-owner', $type)) {
            return redirect()->route('types.index');
        }

        $genres = Genre::where('user_id', auth()->user()->id)->get();

        return view('app.types.edit', ['genres' => $genres, 'type' => $type]);
    }

    public function update(UpdateTypeRequest $request, $id)
    {
        try {
            $type = $this->type->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if (!Gate::allows('type-owner', $type)) {
            return redirect()->route('types.index');
        }

        $request->validated();

        $type->update($request->all());

        return redirect()->route('types.index');
    }

    public function destroy($id)
    {
        try {
            $type = $this->type->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if (!Gate::allows('type-owner', $type)) {
            return redirect()->route('types.index');
        }

        $type->delete();

        return redirect()->route('types.index');
    }
}
