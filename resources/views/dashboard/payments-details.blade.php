@extends('layouts.sub_main')
@section('title', 'Payments')
@section('content')

    @php

        use App\Helpers\CustomFunctions;

        $status = $payment['status'];
        $statusClass = match ($status) {
            'success' => 'success',
            'pending' => 'secondary',
            'failed', 'danger' => 'danger',
            default => 'secondary',
        };

        $avatarClass = 'status-tag-avatar ' . $statusClass;

        $icon = match ($status) {
            'success' => 'bi-check2',
            'pending' => 'bi-dash-lg',
            'failed', 'danger' => 'bi-x-lg',
            default => 'bi-question-lg',
        };
    @endphp


    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-5">
                    <div class="avatar d-inline-flex {{ $avatarClass }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi {{ $icon }}"
                            viewBox="0 0 16 16">
                            @if ($icon === 'bi-check2')
                                <path
                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                            @elseif($icon === 'bi-dash-lg')
                                <path d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8A.5.5 0 0 1 3.5 8z" />
                            @elseif($icon === 'bi-x-lg')
                                <path
                                    d="M2.146 2.146a.5.5 0 0 1 .708 0L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854a.5.5 0 0 1 0-.708z" />
                            @else
                                <path
                                    d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zM7.25 4.75a.75.75 0 1 1 1.5 0v4.5a.75.75 0 0 1-1.5 0v-4.5zM8 12.25a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5z" />
                            @endif
                        </svg>
                    </div>
                    <div class="mt-4">
                        <h3 class="jb-heading">Tsh {{ CustomFunctions::formatAmountToCurrency($payment['amount']) }}</h3>
                        <p class="small">Charges : Tsh 1,000</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="{{ $showLeft ? 'col-12 col-lg-6' : 'col-12' }}">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between my-2">
                            <div>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                </span>
                                <span class="mx-3 small">
                                    Mobile Number
                                </span>
                            </div>
                            <div>
                                <span class="fw-bold small">+{{ $payment['msisdn'] }}</span>
                            </div>
                        </div>


                        @if ($payment['status'] == 'success')
                            <div class="col-12 d-flex justify-content-between my-2">
                                <div>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path
                                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                        </svg>
                                    </span>
                                    <span class="mx-3 small">
                                        Payment Date
                                    </span>
                                </div>
                                <div>
                                    <span
                                        class="fw-bold small">{{ CustomFunctions::formatDateTimeFromDateTime($payment['payment_date']) }}</span>
                                </div>
                            </div>
                        @endif


                        <div class="col-12 d-flex justify-content-between my-2">
                            <div>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                    </svg>
                                </span>
                                <span class="mx-3 small">
                                    Reference ID
                                </span>
                            </div>
                            <div>
                                <span class="fw-bold small">{{ $payment['reference_id'] }}</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between my-2">
                            <div>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                    </svg>
                                </span>
                                <span class="mx-3 small">
                                    Payment Method
                                </span>
                            </div>
                            <div>
                                <img src="{{ env('ENGINE_BASE_URL') }}{{ $payment['payment_method']['logo'] }}"
                                    alt="Logo" class="img-fluid" style="max-width: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
                @if ($showLeft)
                    <div class="col-12 my-5 d-block d-lg-none">
                        <hr>
                    </div>

                    <div class="col-12 col-lg-6 card py-3">


                        @if ($showLeft == 'subscription')
                            <div class="text-center w-100">
                                <span class="small text-muted">Subscription</span>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <span class="small">Subscription Type</span>
                                        </div>
                                        <div>
                                            <span class="small fw-bold">{{ $payment['subscription']['name'] }}</span>
                                        </div>

                                    </div>
                                    <div class="text-end">
                                        <div><span class="small">Number of Months</span></div>
                                        <div><span class="small fw-bold">{{ $payment['months'] }}</span></div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <!-- Left Side -->
                                    <div class="text-start">
                                        <div>
                                            <span class="small">Start Date</span>
                                        </div>
                                        <div>
                                            <span
                                                class="small fw-bold">{{ CustomFunctions::formatDateTimeFromDateTime($payment['subscription']['start_date']) }}</span>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="text-end">
                                        <div><span class="small">End Date</span></div>
                                        <div>
                                            <span
                                                class="small fw-bold">{{ CustomFunctions::formatDateTimeFromDateTime($payment['subscription']['end_date']) }}</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @else
                            <div class="text-center w-100">
                                <span class="small text-muted">Pay Per Exam</span>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <span class="small">Number of Exams</span>
                                        </div>
                                        <div>
                                            <span class="small fw-bold">{{ $payment['exam_history']['exam_count'] }}</span>
                                        </div>

                                    </div>
                                    <div class="text-end">
                                        <div><span class="small">New Balance</span></div>
                                        <div>
                                            <span class="small fw-bold">{{ $payment['exam_history']['balance'] }}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif


                    </div>
                @endif


            </div>

        </div>
    </div>


@endsection
