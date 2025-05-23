@extends('layouts.main')
@section('title', 'Payments')
@section('sidebar')
    @include('customs.sidebar')
@endsection
@section('content')

    <div class="content">
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">{{ __('navigation.payments') }}</h2>
                </div>
            </div>
            {{-- <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-auto">
                            <div class="search-box">
                                <form class="position-relative"><input class="form-control search-input search"
                                        type="search" placeholder="Search orders" aria-label="Search" />
                                    <span class="fas fa-search search-box-icon"></span>
                                </form>
                            </div>
                        </div>

                        <div class="col-auto"><button class="btn btn-link text-body me-4 px-0"><span
                                    class="fa-solid fa-file-export fs-9 me-2"></span>Export</button></div>
                    </div>
                </div> --}}

            @php
                use App\Helpers\CustomFunctions;

            @endphp


            @if (empty($payments))

            <div class="fluid-container">
                <div class="row">
                    <div class="col-12 text-center my-9">
                        {{ __('payments.subtitle') }}
                    </div>
                </div>
            </div>
            @else
                <div class="fluid-container">
                    <div class="row">
                        @foreach ($payments as $payment)
                            @php
                                $title = 'title';
                                if ($payment['subscription'] != null) {
                                    $title = $payment['subscription']['name'];
                                } else {
                                    $title = $payment['exam_history']['exam_count'] . ' PayPerExam';
                                }
                            @endphp
                            <a href="{{ route('dashboard.payments.show', ['id' => $payment['id']]) }}"
                                style="text-decoration: none">
                                <div class="fluid-container my-2">
                                    <div class="card p-3 shadow-sm">
                                        <div class="d-flex flex-row justify-content-between align-items-start gap-2">
                                            <!-- Left content -->
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-semibold">{{ $title }}</h6>
                                                <p class="mb-0 small">
                                                    {{ CustomFunctions::formatDateTimeFromDateTime($payment['updated_at']) }}
                                                </p>

                                                <p class="mb-0 small  text-muted">+{{ $payment['msisdn'] }}</p>
                                                <img src="{{ env('ENGINE_BASE_URL') }}{{ $payment['payment_method']['logo'] }}"
                                                    alt="Logo" class="img-fluid" style="max-width: 50px;">
                                            </div>

                                            <!-- Right content -->
                                            <div class="d-flex flex-column align-items-end">
                                                <h5 class="fw-bold mb-0">Tsh
                                                    {{ CustomFunctions::formatAmountToCurrency($payment['amount'] + $payment['charge_fee']) }}
                                                </h5>
                                                <div class="h-100 text-as-bg">.</div>
                                                <div class="h-100 text-as-bg">.</div>
                                                <div class="mt-auto">

                                                    @if ($payment['status'] == 'success')
                                                        <span class="badge status-tag-success rounded-pill">Success</span>
                                                    @else
                                                        @if ($payment['status'] == 'pending')
                                                            <span
                                                                class="badge status-tag-pending rounded-pill">Pending</span>
                                                        @else
                                                            <span class="badge status-tag-danger rounded-pill">Failed</span>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            @endif

        </div>
    </div>

@endsection
