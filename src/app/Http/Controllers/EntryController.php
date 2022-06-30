<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::orderBy('created_at', 'desc')->with('feed')->get();
        //dd($entries);
        return view('entry.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //* Validating form data
        $this->validate($request, [
            'name' => 'required|max:100',
            '' => '',
            'description' => 'required',
        ]);

        $product = Entry::create($request->all());
        return redirect()
            ->route('entry.index')
            ->with('message', 'New entry created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        return view('entry.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        /*
         * Validating form data
         */
        $this->validate($request, [
            'title' => 'required|max:255',
            'link' => 'required',
            'description' => 'required',
        ]);
        /*
         * Entry updating
         */
        $entry->update($request->all());

        /*
         * Return to common entity list
         */
        return redirect()
            ->route('entry.index')
            ->with('message', 'Entry updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()
            ->route('entry.index')
            ->with('message', 'Entry deleted');
    }
}
