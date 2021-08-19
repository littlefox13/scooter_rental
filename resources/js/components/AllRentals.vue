<template>
    <div>
        <h2 class="text-center">Users List</h2>

        <table class="table">
            <thead>
            <tr>

                <th>id</th>
                <th>scooter</th>
                <th>user</th>
                <th>rental point</th>
                <th>rental status</th>
                <th>collateral</th>
                <th>cost</th>
                <th>date</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="(rental, index) in rentals" :key="rental.id">
                <td>
                    {{ rental.id }}
                </td>
                <td>
                    {{ scooters[rental.scooter_id]['description'] }}
                </td>
                <td>
                    {{ users[rental.user_id]['name'] }}
                </td>
                <td>
                    {{ rental_points[rental.rental_point_id]['address'] }}
                </td>
                <td>
                    {{ rental_statuses[rental.rental_status_id]['description'] }}
                </td>
                <td>
                    {{ rental.collateral_data }}
                </td>
                <td>
                    {{ rental.cost }}
                </td>
                <td>

                    <p v-if="rental.rental_status_id == 3" class="mb2">reserved to: </p>
                    <p> {{ getHumanDate(rental.reservation_time) }} </p>

                </td>
                <td>
                    <div v-if="rental.rental_status_id == 1">

                        <input type="text" v-model="rentals[index].cost" class="form-control" value="">
                        <input type="text" hidden v-model="rentals[index].action" class="form-control" value="end">

                        <button class="btn btn-danger" @click="updateRental(rentals[index].id, index, rentals[index].cost, 'end')">end</button>
                    </div>

                    <!--
                    @if($rental->rental_status_id == 3)

                    <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <input hidden type="text" name="action" id="booking_rental" class="form-control" value="start">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> start
                        </button>
                    </form>
                    <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <input hidden type="text" name="action" id="booking_rental" class="form-control" value="end">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> abort reservation
                        </button>
                    </form>
                    @endif
                    -->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {

        data() {
            return {
                rentals: [],
                scooters: [],
                users: [],
                rental_points: [],
                rental_statuses: []
            }
        },
        created() {
            this.axios
                .get('/api/rentals/')
                .then(response => {
                    console.log(response);
                    this.users = response.data.users;
                    this.rentals = response.data.rentals;
                    this.scooters = response.data.scooters;
                    this.rental_points = response.data.rental_points;
                    this.rental_statuses = response.data.rental_statuses;
                });
        },
        methods: {
            deleteUser(id) {
                this.axios
                    .delete(`/api/users/${id}`)
                    .then(response => {
                        let i = this.user.map(data => data.id).indexOf(id);
                        this.user.splice(i, 1)
                    });
            },
            getHumanDate : function (date2) {

                return moment.unix(date2).format('DD/MM/YYYY, hh:mm:ss');
            },
            updateRental(id, index, cost, action) {
                console.log(id, index, cost);
                this.rentals[index].action = action;
                this.axios
                    .post(`/api/rentals/update/`, this.rentals[index])
                    .then((res) => {
                        console.log(res);
                    });
            }
        }
    }
</script>
