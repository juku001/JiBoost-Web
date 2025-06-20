@extends('layouts.sub_main')
@section('title', 'Setting & Privacy')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading" style="font-size: medium">JiBoost</h5>
@endsection
@section('new-route', url()->previous())
@section('content')
    <div class="content" style="overflow: hidden">
        <div class="mb-5">
            <div class="mx-n4 mx-lg-n6 mt-n5 position-relative mb-md-9" style="height:208px">
                <div class="bg-holder bg-card d-dark-none"
                    style="background-image:url(https://img.pikbest.com/wp/202343/abstract-design-shape-pattern-background-vibrant-blue-texture-and-geometric-mosaic_9969503.jpg!w700wp);background-size:cover;">
                </div>
                <div class="bg-holder bg-card d-light-none"
                    style="background-image:url(https://img.pikbest.com/wp/202343/abstract-design-shape-pattern-background-vibrant-blue-texture-and-geometric-mosaic_9969503.jpg!w700wp);background-size:cover;">
                </div>
                <div
                    class="faq-title-box position-relative bg-body-emphasis border border-translucent p-6 rounded-3 text-center mx-auto">
                    <h1>{{ __('setting.title') }}</h1>
                    <p class="my-3">{{ __('setting.subtitle') }}</p>
                    <div class="search-box w-100" style="visibility: hidden">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                class="form-control search-input search" type="search" aria-label="Search" /><span
                                class="fas fa-search search-box-icon"></span></form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                            <path
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z" />
                                        </svg>
                                    </span>
                                    <span class="mx-3">
                                        <a class=" text-decoration-none"
                                            href="{{ route('settings.lang') }}">{{ __('setting.lang') }}</a>
                                    </span>
                                </div>
                                <div>
                                    <span>{{ App::currentLocale() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
