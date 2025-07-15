@extends('layouts.main')
@section('title', 'Notifications')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Notifications</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>


                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('dashboard.admin.notifications.send') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="target" class="form-label">Select Recipients</label>
                                <select name="target" id="target" class="form-select"
                                    onchange="toggleRecipientOptions()" required>
                                    <option value="">-- Choose --</option>
                                    <option value="all">All Users</option>
                                    <option value="selected">Selected Users</option>
                                    <option value="single">Single User</option>
                                </select>
                            </div>

                            <div class="mb-3 d-none" id="multi-select">
                                <label class="form-label">Select Users</label>
                                <select name="users[]" class="form-select" multiple>
                                    @foreach ($users as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['name'] }} ({{ $user['user_type'] }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 d-none" id="single-select">
                                <label class="form-label">Select One User</label>
                                <select name="single_user" class="form-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['name'] }} ({{ $user['user_type'] }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>

                        {{-- <script>
                            function toggleRecipientOptions() {
                                let target = document.getElementById('target').value;
                                document.getElementById('multi-select').classList.add('d-none');
                                document.getElementById('single-select').classList.add('d-none');

                                if (target === 'selected') {
                                    document.getElementById('multi-select').classList.remove('d-none');
                                } else if (target === 'single') {
                                    document.getElementById('single-select').classList.remove('d-none');
                                }
                            }
                        </script> --}}
                        <script>
                            function toggleRecipientOptions() {
                                let target = document.getElementById('target').value;

                                const multiSelectDiv = document.getElementById('multi-select');
                                const singleSelectDiv = document.getElementById('single-select');

                                const multiSelect = document.querySelector('select[name="users[]"]');
                                const singleSelect = document.querySelector('select[name="single_user"]');

                                // Hide all initially
                                multiSelectDiv.classList.add('d-none');
                                singleSelectDiv.classList.add('d-none');

                                // Clear both selections
                                if (multiSelect) {
                                    Array.from(multiSelect.options).forEach(option => option.selected = false);
                                }
                                if (singleSelect) {
                                    singleSelect.value = '';
                                }

                                // Show relevant fields based on selection
                                if (target === 'selected') {
                                    multiSelectDiv.classList.remove('d-none');
                                } else if (target === 'single') {
                                    singleSelectDiv.classList.remove('d-none');
                                }
                            }
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
