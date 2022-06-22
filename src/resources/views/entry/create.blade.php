@extends('layout.main')
@section('content')

        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit entry
        </h3>
  
        <form method="post" action="{{ route('entry.store') }}">
            @csrf
            <input type="hidden" name="feed_id" value="1">
            <div class="form-group m-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title"
                    required maxlength="100" >
            </div>

            <div class="form-group m-3">
                <label for="title">Link</label>
                <input type="text" class="form-control" name="link" placeholder="Link"
                    required maxlength="100" >
            </div>

            <div class="form-group m-3">
                <input type="hidden" class="form-control" name="description" placeholder="description"
                    required maxlength="100">
                    <textarea name="description" id="myEditor"></textarea>
                
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success inline-flex items-center px-4 mt-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Save</button>
            </div>
        </form>
   
@stop



