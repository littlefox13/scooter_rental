<template>
    <div>
        <h2 class="text-center">Rental Point List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Address</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="point in rental_points" :key="point.id">
                <td>{{ point.id }}</td>
                <td>{{ point.address }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'rental_point_edit', params: { id: point.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteRentalPoint(point.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <form @submit.prevent="addRentalPoint">
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" v-model="rental_point.address">
            </div>
            <button type="submit" class="btn btn-primary">Add rental point</button>
        </form>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                rental_points: [],
                rental_point: {},
            }
        },
        created() {
            this.axios
                .get('/api/rental_points/')
                .then(response => {
                    this.rental_points = response.data;
                });
        },
        methods: {
            deleteRentalPoint(id) {
                this.axios
                    .delete(`/api/rental_points/${id}`)
                    .then(response => {
                        let i = this.rental_points.map(data => data.id).indexOf(id);
                        this.rental_points.splice(i, 1)
                    });
            },
            addRentalPoint() {
                console.log(this.rental_point);
                this.axios
                    .post('/api/rental_points', this.rental_point)
                    .then(response => {
                        let new_point = response.data;
                        this.rental_points.push(new_point)
                    });
            }
        }
    }
</script>
