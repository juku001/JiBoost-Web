{{-- @php
    use App\Helpers\ApiRoutes;

@endphp
@extends('layouts.sub_main')
@section('title', 'DisplayPhoto')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading" style="font-size: medium">JiBoost</h5>
@endsection
@section('content')
    <div class="content">
        <div class="text-center">
            <h3>Display Photo</h3>
        </div>
        <div class="mt-4 text-center">
            <div class="avatar avatar-xl  display-photo">
                <img class="rounded-circle"
                    src="{{ $photo != null ? ApiRoutes::displayUrl() . $photo : asset('assets/img/logo.png') }}"
                    alt="Profile Picture" />
            </div>
            <div class="mt-5">
                <button class="btn btn-phoenix-primary me-1 mb-1 rounded-pill px-5" type="button">Select Image</button>
            </div>
        </div>
    </div>
@endsection --}}

@php
    use App\Helpers\ApiRoutes;
@endphp
@extends('layouts.sub_main')
@section('title', 'DisplayPhoto')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading" style="font-size: medium">JiBoost</h5>
@endsection

@section('content')
    <div class="content">
        <div class="text-center">
            <h3>Display Photo</h3>
        </div>

        <div class="mt-4 text-center">
            <div class="avatar avatar-xl  display-photo">
                <img class="rounded-circle"
                    src="{{ $photo != null ? ApiRoutes::displayUrl() . $photo : asset('assets/img/logo.png') }}"
                    alt="Profile Picture" />
            </div>
        </div>
        <div class="mt-4 text-center">

            <form id="uploadForm" action="{{ route('profile.display.photo.upload') }}" method="POST"
                enctype="multipart/form-data" class="mt-3 d-none">
                @csrf
                <input type="file" name="photo" id="photoInput" class="d-none"
                    accept="image/png, image/jpeg, image/jpg" required>
                <button type="submit" class="btn btn-success rounded-pill px-5">Upload Photo</button>
            </form>

            <div class="mt-3" id="buttonArea">
                @if ($photo)
                    <form action="{{ route('profile.display.photo.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded-pill px-5">Delete Photo</button>
                    </form>
                @else
                    <button class="btn btn-primary rounded-pill px-5" type="button" id="selectBtn">Select Photo</button>
                @endif
            </div>
        </div>
    </div>

    <script>
        const selectBtn = document.getElementById('selectBtn');
        const photoInput = document.getElementById('photoInput');
        const previewImage = document.getElementById('previewImage');
        const uploadForm = document.getElementById('uploadForm');
        const buttonArea = document.getElementById('buttonArea');

        if (selectBtn) {
            selectBtn.addEventListener('click', () => {
                photoInput.click();
            });
        }

        photoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    uploadForm.classList.remove('d-none');
                    if (selectBtn) selectBtn.classList.add('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
