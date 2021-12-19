@extends('welcome')

@section('pageContent')
    <new-price charts="{{ $charts }}" />
@endsection