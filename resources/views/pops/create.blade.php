@extends('layouts.app')
@section('content')
<h1>Add New Task</h1>
<hr>
<form action="/pops" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="title">Pops Title</label>
<input type="text" class="form-control" id="popTitle"  name="title" placeholder="your title" value={{old('title')}}>
</div>
<div class="form-group">
<label for="description">Pops Description</label>
<input type="text" class="form-control" id="popurl" name="url">
</div>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
