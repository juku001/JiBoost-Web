@extends('layouts.main')
@section('title', 'Payments')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Payments</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>
            

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
                                                    style="width:10%;">CUSTOMER</th>
                                                <th class="sort align-middle pe-5" scope="col" data-sort="email"
                                                    style="width:20%;">EMAIL</th>
                                                <th class="sort align-middle text-end" scope="col"
                                                    data-sort="total-orders" style="width:10%">ORDERS</th>
                                                <th class="sort align-middle text-end ps-3" scope="col"
                                                    data-sort="total-spent" style="width:10%">TOTAL SPENT</th>
                                                <th class="sort align-middle ps-7" scope="col" data-sort="city"
                                                    style="width:25%;">CITY</th>
                                                <th class="sort align-middle text-end" scope="col"
                                                    data-sort="last-seen" style="width:15%;">LAST SEEN</th>
                                                <th class="sort align-middle text-end pe-0" scope="col"
                                                    data-sort="last-order" style="width:10%;min-width: 150px;">LAST ORDER
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="customers-table-body">
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
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/32.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Carry Anna</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:annac34@gmail.com">annac34@gmail.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    89</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 23987</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Budapest</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    34 min ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Dec 12, 12:56 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/avatar.webp","name":"Milind Mikuja","placeholder":true},"email":"mimiku@yahoo.com","city":"Manchester","totalOrders":76,"totalSpent":21567,"lastSeen":"6 hours ago","lastOrder":"Dec 9, 2:28 PM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img
                                                                class="rounded-circle avatar-placeholder"
                                                                src="../../../assets/img/team/avatar.webp"
                                                                alt="" /></div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Milind Mikuja</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:mimiku@yahoo.com">mimiku@yahoo.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    76</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 21567</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Manchester</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    6 hours ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Dec 9, 2:28 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/35.webp","name":"Stanly Drinkwater"},"email":"stnlwasser@hotmail.com","city":"Smallville","totalOrders":69,"totalSpent":19872,"lastSeen":"43 min ago","lastOrder":"Dec 4, 12:56 PM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/35.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Stanly Drinkwater
                                                        </p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:stnlwasser@hotmail.com">stnlwasser@hotmail.com</a>
                                                </td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    69</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 19872</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Smallville</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    43 min ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Dec 4, 12:56 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/57.webp","name":"Josef Stravinsky"},"email":"Josefsky@sni.it","city":"Metropolis","totalOrders":67,"totalSpent":17996,"lastSeen":"2 hours ago","lastOrder":"Dec 1,  4:07 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/57.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Josef Stravinsky
                                                        </p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:Josefsky@sni.it">Josefsky@sni.it</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    67</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 17996</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Metropolis</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    2 hours ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Dec 1, 4:07 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/58.webp","name":"Igor Borvibson"},"email":"vibigorr@technext.it","city":"Central city","totalOrders":61,"totalSpent":16785,"lastSeen":"5 days ago","lastOrder":"Nov 28, 7:28 PM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/58.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Igor Borvibson</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:vibigorr@technext.it">vibigorr@technext.it</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    61</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 16785</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Central city</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    5 days ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Nov 28, 7:28 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/59.webp","name":"Katerina Karenin"},"email":"karkat99@gmail.com","city":"Gotham","totalOrders":58,"totalSpent":14956,"lastSeen":"2 weeks ago","lastOrder":"Nov 24, 10:16 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/59.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Katerina Karenin
                                                        </p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:karkat99@gmail.com">karkat99@gmail.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    58</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 14956</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Gotham</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    2 weeks ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Nov 24, 10:16 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"","name":"Roy Anderson"},"email":"andersonroy@netflix.chill","city":"Vancouver","totalOrders":52,"totalSpent":12509,"lastSeen":"4 days ago","lastOrder":"Nov 18, 5:43 PM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m">
                                                            <div class="avatar-name rounded-circle"><span>R</span></div>
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Roy Anderson</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:andersonroy@netflix.chill">andersonroy@netflix.chill</a>
                                                </td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    52</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 12509</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Vancouver</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    4 days ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Nov 18, 5:43 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/31.webp","name":"Martina scorcese"},"email":"cesetina1@gmail.com","city":"Viena","totalOrders":49,"totalSpent":11003,"lastSeen":"6 min ago","lastOrder":"Nov 18, 2:09 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/31.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Martina scorcese
                                                        </p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:cesetina1@gmail.com">cesetina1@gmail.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    49</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 11003</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Viena</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    6 min ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Nov 18, 2:09 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/33.webp","name":"Luis Bunuel"},"email":"luisuel@live.com","city":"Bangalore","totalOrders":44,"totalSpent":7897,"lastSeen":"56 min ago","lastOrder":"Nov 16, 3:22 PM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/33.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Luis Bunuel</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:luisuel@live.com">luisuel@live.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    44</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 7897</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Bangalore</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    56 min ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Nov 16, 3:22 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/34.webp","name":"Jean Renoir"},"email":"renoirjean1836@gmail.com","city":"Chittagong","totalOrders":37,"totalSpent":7781,"lastSeen":"Yesterday","lastOrder":"Nov 09, 8:49 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/34.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Jean Renoir</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:renoirjean1836@gmail.com">renoirjean1836@gmail.com</a>
                                                </td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    37</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 7781</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Chittagong</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Yesterday</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Nov 09, 8:49 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/29.webp","name":"Ricky Antony"},"email":"ricky@example.com","city":"New Jersey","totalOrders":33,"totalSpent":7825,"lastSeen":"1 hour ago","lastOrder":"Oct 19, 8:00 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/29.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Ricky Antony</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:ricky@example.com">ricky@example.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    33</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 7825</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    New Jersey</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    1 hour ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Oct 19, 8:00 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/3.webp","name":"Emma Watson"},"email":"emma@example.com","city":"New York","totalOrders":45,"totalSpent":18975,"lastSeen":"6 hours ago","lastOrder":"Oct 15, 12:00 PM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/3.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Emma Watson</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:emma@example.com">emma@example.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    45</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 18975</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    New York</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    6 hours ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Oct 15, 12:00 PM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/avatar.webp","name":"Jennifer Schramm","placeholder":true},"email":"jennifer@example.com","city":"Charlotte","totalOrders":39,"totalSpent":8967,"lastSeen":"12 hours ago","lastOrder":"Oct 12, 11:00 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img
                                                                class="rounded-circle avatar-placeholder"
                                                                src="../../../assets/img/team/avatar.webp"
                                                                alt="" /></div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Jennifer Schramm
                                                        </p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:jennifer@example.com">jennifer@example.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    39</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 8967</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Charlotte</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    12 hours ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Oct 12, 11:00 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Raymond Mims"},"email":"raymond@example.com","city":"Artesia","totalOrders":30,"totalSpent":14587,"lastSeen":"2 day ago","lastOrder":"Oct 10, 8:30 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/32.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Raymond Mims</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:raymond@example.com">raymond@example.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    30</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 14587</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Artesia</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    2 day ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Oct 10, 8:30 AM</td>
                                            </tr>
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="fs-9 align-middle ps-0 py-3">
                                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                            type="checkbox"
                                                            data-bulk-select-row='{"customer":{"avatar":"/team/25.webp","name":"Michael Jenkins"},"email":"jenkins@example.com","city":"Philadelphia","totalOrders":43,"totalSpent":45697,"lastSeen":"12 hours ago","lastOrder":"Oct 3, 8:30 AM"}' />
                                                    </div>
                                                </td>
                                                <td class="customer align-middle white-space-nowrap pe-5"><a
                                                        class="d-flex align-items-center text-body-emphasis"
                                                        href="customer-details.html">
                                                        <div class="avatar avatar-m"><img class="rounded-circle"
                                                                src="../../../assets/img/team/25.webp" alt="" />
                                                        </div>
                                                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">Michael Jenkins</p>
                                                    </a></td>
                                                <td class="email align-middle white-space-nowrap pe-5"><a
                                                        class="fw-semibold"
                                                        href="mailto:jenkins@example.com">jenkins@example.com</a></td>
                                                <td
                                                    class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">
                                                    43</td>
                                                <td
                                                    class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                                                    $ 45697</td>
                                                <td class="city align-middle white-space-nowrap text-body-highlight ps-7">
                                                    Philadelphia</td>
                                                <td
                                                    class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">
                                                    12 hours ago</td>
                                                <td
                                                    class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                                                    Oct 3, 8:30 AM</td>
                                            </tr>
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
