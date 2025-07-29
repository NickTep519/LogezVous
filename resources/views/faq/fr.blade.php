@extends('layouts.app')

@section('title', config('app.name') . ' | FAQ')

@section('content')
    @include('faq.banner')
    @include('faq.fr-body')
@endsection
