@extends('layouts.app')
@section('content')
<div class="container">
<h1>Add New Code</h1>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <slider-component
                v-for="slide in slides"
                v-bind:slide-id='slide.id'
                v-bind:slide-title="slide.title"
                v-bind:slide-img='slide.img'
                v-bind:slide-text='slide.text'
                >
                </slider-component>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                 <pop-form></pop-form>
                </div>
            </div>       
        </div>
</div>
@endsection