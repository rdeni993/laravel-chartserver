@extends('welcome')

@section('pageContent')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @isset($graph_id)
                    <div class="mb-5">
                        <p class="mb-0">Copy the code below</p>
                        <code class="bg-dark d-block text-light p-2 m-0">
                            &lt;script id="d-chart" data-chart="{{$graph_id}}" data-src="{{ url('/') }}" src="{{url('/api/chart/api/script/')}}"&gt;&lt;/script&gt;
                        </code>
                    </div>
                @endisset

                <h4 class="mb-3">Created Prices</h4>

                <select class="form-select my-3 w-25 paginationSlider">
                
                    @while ($i <= ceil( $count / 50 ))
                        <option
                        @if ( $i == $page )
                            {{ 'selected' }}
                        @endif
                        value="{{ $i }}">
                            {{ 'Page ' . $i }}
                        </option>
                    {{ $i++ }}
                    @endwhile

                </select>

                <update-price prices="{{ $data }}"></update-price>

                <select class="form-select my-3 w-25 paginationSlider">
                    {{ $i = 1 }}
                    @while ($i <= ceil( $count / 50 ))
                        <option
                        @if ( $i == $page )
                            {{ 'selected' }}
                        @endif
                        value="{{ $i }}">
                            {{ 'Page ' . $i }}
                        </option>
                    {{ $i++ }}
                    @endwhile

                </select>
            </div>
        </div>
    </div>
@endsection