@extends('layouts.main')
@section('title', 'Exams')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Add Series</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Select education level to start with</h5>
            </div>
            <div class="mt-4">
                <form action="{{ route('admin.exams.series_add') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                            <div class="form-group">
                                <label for="level">Education Level</label>
                                <select type="text" class="form-control" name="level" required>
                                    <option value="">Select Education Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level['level'] }}">{{ $level['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select type="text" class="form-control" name="subject" required>
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $sub)
                                        <option value="{{ $sub['id'] }}">{{ $sub['subject_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                            <div class="form-group">
                                <label for="name">Series Name</label>
                                <input type="text" placeholder="Eg Mixed Series" name="name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                            <div class="form-group">
                                <label for="isTrial">is it Trial?</label>
                                <select name="isTrial" id="isTrial" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                            <div class="form-group">
                                <label for="duration">How long should it take?(in Minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control"
                                    placeholder="Eg 60">
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                            <div class="form-group">
                                <label for="marking">Select Marking System</label>
                                <select name="marking" id="marking" class="form-control">
                                    <option value="ems">Equal Marking System</option>
                                    <option value="wms">Weighted Marking System</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button class="btn btn-subtle-primary">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
