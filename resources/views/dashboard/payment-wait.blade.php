@extends('layouts.main')
@section('title', 'Wait for Payment')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-20">
                    <h2 class="section-title">Waiting for Payment</h2>
                    <h5 id="payment-message">Please confirm payment by entering your mobile money password</h5>
                    <img id="status-gif" width="250px" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f8061c05-dede-443a-b060-167e94e14951/de0u06p-c30bdc50-cd74-4c7a-8a8f-c79998e353b6.gif?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4MDYxYzA1LWRlZGUtNDQzYS1iMDYwLTE2N2U5NGUxNDk1MVwvZGUwdTA2cC1jMzBiZGM1MC1jZDc0LTRjN2EtOGE4Zi1jNzk5OThlMzUzYjYuZ2lmIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.atDWkdhZfUt1IMqgDa-DvdwvstZ8TgNZ-SUuAZI8olE" alt="WaitingGIF">
                </div>
                <div class="mt-20 text-center">
                    <a href="{{ route('dashboard.subscribe') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkPaymentStatus() {
            fetch("{{ route('dashboard.subscription.wait') }}", {
                method: "GET",
                headers: { "X-Requested-With": "XMLHttpRequest" } // Mark as AJAX request
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById("payment-message").innerText = "Payment Successful!";
                    document.getElementById("status-gif").src = "https://education.uoc.ac.in/images/ezgif.com-crop.gif"; // Success GIF
                    setTimeout(() => window.location.href = "{{ route('dashboard.home') }}", 3000); // Redirect after 3 sec
                } 
                else if (data.status === "failed") {
                    document.getElementById("payment-message").innerText = "Payment Failed!";
                    document.getElementById("status-gif").src = "https://media.tenor.com/GL7cyMq1ad4AAAAC/payment-failed.gif"; // Failed GIF
                }
                // If status is "pending", do nothing and keep checking
            })
            .catch(error => console.error("Error checking payment:", error));
        }

        // Check payment status every 5 seconds
        setInterval(checkPaymentStatus, 5000);
    </script>
@endsection
