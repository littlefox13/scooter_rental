
<nav class="one">
    <ul class="topmenu">
        <li><a href="{{ url('home') }}">Home</a></li>
        <li><a href="{{ url('booking') }}">Booking</a></li>
        <li><a href="#">Edit<i class="fa fa-angle-down"></i></a>
            <ul class="submenu">
                <li><a href={{ url('scooters') }}>Scooters</a></li>
                <li><a href="{{ url('rental_points') }}">Rental points</a></li>
                <li><a href="{{ url('user') }}">Users</a></li>
            </ul>
        </li>
        <li><a href="{{ url('rentals') }}">Rentals</a></li>
        <li><a href="{{ url('report') }}">Reports</a></li>
    </ul>
</nav>
