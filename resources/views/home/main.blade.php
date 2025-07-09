@extends('layouts.app')

@section('title', config('app.name'))

@section('content')

    @include('home.banner')

    @include('home.body')
@endsection
