<template>
    <div>
        <h3 class="text-center">Booking</h3>

        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addRental">

                    <div class="form-group">
                        <label>Select Scooter:</label>
                        <select class='form-control' v-model='booking.scooter_id'>
                            <option disabled value="0">select scooter</option>
                            <option v-for='scooter in scooters' :value='scooter.id'>{{ scooter.description }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Rental point:</label>
                        <select class='form-control' v-model='booking.rental_point_id'>
                            <option disabled value="0">select rental point</option>
                            <option v-for='point in rental_points' :value='point.id'>{{ point.address }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date and time: </label>
                        <div class="col-sm-6">
                            <input type="datetime-local" v-model="booking.reservation_time" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Booking now!</button>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                scooters: [],
                rental_points: [],
                booking: {}
            }
        },
        methods: {
            addRental() {
                this.axios
                    .post('/api/booking', this.booking)
                    .then(response => (
                        alert('success booking')
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        },
        created() {
            console.log(this.params);
            this.axios
                .get('/api/booking/')
                .then(response => {
                    this.rental_points = response.data.rental_points;
                    this.scooters = response.data.scooters;
                    console.log(this.scooters);

                });
        }
    }
</script>
