<template>
    <div>
        <h2 class="text-center">Users List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ roles[user.role_id]['description'] }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'user_edit', params: { id: user.id }}" class="btn btn-success">Edit</router-link>
<!--                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button> -->
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                users: [],
                roles: []
            }
        },
        created() {
            this.axios
                .get('/api/users/')
                .then(response => {
                    this.users = response.data.users;
                    this.roles = response.data.roles;
                    console.log(this.roles);
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
            }
        }
    }
</script>
