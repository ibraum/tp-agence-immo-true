<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveOptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.options.index", ['options' => Option::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.options.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveOptionRequest $request)
    {
        Option::create($request->all());
        return redirect()->route("admin.options.index")->with("success","Une nouvelle option d'immeuble a été ajouté avec success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        return View('admin.options.show', ['option' => $option]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return View('admin.options.edit', ['option' => $option]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveOptionRequest $request, Option $option)
    {
        $option = Option::find($option->id);
        $option->update($request->validated());
        return redirect()->route('admin.options.index')->with('success', 'L\'option a été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.options.index')->with('success', 'L\'option a été supprimé avec succès');
    }
}
