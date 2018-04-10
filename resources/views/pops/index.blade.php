@extends('layouts.app')
@section('content') 
<div class="container">
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">pop Title</th>
                <th scope="col">pop url</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pops as $pop)
            <tr>
                <th scope="row">{{$pop->id}}</th>
                <td>
                    <a href="/pops/{{$pop->id}}">{{$pop->title}}</a>
                </td>
                <td>{{$pop->url}}</td>
                <td>{{$pop->created_at->toFormattedDateString()}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('pops/' . $pop->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>&nbsp;
                        <form action="{{url('pops', [$pop->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a class="btn btn-default" href="/pops/create" role="button">{{ __('New Code') }}</a>
    </div>
    
@endsection
</div>