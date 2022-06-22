<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Entry;
use Validator;

class EntryApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::all();

        return $this->sendResponse($entries->toArray(), 'Entries retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $entry = Entry::create($input);

        return $this->sendResponse($entry->toArray(), 'Entry created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Entry::find($id);

        if (is_null($entry)) {
            return $this->sendError('Entry not found.');
        }

        return $this->sendResponse($entry->toArray(), 'Entry retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);

        if (is_null($entry)) {
            return $this->sendError('Entry not found.');
        }

        return $this->sendResponse($entry->toArray(), 'Entry retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        $input = $request->all();
        //echo $input['title'];
        $validator = Validator::make($input, [
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $entry->title = $input['title'];
        $entry->link = $input['link'];
        $entry->description = $input['description'];
        $entry->save();

        return $this->sendResponse($entry->toArray(), 'Entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();

        return $this->sendResponse($entry->toArray(), 'Entry deleted successfully.');
    }
}
