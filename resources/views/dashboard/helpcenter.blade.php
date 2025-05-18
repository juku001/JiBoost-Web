@extends('layouts.sub_main')
@section('title', 'Help-Center')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading" style="font-size: medium">JiBoost</h5>
@endsection
@section('content')
    <div class="content" style="overflow: hidden">
        <div class="mb-5">
            <div class="mx-n4 mx-lg-n6 mt-n5 position-relative mb-md-9" style="height:208px">
                <div class="bg-holder bg-card d-dark-none"
                    style="background-image:url(https://img.pikbest.com/wp/202343/abstract-design-shape-pattern-background-vibrant-blue-texture-and-geometric-mosaic_9969503.jpg!w700wp);background-size:cover;">
                </div>
                <!--/.bg-holder-->
                <div class="bg-holder bg-card d-light-none"
                    style="background-image:url(https://img.pikbest.com/wp/202343/abstract-design-shape-pattern-background-vibrant-blue-texture-and-geometric-mosaic_9969503.jpg!w700wp);background-size:cover;">
                </div>
                <!--/.bg-holder-->
                <div
                    class="faq-title-box position-relative bg-body-emphasis border border-translucent p-6 rounded-3 text-center mx-auto">
                    <h1>How can we help?</h1>
                    <p class="my-3">Search for the topic you need help with or <a href="#!">contact our support</a>
                    </p>
                    <div class="search-box w-100">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                class="form-control search-input search" type="search" aria-label="Search" /><span
                                class="fas fa-search search-box-icon"></span></form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="offset-xxl-3 offset-xl-3 offset-lg-3 offset-md-3 col-xxl-2 col-xl-2 col-md-2 col-4 ">
                    <a href="tel:+255687181497" class="text-decoration-none">
                        <div class="card text-center py-3 py-md-8">
                            <div><span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-telephone-fill" viewBox="0 0 16 16"
                                        style="width: 30px;margin-bottom:5px">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg></span></div>
                            <div><span class="responsive-text">Call Us</span></div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-2 col-xl-2 col-md-2 col-4 h-100">
                    <a href="https://wa.me/255687181497?text=Hello%20JiBoost%20Support" class="text-decoration-none">
                        <div class="card text-center h-100 py-3 py-md-8">
                            <div>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-whatsapp"
                                        viewBox="0 0 16 16" style="width: 30px; margin-bottom: 5px;">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                </span>
                            </div>
                            <div><span class="responsive-text">Whatsapp Us</span></div>
                        </div>
                    </a>
                </div>

                <div class="col-xxl-2 col-xl-2 col-md-2 col-4">
                    <a href="mailto:support@jiboost.co.tz" class="text-decoration-none">
                        <div class="card text-center py-3 py-md-8">
                            <div><span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-envelope-fill" viewBox="0 0 16 16"
                                        style="width: 30px;margin-bottom:5px">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                    </svg></span></div>
                            <div><span class="responsive-text">Email Us</span></div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center my-6">
            <h1>FAQ</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $faq['id'] }}"><button
                                    class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq['id'] }}" aria-expanded="true"
                                    aria-controls="collapseOne">{{ $faq['question'] }}</button></h2>
                            <div class="accordion-collapse collapse" id="collapse{{ $faq['id'] }}"
                                aria-labelledby="heading{{ $faq['id'] }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">{{ $faq['answer'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
