<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPropertyRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SaveImageRequest;
use App\Http\Requests\SearchRequest;
use App\Mail\PropertyContactMail;
use App\Mail\SendMail;
use App\Models\Image;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request): View
    {
        $query = Property::query()->latest();
        if($request->validated('title')){
            $query = $query->where('title','like','%'.$request->validated('title') .'%');
        }

        if($request->validated('rooms')){
            $query = $query->where('rooms','>=', $request->validated('rooms'));
        }

        if($request->validated('surface')){
            $query = $query->where('surface','>=', $request->validated('surface'));
        }

        if($request->validated('price')){
            $query = $query->where('price','<=', $request->validated('price'));
        }

        return view('admin.properties.index', [
            'properties' => $query->with('images')->orderBy('created_at', 'desc')->get(),
            'input' => $request->validated()
        ]);
    }

    public function index2(SearchRequest $request): View
    {
        $query = Property::query();
        if($request->validated('title')){
            $query = $query->where('title','like','%'.$request->validated('title') .'%');
        }

        if($request->validated('rooms')){
            $query = $query->where('rooms','>=', $request->validated('rooms'));
        }

        if($request->validated('surface')){
            $query = $query->where('surface','>=', $request->validated('surface'));
        }

        if($request->validated('price')){
            $query = $query->where('price','<=', $request->validated('price'));
        }

        return view('admin.properties.index2', [
            'properties' => $query->orderBy('created_at', 'desc')->get(),
            'input' => $request->validated()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create', ['options' => Option::orderBy('name', 'asc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPropertyRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->input('options'));

        if (!empty($request->file('imageName'))){
            $imageRequest = new SaveImageRequest();
            $images = $request->file('imageName');

           foreach ($images as $image){

               $path = $image->store('properties', 'public');
                $imageName = Image::create([
                    'imageName' => $path,
               ]);

                $imageName->property()->associate($property->id);
               $imageName->save();
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Proprieté crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, int $id)
    {
        $prop = Property::all()->find($id);
        return view('admin.properties.show', ['property' => $prop->with('options', 'images')->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id) : view
    {
        $property = Property::all()->find($id);
        return view('admin.properties.edit', ['property' => $property->with('options')->find($property->id), 'allOptions' => Option::all()->pluck('name', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPropertyRequest $request, Property $property): \Illuminate\Http\RedirectResponse
    {
        $property->update($request->validated());
        $property->options()->sync($request->input('options'));
        return redirect()->route('admin.properties.index')->with('success', 'Mise à jour de la proprité éffectué avec succès ...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $prop = $property->with('images')->get();
        $imagesCollection = $prop->select('images');
        $images = $imagesCollection[0]['images'];
        if(!empty($images)) {
            foreach ($images as $image) {
                Storage::disk('public')->delete($image->imageName);
            }
        }
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Suppression de la proprité éffectué avec succès ...');
    }

    public function welcome() : view
    {
        return view('welcome', ['properties' => Property::latest()->limit(4)->get()]);
    }

    public function addImageToProperty() : view
    {
        return view('welcome2', ['properties' => Property::latest()->limit(4)->get()]);
    }

    public function contact(PropertyContactRequest $request)
    {

        if ($property = Property::all()->find($request->input('property'))) {
            Mail::send(new PropertyContactMail($property, $request->validated()));
            return back()->with('success', 'Votre demande de contact a bien été envoyé');
        }else{
            Mail::send(new SendMail($request->validated()));
            return back()->with('success', 'Votre demande de contact a bien été envoyé');
        }

    }
}
