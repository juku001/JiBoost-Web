@extends('layouts.main')
@section('title', 'Subscribe')
@section('content')

    <style>
        .method-logo {
            width: 60px;
            /* Default size */
            height: auto;
            /* Maintain aspect ratio */
            max-width: 100%;
            /* Ensure it doesn't overflow */
        }

        /* Adjust size for tablets */
        @media (max-width: 768px) {
            .method-logo {
                width: 40px;
            }
        }

        /* Adjust size for mobile devices */
        @media (max-width: 480px) {
            .method-logo {
                width: 30px;
            }
        }
    </style>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-20">
                    <h2 class="section-title">Subscription</h2>
                    <h5>Select Package and Payment Method</h5>
                </div>
                <div class="col-12 text-center mt-5">
                    <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                        @foreach ($methods as $method)
                            <img src="{{ \App\Helpers\ApiRoutes::baseUrl() . $method['logo'] }}" alt="{{ $method['name'] }}"
                                class="method-logo">
                        @endforeach
                    </div>
                </div>
                <form action="{{ route('dashboard.subscribe') }}" method="POST">
                    @csrf
                    <div
                        class="offset-xxl-3 offset-xl-3 offset-lg-3 offset-md-3 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mt-4">
                        <div class="row">
                            <!-- Package Selection -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subscription">Select Package Type</label>
                                    <select name="subscription" id="subscription" class="form-control" required>
                                        <option value="" selected disabled>Select Package</option>
                                        @foreach ($subscriptions as $subscription)
                                            <option value="{{ $subscription['id'] }}"
                                                data-name="{{ $subscription['name'] }}"
                                                data-description="{{ $subscription['description'] }}"
                                                data-price="{{ $subscription['price'] }}"
                                                data-type="{{ $subscription['key'] }}">
                                                {{ $subscription['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Dynamic Input Field -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label id="count-label" for="count">How many months?</label>
                                    <input name="count" type="number" id="count" class="form-control"
                                        placeholder="Number of months" min="1" value="1">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h5>Package Information</h5>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6 pt-2">
                                <span class="strong">Name : <span id="package-name" class="fw-bold">-</span><br>
                                    <span id="package-description">Select a package to see details.</span>
                                </span>
                            </div>
                            <div class="col-6 p-2 text-center text-lg-end">
                                <span>Price : <span id="package-price">Tsh 0</span></span>
                            </div>
                        </div>

                        <div class="mt-2 row d-flex align-items-end">
                            <div class="col-6">
                                <p>Start : <span class="fw-bold" id="start-date">-</span><br>
                                    End : <span class="fw-bold" id="end-date">-</span>
                                </p>
                            </div>
                            <div class="col-6 text-center text-lg-end">
                                <p><span>Total : </span><span id="total-price" class="fw-bolder"
                                        style="font-size: large">Tsh
                                        0</span></p>
                            </div>

                            <div class="col-12 text-center">
                                <div class="form-group mb-5">
                                    <div class="input-group">
                                        <span class="input-group-text">+255</span>
                                        <input name="mobile" type="tel" id="mobile" class="form-control"
                                            placeholder="Enter Mobile Number" maxlength="9" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Pay</button>
                                <a href="{{ route('dashboard.home') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    @push('plugin-scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const subscriptionSelect = document.getElementById("subscription");
                const countInput = document.getElementById("count");
                const countLabel = document.getElementById("count-label");
                const packageName = document.getElementById("package-name");
                const packageDescription = document.getElementById("package-description");
                const packagePrice = document.getElementById("package-price");
                const totalPrice = document.getElementById("total-price");
                const startDate = document.getElementById("start-date");
                const endDate = document.getElementById("end-date");

                function updateTotal() {
                    const selectedOption = subscriptionSelect.options[subscriptionSelect.selectedIndex];
                    const price = parseFloat(selectedOption.getAttribute("data-price")) || 0;
                    const quantity = parseInt(countInput.value) || 1;
                    totalPrice.textContent = `Tsh ${price * quantity}`;

                    // Calculate end date
                    if (selectedOption.getAttribute("data-type") !== "ppe") {
                        const start = new Date();
                        startDate.textContent = start.toDateString();
                        let end = new Date();
                        end.setMonth(end.getMonth() + quantity);
                        endDate.textContent = end.toDateString();
                    } else {
                        startDate.textContent = "-";
                        endDate.textContent = "-";
                    }
                }

                subscriptionSelect.addEventListener("change", function() {
                    const selectedOption = this.options[this.selectedIndex];

                    if (selectedOption.value) {
                        // Update package details
                        packageName.textContent = selectedOption.getAttribute("data-name");
                        packageDescription.textContent = selectedOption.getAttribute("data-description");
                        packagePrice.textContent =
                            `Tsh ${selectedOption.getAttribute("data-price")} @ Month/Exam`;

                        // Check subscription type
                        if (selectedOption.getAttribute("data-type") === "ppe") {
                            countLabel.textContent = "How many exams?";
                            countInput.placeholder = "Number of exams";
                        } else {
                            countLabel.textContent = "How many months?";
                            countInput.placeholder = "Number of months";
                        }

                        updateTotal();
                    } else {
                        // Reset fields if no package is selected
                        packageName.textContent = "-";
                        packageDescription.textContent = "Select a package to see details.";
                        packagePrice.textContent = "Tsh 0";
                        totalPrice.textContent = "Tsh 0";
                        countLabel.textContent = "How many months?";
                        countInput.value = 1;
                        startDate.textContent = "-";
                        endDate.textContent = "-";
                    }
                });

                countInput.addEventListener("input", updateTotal);
            });



            document.addEventListener("DOMContentLoaded", function() {
                const mobileInput = document.getElementById("mobile");

                mobileInput.addEventListener("input", function() {
                    let value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
                    if (value.length > 9) value = value.substring(0, 9); // Ensure max 9 digits
                    this.value = value;
                });

                mobileInput.addEventListener("keydown", function(event) {
                    // Prevent Backspace/Delete when empty
                    if ((event.key === "Backspace" || event.key === "Delete") && this.value.length === 0) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush
@endsection
