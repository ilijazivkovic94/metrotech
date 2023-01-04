<template>
    <div class="container" style="display: flex;flex: 1;justify-content: center;">
<!--        <h1>Login</h1>-->
<!--        <div>-->
<!--            <div class="alert alert-danger" v-if="error">-->
<!--                <p>There was an error, unable to sign in with those credentials.</p>-->
<!--            </div>-->
<!--            <form autocomplete="off" @submit.prevent="login" method="post">-->
<!--                <div class="form-group">-->
<!--                    <label for="email">E-mail</label>-->
<!--                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email"-->
<!--                           required>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="password">Password</label>-->
<!--                    <input type="password" id="password" class="form-control" v-model="password" required>-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-default">Sign in</button>-->
<!--            </form>-->
<!--        </div>-->
        <button class="btn btn-warning" @click="signinwithDoctorbattles" style="margin-top: 20px;">Sign in with Doctor Battles</button>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Login",
        data() {
            return {
                email: null,
                password: null,
                error: false
            }
        },
        methods: {
            login() {
                var app = this
                axios
                    .post('auth/login', {
                        email: app.email,
                        password: app.password
                    })
                    .then(res => res.data)
                    .then(data => {
                        if(data.status == 'success') {
                            window.location.href = "/home";
                        }
                    }).catch(err => console.log(err));
            },
            signinwithDoctorbattles() {
                var app = this
                window.location.href = '/signin_with_doctorbattles'
            }
        }
    }
</script>

<style scoped>

</style>
