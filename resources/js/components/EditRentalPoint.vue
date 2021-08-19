<template>
    <div>
        <h3 class="text-center">Edit Rental Point</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateRentalPoint">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" v-model="rental_point.address" value="rental_point.address">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rental_point: {}
            }
        },
        created() {
            this.axios
                .get(`/api/rental_points/${this.$route.params.id}`)
                .then((res) => {
                    this.rental_point = res.data;
                });
        },
        methods: {
            updateRentalPoint() {
                this.axios
                    .patch(`/api/rental_points/${this.$route.params.id}`, this.rental_point)
                    .then((res) => {
                        this.$router.push({ name: 'rental_point' });
                    });
            }
        }
    }
</script>
