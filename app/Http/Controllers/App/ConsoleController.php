<?php

namespace App\Http\Controllers\App;

use App\Models\Console;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsoleRequest;
use App\Http\Requests\UpdateConsoleImgRequest;
use App\Http\Requests\UpdateConsoleRequest;
use App\Http\Traits\App\ConsoleTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ConsoleController extends Controller
{

    protected $console;

    use ConsoleTrait;

    public function __construct(Console $console)
    {
        $this->console = $console;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consoles = $this->console->where('user_id', auth()->user()->id)->get();

        return view('app.console.index', ['consoles' => $consoles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.console.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsoleRequest $request)
    {
        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $img = $request->img;

        $imgName = $img->store('img/console', 'public');

        $data = $this->getConsoleData($request->all(), $imgName);
        
        $this->console->create($data);

        return redirect()->route('console.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $console = $this->console->findOrFail($id);
            return redirect()->route('console.edit', $id);
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
            $console = $this->console->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('console-owner', $console)){
            return redirect()->route('console.index');
        }

        return view('app.console.edit', ['console' => $console]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsoleRequest $request, $id)
    {
        try {
            $console = $this->console->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('console-owner', $console)){
            return redirect()->route('console.index');
        }

        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        $console->update($request->all());

        return redirect()->route('console.index');
    }

    public function updateImg(UpdateConsoleImgRequest $request, $id)
    {
        try {
            $console = $this->console->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('console-owner', $console)){
            return redirect()->route('console.index');
        }

        $request->validated();

        $request->merge(['user_id' => auth()->user()->id]);

        $request->validate($this->validateId(), $this->messagesId());

        if($request->file('img')){
            Storage::disk('public')->delete($console->img);

            $img = $request->img;

            $imgName = $img->store('img/console', 'public');
        }

        $console->update(['img' => $imgName]);

        return redirect()->route('console.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $console = $this->console->findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        if(!Gate::allows('console-owner', $console)){
            return redirect()->route('console.index');
        }

        Storage::disk('public')->delete($console->img);

        $console->delete();

        return redirect()->route('console.index');

    }
}