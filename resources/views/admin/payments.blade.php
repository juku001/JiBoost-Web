@extends('layouts.main')
@section('title', 'Payments')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@php
    use App\Helpers\ApiRoutes;
@endphp
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Payments</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>

                <div class="table-responsive">
                    <table class="table border-0">
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr class="border-0">
                                    <td colspan="5" class="p-0">
                                        <div class="card shadow-sm border-0 mb-4">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                    <div>
                                                        <h6 class="fw-semibold mb-1">
                                                            {{ \Carbon\Carbon::parse($payment['created_at'])->format('M d, Y') }}
                                                        </h6>
                                                        <small class="text-muted">Ref:
                                                            {{ $payment['reference_id'] }}</small>
                                                    </div>
                                                    <div class="text-end">
                                                        <div class="fw-bold fs-5">
                                                            {{ number_format($payment['amount'], 2) }} TZS
                                                        </div>
                                                        <span
                                                            class="badge bg-{{ $payment['status'] == 'success' ? 'success' : ($payment['status'] == 'pending' ? 'secondary' : 'danger') }}">
                                                            {{ ucfirst($payment['status']) }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="row">
                                                    {{-- User Info --}}
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted">User</h6>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ ApiRoutes::displayUrl() . $payment['user']['profile_pic'] }}"
                                                                alt="Profile Pic" width="40" height="40"
                                                                class="rounded-circle me-2" {{-- onerror="this.src='{{ asset('images/default_user.png') }}'" --}}>
                                                            <div>
                                                                <div class="fw-semibold">{{ $payment['user']['name'] }}
                                                                </div>
                                                                <small>{{ $payment['user']['email'] }}</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Payment Method --}}
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted">Payment Method</h6>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ ApiRoutes::baseUrl().$payment['payment_method']['logo'] }}"
                                                                alt="{{ $payment['payment_method']['name'] }}"
                                                                width="40" height="40" class="me-2 img-fluid">
                                                            <div>
                                                                <div class="fw-semibold">
                                                                    {{ $payment['payment_method']['name'] }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Related Info --}}
                                                @if ($payment['related_type'] === env('KEY_SUBSCRIPTION_MONTH'))
                                                    <hr>
                                                    <h6 class="text-muted mt-3">Subscription Details</h6>
                                                    <div>
                                                        <strong>{{ $payment['subscription']['name'] }}</strong><br>
                                                        <small>{{ $payment['subscription']['description'] }}</small><br>
                                                        <small>Price:
                                                            {{ number_format($payment['subscription']['price'], 2) }}
                                                            TZS</small>
                                                    </div>
                                                @elseif ($payment['related_type'] === env('KEY_SUBSCRIPTION_PER_EXAM'))
                                                    <hr>
                                                    <h6 class="text-muted mt-3">Per-Exam Payment</h6>
                                                    <div>
                                                        <small>Exam Count:
                                                            {{ $payment['exam_history']['exam_count'] }}</small><br>
                                                        <small>Amount:
                                                            {{ number_format($payment['exam_history']['amount'], 2) }}
                                                            TZS</small>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
