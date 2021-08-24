<template>

    <div class="container p-5">
        <h3 class="text-center mt-2 mb-5">home</h3>
        <div class="col-md-12">

            <div v-if="user.name">
                <p>name: {{ user.name }}</p>
                <p>email: {{ user.email }}</p>
                <button class="btn btn-danger" @click="logout">Logout</button>
            </div>

        </div>
    </div>

</template>
<script>

    import axios from 'axios'

    export default {

        data(){
            return {
                user: []
            }
        },
        created() {
            axios.post('auth/init').then((resp)=>{
                console.log(resp);
                console.log(resp.data.user);
                this.user = resp.data.user;
                console.log(this.user);
                if (this.user == null) {
                    this.$router.push({ name: 'login' });
                }
            }).catch((e)=>{
                console.log('error:');
                console.log(e);
                this.$router.push({ name: 'login' });
            });
        },
        methods:{
            //user login function and api call
            registration(){

                axios
                    .post('auth/login',this.form)
                    .then((resp) =>{
                        console.log(resp["data"]["status"]);
                        //this.loadlist();
                        //reset form
                        this.form.email = '';
                        this.form.password = '';
                        axios.post('auth/init').then((resp)=>{console.log(resp)});
                    })
                    .catch((e)=>{
                        console.log(e);
                    })
            },
            logout() {
                axios
                    .post('/auth/logout')
                    .then((resp) =>{
                        console.log(resp);
                        this.$router.push({ name: 'login' });
                    })
                    .catch((e)=>{
                        console.log(e);
                    })
            }
        }

    }
</script>
