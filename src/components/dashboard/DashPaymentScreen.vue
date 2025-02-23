<template>

    <div>
        <h2>Payments</h2>
        <p>List of all payments</p>
        <div class="mt-5">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Mobile Number</th>
                            <th>Network</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>All Level</td>
                            <td>23rd Feb 2025 1:39 am</td>
                            <td>255714257454</td>
                            <td>Mix By Yas</td>
                            <td>4,100</td>
                            <td><span>Pending</span></td>
                            <td><router-link to=""><i class="icofont-eye-open"></i></router-link></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PaymentScreen'
}
</script>