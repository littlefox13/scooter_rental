<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser">

                    <div class="form-group">
                        <label>name</label>
                        <input type="text" class="form-control" v-model="user.name" value="user.name">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" v-model="user.email" value="user.email">
                    </div>

                    <div class="form-group">
                        <label>Role:</label>
                        <select class='form-control' v-model='user.role_id'>
                            <option v-for='role in roles'  :value='role.id'>{{ role.description }}</option>
                        </select>
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
                user: {},
                roles: {}
            }
        },
        created() {
            this.axios
                .get(`/api/users/${this.$route.params.id}`)
                .then((res) => {
                    this.user = res.data.user;
                    this.roles = res.data.roles;
                    console.log(res.data);
                });
        },
        methods: {
            updateUser() {
                this.axios
                    .patch(`/api/users/${this.$route.params.id}`, this.user)
                    .then((res) => {
                        this.$router.push({ name: 'users' });
                    });
            }
        }
    }
</script>
