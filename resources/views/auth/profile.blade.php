@extends('layouts.sub_main')

@section('content')
    <div class="content">


        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Profile</h2>
            </div>

            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row h-100 py-5">
                            <h4>Profile Information</h4>
                            <p>Update your account profile information and email address</p>
                            <div class="form-group mt-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Enter your mobile number">
                            </div>
                            <div class="form-group mt-3">
                                <label for="education">Education Level</label>
                                <select name="education" id="" class="form-control">
                                    <option value="">select your education level</option>
                                    <option value="">Standard Four</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row h-100">
                            <h4>Profile Information</h4>
                            <p>Update your account profile information and email address</p>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row h-100">
                            <h4>Delete Account</h4>
                            <p>
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Before deleting your account, please download any data or information that you wish to
                                retain.
                            </p>

                            <div class="col-3">
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
