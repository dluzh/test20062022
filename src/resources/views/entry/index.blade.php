@extends('layout.main')
@section('content')

<a href="entry/create" style="position: fixed; bottom: 2em; right: 2em;"><button type="button" class="btn btn-success" title="Create new entry">+</button></a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Title</th>
      <th scope="col">RSS feed source</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($entries as $entry)
        <tr>
        <td class="align-middle">{{ $entry->id }}</td>
        <td class="align-middle"><a href="entry/{{ $entry->id }}/delete" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
        <td class="align-middle"><a href="entry/{{ $entry->id }}/edit"><button type="button" class="btn btn-primary">Edit</button></a></td>
        <td class="align-middle"><a href="{{ $entry->link }}">{{ $entry->title }}</a></td>
        <td class="align-middle">{{ $entry->feed->name }}</td>
        <td class="align-middle">{{ $entry->created_at }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
@stop

