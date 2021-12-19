@extends('welcome')

@section('pageContent')
    <div class="container">
        <h4>Control Users</h4>

        <user users="{{ $users }}" />
    </div>
@endsection