<template>
    <div>
        <h3 class="text-center">Create Scooter</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addScooter">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="scooter.description">
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
                scooter: {}
            }
        },
        methods: {
            addScooter() {
                this.axios
                    .post('/api/scooters', this.scooter)
                    .then(response => (
                        this.$router.push({ name: 'scooters_home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
