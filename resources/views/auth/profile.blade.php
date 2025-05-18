@extends('layouts.sub_main')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading" style="font-size: medium">JiBoost</h5>
@endsection
@section('content')
    <div class="content">


        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Profile</h2>
            </div>

            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="row h-100 py-5">
                                <h4 class="small">Profile Information</h4>
                                <p class="small">Update your account profile information and email address</p>
                                <div class="form-group mt-3">
                                    <label class="small" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                                        value="{{ $user['name'] ?? '' }}" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile"
                                        placeholder="Enter your mobile number" value="{{ $user['mobile'] ?? '' }}"
                                        maxlength="12" required>
                                    @error('mobile')
                                        <span class="small text-danger">{{ $errors->first('mobile') }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="education">Education Level</label>
                                    <select name="level" id="" class="form-control" required>
                                        <option value="">
                                            Select Education level</option>
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
                                    <button class="btn btn-jb-primary">Save</button>
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
                                <h4 class="small">Update Password</h4>
                                <p class="small">Ensure your account is using a long, random password to stay secure</p>
                                <div class="form-group mt-3">
                                    <label class="small" for="old_password">Current Password</label>
                                    <input type="password" name="old_password" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="current_password">New Password</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="small" for="current_password_confirmation">Confirm Password</label>
                                    <input type="password" name="current_password_confirmation" class="form-control">
                                    @error('current_password')
                                        <span class="small text-danger">{{ $errors->first('current_password') }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-jb-primary">Save</button>
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
                            <h4 class="small">Delete Account</h4>
                            <p class="small">
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Before deleting your account, please download any data or information that you wish to
                                retain.
                            </p>

                            <div class="col-12">
                                <!-- Trigger Modal -->
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    Delete Account
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
