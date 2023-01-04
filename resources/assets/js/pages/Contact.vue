<template>
    <div class="vue-app-container">
        <section class="classes-image">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-bg-image">
                            <h3>Send us a message.</h3>
                            <span class="sub-title">Questions? Comments?</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="class-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Metro Sports</font></font></h4>
                        <p>1388 West Street Road,<br>Warminster, PA 18974<br><a href="tel:/+1-215-690-5370">215.690.5370</a></p>
                        <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                            <li id="name_container" class="gfield gfield_contains_required field_sublabel_hidden_label field_description_below gfield_visibility_visible mt-2">
                                <label class="gfield_label gfield_label_before_complex mt-2">Name<span class="gfield_required">*</span></label>
                                <div class="ginput_complex ginput_container no_prefix has_first_name no_middle_name has_last_name no_suffix gf_name_has_2 ginput_container_name" id="input_1_1">
                                <span id="first_name_container" class="name_first col-md-6 col-sm-12">
                                    <input type="text" name="first_name" id="first_name" v-model="user_info.first_name" value="" aria-label="First name" aria-required="true" aria-invalid="false" placeholder="First Name">
                                </span>
                                    <span id="last_name_container" class="name_last col-md-6 col-sm-12">
                                    <input type="text" name="last_name" id="last_name" v-model="user_info.last_name" value="" aria-label="Last name" aria-required="true" aria-invalid="false" placeholder="Last Name">
                                </span>
                                </div>
                            </li>
                            <li id="email_container" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible mt-2">
                                <label class="gfield_label mt-2" for="email">Email<span class="gfield_required">*</span></label>
                                <div class="ginput_container ginput_container_email col-md-12 col-sm-12">
                                    <input name="email" id="email" type="text" v-model="user_info.email" value="" class="large" placeholder="Enter Your Email" aria-required="true" aria-invalid="false">
                                </div>
                            </li>
                            <li id="subject_container" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible mt-2">
                                <label class="gfield_label mt-2" for="subject">Subject<span class="gfield_required">*</span></label>
                                <div class="ginput_container ginput_container_text col-md-12 col-sm-12">
                                    <input name="subject" id="subject" type="text" v-model="user_info.subject" value="" class="large" placeholder="Enter a subject" aria-required="true" aria-invalid="false">
                                </div>
                            </li>
                            <li id="message_container" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible mt-2">
                                <label class="gfield_label mt-2" for="message">Message<span class="gfield_required">*</span></label>
                                <div class="ginput_container ginput_container_textarea col-md-12 col-sm-12">
                                    <textarea name="message" id="message" v-model="user_info.message" class="textarea medium" placeholder="Your message" aria-required="true" aria-invalid="false" rows="10" cols="50"></textarea>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" id="gform_submit_button_1" class="btn btn-success" value="Submit" style="color: white;" @click="contactUS">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 subscribe_panel">
                        <form action="https://metroesports.us19.list-manage.com/subscribe/post?u=21514774748f8ac7cf02dd78c&amp;id=87a2953687" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="novalidate">
                            <div id="mc_embed_signup_scroll">
                                <h2 style="font-size: 30px; line-height: 1em;">Sign up for our newsletter! </h2>
                                <p>Find out what’s going on at Metro Esports.</p>
                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
                                    <input type="email" value="" name="EMAIL" v-model="subscribe_info.email" class="required email mce_inline_error" id="mce-EMAIL" style="background: #fff;" aria-required="true" aria-invalid="true">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-FNAME">First Name </label>
                                    <input type="text" value="" v-model="subscribe_info.first_name" name="FNAME" class="" id="mce-FNAME" style="background: #fff;">
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_21514774748f8ac7cf02dd78c_87a2953687" tabindex="-1" value=""></div>
                                <div class="clear"><input type="button" value="Subscribe" @click="subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-success mt-2" style="color: white;"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="class-details">
            <div class="container">
                <div class="row">
                    <h6>Recent Posts</h6>
                        <ul class="list-container">
                           <li>
                                <a href="https://www.ktvn.com/story/42258512/african-american-ceo-brings-inclusion-education-and-esports-to-atlantic-city-nj">African American CEO Brings Inclusion to Education Esports to Atlantic City, NJ</a>
                            </li>
                            <li>
                                <a href="https://metrotech.gg/blog/nflflag-announcement/">Metro Partners with NFL Flag
                                    football for it’s First Ever Online Madden E-Sports Tournament</a>
                            </li>
                            <li>
                                <a href="https://metrotech.gg/blog/metro-esports-inside-the-center/">Metro Esports – Inside
                                    The Center</a>
                            </li>
                        </ul>
                </div>
            </div>
        </section>
        <section class="class-details">
            <div class="container">
                <div class="row">
                    <iframe style="width: 100%; height: 400px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" aria-label="1386 Street Rd, Warminster, PA 18974" class=" lazyloaded" src="https://maps.google.com/maps?q=1386%20Street%20Rd%2C%20Warminster%2C%20PA%2018974&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near"></iframe>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import pfetch from "../pfetch/pfetch";

    export default {
        name: "Contact",
        data() {
            return  {
                user_info: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    subject: '',
                    message: ''
                },
                subscribe_info: {
                    first_name: '',
                    email: ''
                }
            }
        },
        methods: {
            async subscribe() {
                let metro_regist = 'subscribe';
                let data = this.subscribe_info;
                data._token = $('meta[name="csrf-token"]').attr('content');
                let metro_res = await pfetch(metro_regist, {
                    method: "POST",
                    body: data
                });
                if (metro_res) {
                    alert('Thanks for subscribe us!');
                }
            },
            async contactUS() {
                let metro_regist = 'contactus';
                let data = this.user_info;
                data._token = $('meta[name="csrf-token"]').attr('content');
                let metro_res = await pfetch(metro_regist, {
                    method: "POST",
                    body: data
                });
                if (metro_res) {
                    alert('Thanks for contacting us!');
                }
            }
        }
    }
</script>

<style scoped>
    @import '../../../sass/theme/css/classes.css';
</style>
