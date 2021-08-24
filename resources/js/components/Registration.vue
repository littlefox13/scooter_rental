<template>

    <div class="container p-5">
        <h3 class="text-center mt-2 mb-5">Registration</h3>
        <div class="col-md-12">

            <form v-on:submit.prevent="login_user">

                <div class="mb-3">
                    <label class="form-label">Enter Name</label>
                    <input type="text" name="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name" v-model="form.name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Enter Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" v-model="form.email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPass1" aria-describedby="passHelp" placeholder="Enter Password" v-model="form.password">
                </div>

                <div class="mb-3">
                    <label class="form-label">re-Enter Password</label>
                    <input type="password" name="password" class="form-control" aria-describedby="passHelp" placeholder="Enter Password" v-model="form.password_confirmation">
                </div>


                <button type="submit" class="btn btn-primary mt-5">Submit</button>
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
            login_user(){

                axios
                    .post('auth/register',this.form)
                    .then((resp) =>{
                        console.log(resp["data"]["status"]);
                        //this.loadlist();
                        //reset form
                        this.form.name = '';
                        this.form.email = '';
                        this.form.password = '';
                        this.form.password_confirmation = '';
                        axios.post('auth/init').then((resp)=>{console.log(resp)});
                        this.$router.push({ name: 'login' });
                    })
                    .catch((e)=>{
                        console.log(e);
                    })
            }
        }

    }
</script>
