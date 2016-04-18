@extends('mconsole::app')

@section('content')

@include('mconsole::partials.table', [
    'add' => '/mconsole/sliders/create',
])

@endsection