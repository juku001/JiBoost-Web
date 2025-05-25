<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            @php
                $route = trim($__env->yieldContent('new-route')) ?: url()->previous();
            @endphp
            <a href="{{ $route }}" style="text-decoration: none">
                <span class="back-button">
                    <span data-feather="arrow-left"></span>
                    <span>Back</span>
                </span>
            </a>



            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    @yield('sub_title')
                </div>
            </div>

        </div>


    </div>
</nav>
