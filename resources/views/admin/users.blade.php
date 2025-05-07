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
                                <p class="text-body-secondary fs-9 mb-0">Awating processing</p>
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
                                <p class="text-body-secondary fs-9 mb-0">On hold</p>
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
                                <p class="text-body-secondary fs-9 mb-0">Out of stock</p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="content">
                    <nav class="mb-3" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
                            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
                            <li class="breadcrumb-item active">Default</li>
                        </ol>
                    </nav>
                    <div class="mb-9">

                        <div id="products"
                            data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>

                            <div
                                class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
                                <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                                    <table class="table table-sm fs-9 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="white-space-nowrap fs-9 align-middle ps-0">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            id="checkbox-bulk-customers-select" type="checkbox"
                                                            data-bulk-select='{"body":"customers-table-body"}' /></div>
                                                </th>
                                                <th class="sort align-middle pe-5" scope="col" data-sort="customer"
                                                    style="width:10%;">CUSTOMER</th>
                                                <th class="sort align-middle pe-5" scope="col" data-sort="email"
                                                    style="width:20%;">EMAIL</th>
                                                <th class="sort align-middle text-end" scope="col"
                                                    data-sort="total-orders" style="width:10%">TYPE</th>
                                                <th class="sort align-middle text-end ps-3" scope="col"
                                                    data-sort="total-spent" style="width:10%">MOBILE</th>
                                                <th class="sort align-middle ps-7" scope="col" data-sort="city"
                                                    style="width:25%;">REGION</th>
                                                <th class="sort align-middle text-end" scope="col" data-sort="last-seen"
                                                    style="width:15%;">ADDRESS</th>
                                                <th class="sort align-middle text-end pe-0" scope="col"
                                                    data-sort="last-order" style="width:10%;min-width: 150px;">JOINED ON
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="customers-table-body">
                                            @foreach ($users as $user)
                                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                    <td class="fs-9 align-middle ps-0 py-3">
                                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                                type="checkbox"
                                                                data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' />
                                                        </div>
                                                    </td>
                                                    <td class="customer align-middle white-space-nowrap pe-5"><a
                                                            class="d-flex align-items-center text-body-emphasis"
                                                            href="customer-details.html">
                                                            <div class="avatar avatar-m">
                                                                <img class="rounded-circle"
                                                                    src="{{ !empty($user['profile_pic']) ? $apiRoutes->baseUrl() . $user['profile_pic'] : asset('assets/img/logo.png') }}"
                                                                    alt="" />
                                                            </div>
                                                            <p class="mb-0 ms-3 text-body-emphasis fw-bold">
                                                                {{ $user['name'] }}</p>
                                                        </a></td>
                                                    <td class="email align-middle white-space-nowrap pe-5"><a
                                                            class="fw-semibold"
                                                            href="mailto:annac34@gmail.com">{{ $user['email'] }}</a></td>
                                                    <td
                                                        class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                        {{ $user['user_type'] }}</td>
                                                    <td
                                                        class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                        {{ $user['mobile'] }}</td>
                                                    <td
                                                        class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                        {{ $user['region'] }}</td>
                                                    <td
                                                        class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                        {{ $user['address'] }}</td>
                                                    <td
                                                        class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                        {{ \Carbon\Carbon::parse($user['created_at'])->format('Y-m-d') }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                                    <div class="col-auto d-flex">
                                        <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body"
                                            data-list-info="data-list-info"></p><a class="fw-semibold" href="#!"
                                            data-list-view="*">View all<span class="fas fa-angle-right ms-1"
                                                data-fa-transform="down-1"></span></a><a class="fw-semibold d-none"
                                            href="#!" data-list-view="less">View Less<span
                                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                                    </div>
                                    <div class="col-auto d-flex"><button class="page-link"
                                            data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                                        <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                            data-list-pagination="next"><span
                                                class="fas fa-chevron-right"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
