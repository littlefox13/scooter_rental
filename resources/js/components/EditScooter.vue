<template>
    <div>
        <h3 class="text-center">Edit Scooter</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateScooter">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="scooter.description" value="scooter.description">
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
                scooter: {}
            }
        },
        created() {
            this.axios
                .get(`/api/scooters/${this.$route.params.id}`)
                .then((res) => {
                    this.scooter = res.data;
                });
        },
        methods: {
            updateScooter() {
                this.axios
                    .patch(`/api/scooters/${this.$route.params.id}`, this.scooter)
                    .then((res) => {
                        this.$router.push({ name: 'scooters_home' });
                    });
            }
        }
    }
</script>
