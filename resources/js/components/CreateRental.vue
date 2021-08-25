<template>
    <div>
        <h3 class="text-center">Create Rental</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addRental">
                    <div class="form-group">
                        <label>Scooter:</label>
                        <select class='form-control' v-model='rental.scooter_id'>
                            <option v-for='scooter in scooters'  :value='scooter.id'>{{ scooter.description }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>User:</label>
                        <select class='form-control' v-model='rental.user_id'>
                            <option v-for='user in users'  :value='user.id'>{{ user.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rental point:</label>
                        <select class='form-control' v-model='rental.rental_point_id'>
                            <option v-for='rental_point in rental_points'  :value='rental_point.id'>{{ rental_point.address }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Collateral data</label>
                        <input type="text" class="form-control" v-model="rental.collateral_data">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rental: {},
                scooters: {},
                users: {},
                rental_points: {}
            }
        },
        created() {
            this.axios
                .get(`/api/rentals/`)
                .then((res) => {
                    this.scooters = res.data.scooters;
                    this.users = res.data.users;
                    this.rental_points = res.data.rental_points;
                    console.log(res.data);
                });
        },
        methods: {
            addRental() {
                this.axios
                    .post('/api/rentals', this.rental)
                    .then(response => (
                        this.$router.push({ name: 'rentals' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
