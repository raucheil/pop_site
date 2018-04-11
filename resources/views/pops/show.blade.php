@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Your PopFlu Code: {{ $pop->title }}</h1>
        <div class="jumbotron text-center">
            <p>
                <strong>Title:</strong> {{ $pop->title }}<br>
                <strong>Your site url:</strong> {{ $pop->url }}
                <strong></strong>
            </p>
            <code>
            {{ $code_popflu }}
            </code>
        </div>
        <form action="{{url('pops', [$pop->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
</div>
@endsection