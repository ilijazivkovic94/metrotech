<template>
    <div class="container flex flex-column align-items-center" style="display: flex;">
        <div class="auth_label">
            <router-link :to="{name: 'home'}">
                <img style="
                    width: 191px;
                    margin-top: 20px;
                    margin-bottom: 20px;" :data-src="'/assets/images/metro_logo.jpg'"
                     :src="'/assets/images/logo.png'">
            </router-link>
        </div>
        <div class="auth_panel">
            <div class="panel-title">
                <h3>Sign UP</h3>
            </div>
            <div class="">
                <!-- Register Form -->
                <form action="#" name="register-form" id="register-form" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Email<span class='input_note'> *</span></label>
                                <input type="email" name="email" class="form-control" v-model="userInfo.email"
                                       placeholder="Enter your email address..." required>
                                <span class="text-danger">{{errors.email}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Name<span class='input_note'> *</span></label>
                                <input type="text" name="user_name" class="form-control" v-model="userInfo.user_name"
                                       placeholder="Enter user name..." required>
                                <span class="text-danger">{{errors.user_name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name<span class='input_note'> *</span></label>
                                <input type="text" name="first_name" class="form-control" v-model="userInfo.first_name"
                                       placeholder="Enter user first name..." required>
                                <span class="text-danger">{{errors.first_name}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name<span class='input_note'> *</span></label>
                                <input type="text" name="last_name" class="form-control" v-model="userInfo.last_name"
                                       placeholder="Enter user last name..." required>
                                <span class="text-danger">{{errors.last_name}}</span>
                            </div>
                        </div>
                    </div>
                    <template v-if="leagueId == 85 || tourId == 40"> <!--NFL-->
                        <div class="row">
<!--                            <div class="col-md-6">-->
<!--                                <div class="form-group">-->
<!--                                    <label>School<span class='input_note'> *</span></label>-->
<!--                                    <input type="text" name="school" class="form-control" v-model="userInfo.school"-->
<!--                                           placeholder="Enter School Name..." required>-->
<!--                                    <span class="text-danger">{{errors.school}}</span>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Xbox Tags<span class='input_note'> *</span></label>
                                    <input type="text" name="xbox" class="form-control" v-model="userInfo.xbox"
                                           placeholder="Enter Xbox..." required>
                                    <span class="text-danger">{{errors.xbox}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>D.O.B<span class='input_note'> *</span></label>
                                    <input type="text" name="d_o_b" class="form-control"
                                           v-model="userInfo.d_o_b" placeholder="Enter D.O.B..." required>
                                    <span class="text-danger">{{errors.d_o_b}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organization<span class='input_note'> *</span></label>
                                    <input type="text" name="organization" class="form-control"
                                           v-model="userInfo.organization" placeholder="Enter Organization..." required>
                                    <span class="text-danger">{{errors.organization}}</span>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else-if="leagueId == 89 || leagueId == 90">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>D.O.B<span class='input_note'> *</span></label>
                                    <input type="text" name="d_o_b" class="form-control"
                                           v-model="userInfo.d_o_b" placeholder="Enter D.O.B..." required>
                                    <span class="text-danger">{{errors.d_o_b}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Registration Code<span class='input_note'> *</span></label>
                                    <input type="text" name="registration_code" class="form-control"
                                           v-model="userInfo.registration_code" placeholder="Enter Registration Code..." required>
                                    <span class="text-danger">{{errors.registration_code}}</span>
                                </div>
                            </div>
                            <template v-if="leagueId == 90"> <!--NBA league-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PSN ID<span class='input_note'> *</span></label>
                                        <input type="text" name="psn_id" class="form-control" v-model="userInfo.psn_id"
                                               placeholder="Enter PSN ID..." required>
                                        <span class="text-danger">{{errors.psn_id}}</span>
                                    </div>
                                </div>
                            </template>
                            <template v-else-if="leagueId == 89"> <!--MADDEN League-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Xbox Tags<span class='input_note'> *</span></label>
                                        <input type="text" name="xbox" class="form-control" v-model="userInfo.xbox"
                                               placeholder="Enter Xbox..." required>
                                        <span class="text-danger">{{errors.xbox}}</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template v-else>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>School<span class='input_note'> *</span></label>
                                    <input type="text" name="school" class="form-control" v-model="userInfo.school"
                                           placeholder="Enter School Name..." required>
                                    <span class="text-danger">{{errors.school}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Grade<span class='input_note'> *</span></label>
                                    <input type="text" name="grade" class="form-control" v-model="userInfo.grade"
                                           placeholder="Enter Grade..." required>
                                    <span class="text-danger">{{errors.grade}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organization<span class='input_note'> *</span></label>
                                    <input type="text" name="organization" class="form-control"
                                           v-model="userInfo.organization" placeholder="Enter Organization..." required>
                                    <span class="text-danger">{{errors.organization}}</span>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="form-group">
                        <label>Your Password<span class='input_note'> *</span></label>
                        <input type="password" name="pwd" class="form-control" v-model="userInfo.password"
                               placeholder="Enter your password..." required>
                        <span class="text-danger">{{errors.password}}</span>
                    </div>
                    <div class="form-group">
                        <label>Repeat Password<span class='input_note'> *</span></label>
                        <input type="password" name="repeat_pwd" class="form-control" v-model="userInfo.repeat_password"
                               placeholder="Repeat your password..." required>
                        <span class="text-danger">{{errors.repeat_password}}</span>
                    </div>
                    <div class="form-group">
                        <vue-recaptcha
                            :sitekey="siteKey"
                            :theme="'dark'"
                            ref="recaptcha"
                            @verify="onVerify"
                        ></vue-recaptcha>
                        <span class="text-danger">{{errors.recaptcha}}</span>
                    </div>
                    <div class="form-group">
                        <label class="checkbox checkbox-inline terms_policy_check_wrap">
                            <input type="checkbox" id="accept_terms" required v-model="accpeted">
                            <span class="checkbox-indicator"></span>
                            <span
                                class="terms_policy_span">I consent give permission to participate in this league</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="checkbox checkbox-inline terms_policy_check_wrap">
                            <input type="checkbox" id="accept_parent" required v-model="accpeted_parent">
                            <span class="checkbox-indicator"></span>
                            <span
                                class="terms_policy_span">Parent / Guardian consent</span>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Name<span class='input_note'> *</span></label>
                                <input type="text" name="parent_full_name" class="form-control" v-model="userInfo.parent_full_name"
                                       placeholder="Enter Parent Full Name..." required>
                                <span class="text-danger">{{errors.parent_full_name}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Email<span class='input_note'> *</span></label>
                                <input type="text" name="parent_email" class="form-control" v-model="userInfo.parent_email"
                                       placeholder="Enter Parent/Guardian Email Address..." required>
                                <span class="text-danger">{{errors.parent_email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-primary-inverse btn-sm btn-block" style="color: white;" id='sign_up'
                           @click.prevent="signup">Create Your Account</a>
                    </div>
                </form>
                <!-- Register Form / End -->
            </div>
        </div>
    </div>
</template>

<script>
    import pfetch from "../pfetch/pfetch";
    import VueRecaptcha from 'vue-recaptcha';


    export default {
        name: "DBRegister",
        components: {
            VueRecaptcha
        },
        data: () => ({
            siteKey: process.env.MIX_CAPTCHA_KEY,
            userInfo: {
                email: '',
                password: '',
                user_name: '',
                first_name: '',
                last_name: '',
                school: '',
                grade: '',
                organization: '',
                repeat_password: '',
                xbox:'',
                d_o_b:'',
                remember: '',
                parent_email: '',
                parent_full_name: '',
                registration_code: '',
                psn_id:''
            },
            recaptcha: '',
            has_error: false,
            accpeted: false,
            accpeted_parent: false,
            registering: false,
            errors: {
                email: '',
                user_name: '',
                first_name: '',
                last_name: '',
                school: '',
                grade: '',
                organization: '',
                password: '',
                repeat_password: '',
                recaptcha: '',
                parent_full_name: '',
                parent_email: '',
                xbox:'',
                d_o_b:'',
                registration_code: '',
                psn_id:''
            },
            cssPlugins: [],
            jsPlugins: ['https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit']
        }),
        computed: {
              leagueId(){
                  return this.$route.query.flag !== 'tour' ?this.$route.params.entity_id : 0;
              },
              tourId(){
                  return this.$route.query.flag === 'tour' ? this.$route.params.entity_id : 0
              }
        },
        created() {
            this.cssPlugins.map(item => {
                const plugin = document.createElement("link");
                plugin.setAttribute(
                    "href",
                    item
                );
                plugin.setAttribute(
                    "rel",
                    'stylesheet'
                );
                plugin.async = true;
                document.head.appendChild(plugin);
            });
            this.jsPlugins.map(item => {
                const plugin = document.createElement("script");
                plugin.setAttribute(
                    "src",
                    item
                );
                plugin.async = true;
                document.head.appendChild(plugin);
            });
        },
        methods: {
            onVerify: function (response) {
                this.recaptcha = response;
            },
            async signup() {
                if (this.registering) return false;
                const url = 'https://doctorbattles.com/api/auto_join_sign';
                const data = this.userInfo;
                if (this.leagueId > 0){
                    data.league_id = this.$route.params.entity_id;
                    if (this.leagueId == 89 || this.leagueId == 90){
                        if (this.userInfo.registration_code !== '' && this.userInfo.registration_code !== '958672'){
                            alert("Invalid Registration Code");
                            return;
                        }
                    }
                }else{
                    data.tour_id = this.$route.params.entity_id;
                }
                if (this.has_error) {
                    data.recaptcha = this.recaptcha;
                }
                if (!this.accpeted) {
                    alert('Please Accept our Terms & Policy');
                    return false;
                }
                if (!this.accpeted_parent) {
                    alert('Please Accept Parent/Guardian');
                    return false;
                }
                var that = this;
                this.registering = true;
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: async function (res) {
                        that.errors.email = '';
                        that.errors.first_name = '';
                        that.errors.last_name = '';
                        that.errors.user_name = '';
                        that.errors.school = '';
                        that.errors.grade = '';
                        that.errors.organization = '';
                        that.errors.password = '';
                        that.errors.repeat_password = '';
                        that.errors.recaptcha = '';
                        that.errors.parent_full_name = '';
                        that.errors.registration_code = '';
                        that.errors.psn_id = '';
                        that.errors.xbox = '';
                        that.errors.parent_email = '';
                        if (res) {
                            if (res.status && res.status === 'error'){
                                alert(res.response_txt);
                                return ;
                            }
                            if (res.error) {
                                that.registering = false;
                                that.has_error = true;
                                if (res.error.email) that.errors.email = res.error.email[0];
                                if (res.error.user_name) that.errors.user_name = res.error.user_name[0];
                                if (res.error.first_name) that.errors.first_name = res.error.first_name[0];
                                if (res.error.last_name) that.errors.last_name = res.error.last_name[0];
                                if (res.error.school) that.errors.school = res.error.school[0];
                                if (res.error.grade) that.errors.grade = res.error.grade[0];
                                if (res.error.organization) that.errors.organization = res.error.organization[0];
                                if (res.error.psn_id) that.errors.psn_id = res.error.psn_id[0];
                                if (res.error.xbox) that.errors.xbox = res.error.xbox[0];
                                if (res.error.registration_code) that.errors.registration_code = res.error.registration_code[0];
                                if (res.error.password) that.errors.password = res.error.password[0];
                                if (res.error.repeat_password) that.errors.repeat_password = res.error.repeat_password[0];
                                if (res.error.recaptcha) {
                                    that.errors.recaptcha = res.error.recaptcha[0];
                                    that.$refs.recaptcha.reset();
                                }
                                if (res.error.parent_full_name) that.errors.parent_full_name = res.error.parent_full_name[0];
                                if (res.error.parent_email) that.errors.parent_email = res.error.parent_email[0];
                            } else if (res.status === 'OK') {
                                let metro_regist = 'api/register_metro';
                                data._token = $('meta[name="csrf-token"]').attr('content');
                                let metro_res = await pfetch(metro_regist, {
                                    method: "POST",
                                    body: data
                                });
                                if (metro_res) {
                                    alert('Congratulations! You have successfully joined our league, powered by Doctor Battles.');
                                    location.href = '/';
                                }
                                // return that.$router.push({name:'home'});
                            } else if (res.access_token) {
                                location.href = that.$route.params.redirect_uri + '?token=' + res.access_token;
                            }
                        }
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
        },
        destroyed() {
            this.jsPlugins.map(item => {
                console.log(item);
                document.querySelector('script[src="' + item + '"]').remove();
            });
            this.cssPlugins.map(item => {
                document.querySelector('link[href="' + item + '"]').remove();
            })
        }
    }
</script>

<style scoped lang="scss">
    .container {
        display: flex;
        flex-flow: column;
        align-items: center;
        justify-content: center;

        .auth_panel {
            min-width: 427px;
            margin: 0 auto;
            border: solid 1px #324475;
            padding: 60px;
            background: #324475;
            box-shadow: 0 0 8px 1px #21212199;
            border-radius: 4px;

            label {
                color: white;
            }

            .panel-title {
                h3 {
                    text-transform: uppercase;
                    font-style: normal;
                    color: white;
                    text-align: center;
                    letter-spacing: 4px;
                }

                div {
                    font-style: oblique;
                    text-transform: capitalize;
                }
            }

            .form-group {
                margin-bottom: 10px;
            }

            .input_note {
                color: #ce5252;
                font-weight: bold;
            }

            .auth_label {
                a {
                    text-decoration: none;
                    font-style: normal;
                }

                span {
                    color: white;
                }

                span:last-child {
                    color: #eb2b44;
                }
            }

            .auth_panel_footer {
                font-size: 13px;
                display: flex;

                span {
                    color: white;
                    font-weight: bold;
                    text-indent: 2em;
                }

                a {
                    flex: 1;
                    text-align: right;
                }
            }

            .terms_policy_check_wrap {
                display: flex;
                align-items: center;

                .terms_policy_span {
                    line-height: 14px;
                    font-size: 12px;
                    font-style: normal;
                    letter-spacing: 1px;
                    font-weight: normal;
                    text-transform: initial;
                }
            }
        }

        @media only screen and (max-width: 500px) {
            .auth_panel {
                padding: 60px 10px 60px 10px;
            }
        }
    }

</style>
