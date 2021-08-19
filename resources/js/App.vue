<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">

                    <ul class="topmenu">
                        <li><router-link to="/home">Home</router-link></li>
                        <li><router-link to="/booking">Booking</router-link></li>
                        <li>Edit<i class="fa fa-angle-down"></i>
                            <ul class="submenu">
                                <li><router-link to="/scooters">Scooters</router-link></li>
                                <li><router-link to="rental_points">Rental points</router-link></li>
                                <li><router-link to="users">Users</router-link></li>
                            </ul>
                        </li>
                        <li><router-link to="/rentals">Rentals</router-link></li>
                        <li><router-link to="/report">Reports</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>

<script>
    export default {}
</script>
