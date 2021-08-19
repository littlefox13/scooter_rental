import AllScooter from './components/AllScooter.vue';
import CreateScooter from './components/CreateScooter.vue';
import EditScooter from './components/EditScooter.vue';
import Booking from "./components/Booking";
import AllRentalPoint from "./components/AllRentalPoint";
import EditRentalPoint from "./components/EditRentalPoint";
import AllUsers from "./components/AllUsers";
import EditUser from "./components/EditUser";
import AllRentals from "./components/AllRentals";

export const routes = [
    {
        name: 'scooters_home',
        path: '/scooters',
        component: AllScooter
    },
    {
        name: 'scooter_create',
        path: '/scooter/create',
        component: CreateScooter
    },
    {
        name: 'scooter_edit',
        path: '/scooter/edit/:id',
        component: EditScooter
    },
    {
        name: 'booking',
        path: '/booking',
        component: Booking
    },
    {
        name: 'rental_point',
        path: '/rental_points',
        component: AllRentalPoint
    },
    {
        name: 'rental_point_edit',
        path: '/rental_point/edit/:id',
        component: EditRentalPoint
    },
    {
        name: 'users',
        path: '/users',
        component: AllUsers
    },
    {
        name: 'user_edit',
        path: '/user/edit/:id',
        component: EditUser
    },
    {
        name: 'rentals',
        path: '/rentals',
        component: AllRentals
    }


];
