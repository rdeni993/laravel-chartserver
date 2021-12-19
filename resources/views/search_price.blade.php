@extends('welcome')

@section('pageContent')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb-3">Select Price</h4>
                <price charts="{{ $charts }}" />
            </div>
        </div>
    </div>
@endsection