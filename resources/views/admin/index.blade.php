@extends('layouts.main')
@section('title', 'Admin Dash')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Admin Dashboard</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex d-sm-block justify-content-between">
                                    <div class="border-bottom-sm border-translucent mb-sm-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center icon-wrapper-sm shadow-info-100"
                                                style="transform: rotate(-7.45deg);"><span
                                                    class="fa-solid fa-calendar text-info fs-7 z-1 ms-2"></span></div>
                                            <p class="text-body-tertiary fs-9 mb-0 ms-2 mt-3">This Month</p>
                                        </div>
                                        <p class="text-primary mt-2 fs-6 fw-bold mb-0 mb-sm-4">3 <span
                                                class="fs-8 text-body lh-lg">Students</span></p>
                                    </div>
                                    <div
                                        class="d-flex flex-column justify-content-center flex-between-end d-sm-block text-end text-sm-start">
                                        <span class="badge badge-phoenix badge-phoenix-success fs-10 mb-2">+24.5%</span>
                                        <p class="mb-0 fs-9 text-body-tertiary">Than Last Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex d-sm-block justify-content-between">
                                    <div class="border-bottom-sm border-translucent mb-sm-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center icon-wrapper-sm shadow-info-100"
                                                style="transform: rotate(-7.45deg);"><span
                                                    class="fa-solid fa-calendar text-info fs-7 z-1 ms-2"></span></div>
                                            <p class="text-body-tertiary fs-9 mb-0 ms-2 mt-3">This Week</p>
                                        </div>
                                        <p class="text-info mt-2 fs-6 fw-bold mb-0 mb-sm-4">12 <span
                                                class="fs-8 text-body lh-lg">Students</span></p>
                                    </div>
                                    <div
                                        class="d-flex flex-column justify-content-center flex-between-end d-sm-block text-end text-sm-start">
                                        <span class="badge badge-phoenix badge-phoenix-danger fs-10 mb-2">+24.5%</span>
                                        <p class="mb-0 fs-9 text-body-tertiary">Than last week</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-6 col-xxl-4 gy-5 gy-md-3">
                        <div class="border-bottom border-translucent">
                            <h5 class="pb-4 border-bottom border-translucent">Top 5 Quartery Best Students</h5>
                            <ul class="list-group list-group-flush">
                                @for ($i = 0; $i < 5; $i++)
                                    <li class="list-group-item bg-transparent list-group-crm fw-bold text-body fs-9 py-2">
                                        <div class="d-flex justify-content-between"><span class="fw-normal fs-9 mx-1"> <span
                                                    class="fw-bold">{{ $i + 1 }}.</span>
                                                Partner</span><span>(23)</span></div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <p class="text-body-tertiary mb-md-7">Quartery Earning</p>
                                <h3 class="text-body-emphasis text-nowrap">Tsh 12,000</h3>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fw-bold">Transaction Type </p>
                                    <p class="mb-0 fs-9">Total count <span class="fw-bold">257</span></p>
                                </div>
                                <hr class="bg-body-secondary mb-2 mt-2" />
                          
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-warning-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">Pending</p>
                                    <h5 class="mb-0 text-body">63</h5>
                                </div>
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-danger-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">Failed</p>
                                    <h5 class="mb-0 text-body">56</h5>
                                </div>
                                <div class="d-flex align-items-center mb-1"><span
                                        class="d-inline-block bg-success-light bullet-item me-2"></span>
                                    <p class="mb-0 fw-semibold text-body lh-sm flex-1">Success</p>
                                    <h5 class="mb-0 text-body">36</h5>
                                </div>
 
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="position-relative mb-sm-4 mb-xl-0">
                                    <div class="echart-issue-chart" style="min-height:390px;width:100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/js/admin-dashboard.js') }}"></script>
@endpush
