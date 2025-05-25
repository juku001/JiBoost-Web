@extends('layouts.main')
@section('title', 'Users')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Users</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>
                <div class="row align-items-center g-4">
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center"><span class="fa-stack"
                                style="min-height: 46px;min-width: 46px;"><span
                                    class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                    data-fa-transform="down-4 rotate--10 left-4"></span><span
                                    class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                    data-fa-transform="up-4 right-3 grow-2"></span><span
                                    class="fa-stack-1x fa-solid fa-user-graduate text-success "
                                    data-fa-transform="shrink-2 up-8 right-6"></span></span>
                            <div class="ms-3">
                                <h4 class="mb-0">{{ $dataCount['student'] }} Students</h4>
                                {{-- <p class="text-body-secondary fs-9 mb-0">Awating processing</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center"><span class="fa-stack"
                                style="min-height: 46px;min-width: 46px;"><span
                                    class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                                    data-fa-transform="down-4 rotate--10 left-4"></span><span
                                    class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                    data-fa-transform="up-4 right-3 grow-2"></span><span
                                    class="fa-stack-1x fa-solid fa-user-friends text-warning "
                                    data-fa-transform="shrink-2 up-8 right-6"></span></span>
                            <div class="ms-3">
                                <h4 class="mb-0">{{ $dataCount['parents'] }} Parents</h4>
                                {{-- <p class="text-body-secondary fs-9 mb-0">On hold</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center"><span class="fa-stack"
                                style="min-height: 46px;min-width: 46px;"><span
                                    class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                    data-fa-transform="down-4 rotate--10 left-4"></span><span
                                    class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                                    data-fa-transform="up-4 right-3 grow-2"></span><span
                                    class="fa-stack-1x fa-solid fa-chalkboard-teacher text-danger "
                                    data-fa-transform="shrink-2 up-8 right-6"></span></span>
                            <div class="ms-3">
                                <h4 class="mb-0">{{ $dataCount['teachers'] }} Teachers</h4>
                                {{-- <p class="text-body-secondary fs-9 mb-0">Out of stock</p> --}}
                            </div>
                        </div>
                    </div>
                </div>



                <div class="content">
                    <div class="mb-5">
                        <div class="table-responsive  px-3">
                            <table class="table align-middle table-hover table-borderless mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Student</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ !empty($user['profile_pic']) ? $apiRoutes->displayUrl() . $user['profile_pic'] : asset('assets/img/logo.png') }}"
                                                        alt="Avatar" class="rounded-circle me-3" width="45"
                                                        height="45">
                                                    <div>
                                                        <a
                                                        class="text-decoration-none"
                                                            href="{{ route('dashboard.admin.users.show', ['id' => $user['id']]) }}">
                                                            <div class="fw-semibold text-dark">{{ $user['name'] }}</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted">{{ $user['email'] }}</td>
                                            <td class="text-muted">{{ $user['mobile'] }}</td>
                                            <td>
                                                <span>{{ ucfirst($user['user_type']) }}</span>
                                            </td>
                                            <td class="text-muted">
                                                {{ \Carbon\Carbon::parse($user['created_at'])->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
