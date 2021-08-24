<template>

    <div class="container p-5">
        <h3 class="text-center mt-2 mb-5">login</h3>
        <div class="col-md-12">

            <form v-on:submit.prevent="login">

                <div class="mb-3">
                    <label class="form-label">Enter Email</label>
                    <input type="text" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" v-model="form.email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter Password</label>
                    <input type="password" name="password" class="form-control" aria-describedby="passHelp" placeholder="Enter Password" v-model="form.password">
                </div>


                <button type="submit" class="btn btn-primary mt-5">Submit</button>

                <router-link to="/register" class="nav-item nav-link">Register</router-link>
            </form>
        </div>
    </div>

</template>
<script>

    import axios from 'axios'

    export default {

        data(){
            return {

                form:{
                    email: '',
                    password: ''

                }
            }
        },
        created() {
            axios.post('auth/init').then((resp)=>{
                console.log(resp);
                console.log(resp.data.user);
                this.user = resp.data.user;
                console.log(this.user);
                if (this.user != null) {
                    this.$router.push({ name: 'home' });
                }
            }).catch((e)=>{
                console.log('error:');
                console.log(e);
            });
        },
        methods:{
            //user login function and api call
            login(){

                axios
                    .post('auth/login',this.form)
                    .then((resp) =>{
                        console.log(resp["data"]["status"]);
                        //this.loadlist();
                        //reset form
                        this.form.email = '';
                        this.form.password = '';
                        axios.post('auth/init').then((resp)=>{console.log(resp)});
                        this.$router.push({ name: 'home' });
                    })
                    .catch((e)=>{
                        console.log(e);
                    })
            }
        }

    }
</script>
