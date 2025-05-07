@extends('layouts.main')
@section('title', 'Quotes')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Quotes</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>

                <form action="{{ route('admin.quote.add') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" placeholder="Enter quote here" name="quote" required>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                            <input type="text" class="form-control" placeholder="Author name" name="author" required>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="new_user">New User</option>
                                <option value="low_activity">Low Activity</option>
                                <option value="struggling">Struggling</option>
                                <option value="moderate_progress">Moderate Progress</option>
                                <option value="good_progress">Good Progress</option>
                                <option value="high_achiever">HIgh Achiever</option>
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <button class="btn btn-subtle-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <div class="content">
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
                                                    style="width:70%;">QUOTE</th>
                                                <th class="sort align-middle pe-5" scope="col" data-sort="email"
                                                    style="width:20%;">AUTHOR</th>
                                                <th class="sort align-middle text-end" scope="col"
                                                    data-sort="total-orders" style="width:10%">CATEGORY</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quotes as $index => $quote)
                                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">


                                                    <td>{{ $index + 1 }}</td>
                                                    <td
                                                        class="total-orders align-middle white-space-nowrap fw-semibold text-start text-body-highlight">
                                                        {{ $quote['quote'] }}</td>
                                                    <td
                                                        class="total-spent align-middle white-space-nowrap fw-bold text-start ps-3 text-body-emphasis">
                                                        {{ $quote['author'] }}</td>
                                                    <td
                                                        class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                        {{ $quote['category'] }}</td>
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
                                    <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                                                class="fas fa-chevron-left"></span></button>
                                        <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                            data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
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
