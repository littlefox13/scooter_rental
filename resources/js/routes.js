import AllScooter from './components/AllScooter.vue';
import CreateScooter from './components/CreateScooter.vue';
import EditScooter from './components/EditScooter.vue';
import Booking from "./components/Booking";
import AllRentalPoint from "./components/AllRentalPoint";
import EditRentalPoint from "./components/EditRentalPoint";
import AllUsers from "./components/AllUsers";
import EditUser from "./components/EditUser";
import AllRentals from "./components/AllRentals";
import Reports from "./components/Reports";
import Login from "./components/Login";
import Registration from "./components/Registration";
import Home from "./components/Home";
import axios from "axios";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: {
            permissions: ['all']
        }
    },
    {
        name: 'scooters_home',
        path: '/scooters',
        component: AllScooter,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'scooter_create',
        path: '/scooter/create',
        component: CreateScooter,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'scooter_edit',
        path: '/scooter/edit/:id',
        component: EditScooter,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'booking',
        path: '/booking',
        component: Booking,
        meta: {
            permissions: ['admin','customer','manager']
        }
    },
    {
        name: 'rental_point',
        path: '/rental_points',
        component: AllRentalPoint,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'rental_point_edit',
        path: '/rental_point/edit/:id',
        component: EditRentalPoint,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'users',
        path: '/users',
        component: AllUsers,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'user_edit',
        path: '/user/edit/:id',
        component: EditUser,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'rentals',
        path: '/rentals',
        component: AllRentals,
        meta: {
            permissions: ['admin', 'manager']
        }
    },
    {
        name: 'reports',
        path: '/reports',
        component: Reports,
        meta: {
            permissions: ['admin']
        }
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            permissions: ['all']
        }
    },
    {
        name: 'register',
        path: '/register',
        component: Registration,
        meta: {
            permissions: ['all']
        }
    }


];
