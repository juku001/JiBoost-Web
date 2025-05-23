@extends('layouts.sub_main')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading" style="font-size: medium">JiBoost</h5>
@endsection
@section('content')
    <div class="content">


        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">{{ __('profile.title') }}</h2>
            </div>

            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="row h-100 py-5">
                                <h4 class="small">{{ __('profile.info_title') }}</h4>
                                <p class="small">{{__('profile.info_subtitle') }}</p>
                                <div class="form-group mt-3">
                                    <label class="small" for="name">{{ __('profile.name') }}</label>
                                    <input type="text" class="form-control" name="name" placeholder="{{ __('profile.name_placeholder') }}"
                                        value="{{ $user['name'] ?? '' }}" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="mobile">{{ __('profile.mobile') }}</label>
                                    <input type="text" class="form-control" name="mobile"
                                        placeholder="{{ __('profile.mobile_placeholder') }}" value="{{ $user['mobile'] ?? '' }}"
                                        maxlength="12" required>
                                    @error('mobile')
                                        <span class="small text-danger">{{ $errors->first('mobile') }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="education">{{ __('profile.education_level') }}</label>
                                    <select name="level" id="" class="form-control" required>
                                        <option value="">{{ __('profile.education_level_placeholder') }}</option>
                                        @foreach ($levels as $level)
                                            @if (isset($user['level_id']))
                                                <option {{ $user['level_id'] == $level['id'] ? 'selected' : '' }}
                                                    value="{{ $level['id'] }}">{{ $level['level'] }}</option>
                                            @else
                                                <option value="{{ $level['id'] }}">{{ $level['level'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-jb-primary">{{ __('profile.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="{{ route('profile.update.password') }}" method="POST">
                            @csrf
                            <div class="row h-100">
                                <h4 class="small">{{ __('profile.update_password') }}</h4>
                                <p class="small">{{ __('profile.update_password_subtitle') }}</p>
                                <div class="form-group mt-3">
                                    <label class="small" for="old_password">{{ __('profile.current') }}</label>
                                    <input type="password" name="old_password" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="current_password">{{ __('profile.new') }}</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="current_password_confirmation">{{ __('profile.confirm') }}</label>
                                    <input type="password" name="current_password_confirmation" class="form-control">
                                    @error('current_password')
                                        <span class="small text-danger">{{ $errors->first('current_password') }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-jb-primary">{{ __('profile.save') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>


            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row h-100">
                            <h4 class="small">{{ __('profile.delete_account') }}</h4>
                            <p class="small">
                                {{ __('profile.delete_warning') }}
                            </p>

                            <div class="col-12">
                                <!-- Trigger Modal -->
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    {{ __('profile.delete_account') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('profile.delete') }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Account Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Please enter your password to confirm you want to delete your account permanently.</p>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password', 'deleteAccount') is-invalid @enderror"
                                        required>
                                    @error('password', 'deleteAccount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Permanently Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection
