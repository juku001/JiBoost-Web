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
            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h6>First Series</h6>
                        <p>24th March 2025</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h6>First Series</h6>
                        <p>24th March 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
