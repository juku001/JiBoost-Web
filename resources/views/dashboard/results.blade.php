@extends('layouts.main')
@section('title', 'Results')
@section('sidebar')
    @include('customs.sidebar')
@endsection
@section('content')

    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Results</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>

            </div>
        </div>
        <div class="row gy-3 mb-4">

            @foreach ($results as $result)
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-body  bg-danger-subtle ">
                            <div class="result-item-danger">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="text-danger-emphasis">Organic Chemistry 1</h5>
                                        <p class="small fw-bold">Chemistry | Form Four</p>
                                        <p></p>
                                        <p></p>
                                        <p><span class="small">22th May 2025</span></p>
                                    </div>
                                    <div>
                                        <span class="fw-bold" style="font-style: italic">5 Qns</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
