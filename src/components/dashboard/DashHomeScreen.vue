<template>
    <section>

        <div class="container-fluid bg-light py-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Left Side: Date -->
                <div>
                    <span class="fw-bold">{{ currentDate }}</span>
                </div>
                <!-- Right Side: User Info -->
                <div class="d-flex align-items-center">
                    <div class="text-end me-3">
                        <span class="d-block fw-bold">Juma Kujellah</span>
                        <span class="text-muted">Form One</span>
                    </div>
                    <div class="profile-circle">
                        <i class="icofont-user"></i>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>

export default {
    name: 'DashHomeScreen',
    data() {
        return {
            currentDate: new Date().toLocaleDateString("en-US", {
                day: "numeric",
                month: "short",
                year: "numeric",
            }),
        };
    },
};

</script>

<style>
.profile-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(0, 57, 79, 0.588);
    color: #00394F;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}
</style>