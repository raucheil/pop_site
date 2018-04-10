@extends('layout.app')
@section('content')
<h1>Edit pop</h1>
<hr>
<form action="{{url('pops', [$pop->id])}}" method="POST">
<input type="hidden" name="_method" value="PUT">
{{ csrf_field() }}
<div class="form-group">
<label for="title">pop Title</label>
<input type="text" value="{{$pop->title}}" class="form-control" id="popTitle"  name="title" >
</div>
<div class="form-group">
<label for="description">pop Description</label>
<input type="text" value="{{$pop->description}}" class="form-control" id="popDescription" name="description" >
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
