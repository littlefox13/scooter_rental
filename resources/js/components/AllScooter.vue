<template>
    <div>
        <h2 class="text-center">Scooters List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="scooter in scooters" :key="scooter.id">
                <td>{{ scooter.id }}</td>
                <td>{{ scooter.description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'scooter_edit', params: { id: scooter.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteScooter(scooter.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <router-link to="/scooter/create" class="nav-item nav-link">Create Scooter</router-link>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                scooters: []
            }
        },
        created() {
            this.axios
                .get('/api/scooters/')
                .then(response => {
                    this.scooters = response.data;
                    console.log(this.scooters);
                });
        },
        methods: {
            deleteScooter(id) {
                this.axios
                    .delete(`/api/scooters/${id}`)
                    .then(response => {
                        let i = this.scooters.map(data => data.id).indexOf(id);
                        this.scooters.splice(i, 1)
                    });
            }
        }
    }
</script>
