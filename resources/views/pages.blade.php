@extends('layouts.app')
@section('title', (isset($title) && $title != "" ? $title : "Title"))
@section('content')
    {{--<link href='{{ url(mix('css/landing.css')) }}' rel="stylesheet" />--}}
    
    <div id="vue-app">
        <template-ac-league title="{{$title}}"></template-ac-league>
    </div>

    
    {!! Html::script(mix('js/vueApp.js')) !!}
    
@stop
@section('scripts')
    {{--<script type="text/javascript" src="{{ url(mix('js/landing.js')) }}"></script>--}}
@stop
