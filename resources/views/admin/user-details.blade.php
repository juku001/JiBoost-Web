@extends('layouts.sub_main')
@section('title', 'Users')

@section('sub_title')
    {{-- <h5 class="logo-text ms-2 jb-heading">JiBoost</h5> --}}
    <h5 class="mx-4">User Details</h5>
@endsection
@php
    use App\Helpers\ApiRoutes;
@endphp
@section('content')
<div class="content">
    <div class="container my-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="me-3">
                        <img src="{{ $user['profile_pic'] ? ApiRoutes::displayUrl() . $user['profile_pic'] : asset('assets/img/logo.png') }}"
                            alt="Profile" class="rounded-circle" width="80" height="80">
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">{{ $user['name'] }}</h4>
                        <p class="mb-0 text-muted">{{ ucfirst($user['user_type']) }}</p>
                    </div>
                </div>

                <div class="row gy-3">
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Email</label>
                        <p class="mb-0">{{ $user['email'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Mobile</label>
                        <p class="mb-0">{{ $user['mobile'] }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Sex</label>
                        <p class="mb-0">{{ ucfirst($user['sex']) }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Date of Birth</label>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($user['date_of_birth'])->format('F d, Y') }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Address</label>
                        <p class="mb-0">{{ $user['address'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Region</label>
                        <p class="mb-0">{{ $user['region'] }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Country</label>
                        <p class="mb-0">{{ $user['country'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Status</label>
                        <span class="badge bg-success">{{ ucfirst($user['status']) }}</span>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">School</label>
                        <p class="mb-0">{{ $user['school_name'] }} - {{ $user['school_location'] }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Joined On</label>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($user['created_at'])->format('F d, Y') }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
