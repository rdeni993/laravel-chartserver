@extends('welcome')

@section('pageContent')
    <chart charts="{{ $graphs }}" />
@endsection