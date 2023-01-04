<template>
    <div class="main-content-wrap">
        <div class="main-slider-section" v-if="homePages.slider">
            <div class="main-slider">
                <div id="main-slider" class="carousel slide" data-ride="carousel" data-interval="4000"
                     style="height: 600px;">
                    <div class="carousel-inner" role="listbox">
                        <div v-for="(slider, index) in sliders" :key="slider.id" class="item"
                             :class="{ 'active': index === 0 }"
                             :style="{ backgroundImage: `url(storage/img/slider/${slider.image_link})` }">
                            <div class="main-slider-caption">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="match-date">{{slider.desc}}</div>
                                            <div class="team">{{slider.slider_name}}</div>
                                            <div class="booking">
                                                <a :href="slider.button_link" target="_blank" class="btn  small">
                                                    {{slider.button_text}}
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="nav-arrow left-arrow" href="#main-slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only"></span>
                    </a>
                    <a class="nav-arrow right-arrow" href="#main-slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only"></span>
                    </a>

                    <div class="event-nav" style="bottom: 100px;">
                        <div class="container">
                            <div class="row no-gutter carousel-indicators">
                                <div v-for="(slider, index) in sliders" :key="slider.id" class="col-sm-4"
                                     :class="{ 'active': index === 0 }" :data-slide-to="index"
                                     data-target="#main-slider">
                                    <a href="#" class="nav-item">
                                        <span class="championship">{{slider.indicator_text}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--MAIN TEAM STORE BEGIN-->

        <section class="main-team-store" v-if="homePages.learning">

            <!--MAIN TEAM STORE CONTAINER BEGIN-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{homePages.learnging_desc}}</p>
                    </div>
                </div>
            </div>
            <!--MAIN TEAM STORE CONTAINER END-->

            <!--MAIN TEAM STORE LIST BEGIN-->
            <div class="main-store-list">
                <div class="container">
                    <div class="tab-content">
                        <div id="new" class="tab-pane fade in active">
                            <div class="row">
                                <div v-for="(learning, index) in learnings" :key="learning.id"
                                     class="col-md-3 col-sm-6">
                                    <div class="store-list-item">
                                        <div>
                                            <div class="team-container">
                                                <p class="custom-content">{{learning.title}}</p>
                                                <img :src="'storage/img/learning/' + learning.image_link"
                                                     class="team-image">
                                            </div>
                                            <div class="info">
                                                <span class="name">{{learning.indicator_text}}</span>
                                                <div class="btn-wrap">
                                                    <a :href="learning.button_link" target="_blank"
                                                       class="btn btn-block small">
                                                        {{learning.button_text}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--MAIN TEAM STORE LIST END-->
            <!--MAIN TEAM STORE END-->
            <section class="partners" style="margin-bottom: 45px;" v-if="homePages.home_video">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <div style="color: white; background-color: black;">

                                <div v-for="(video, index) in homeVideo" :key="video.id"
                                     style="height: 0px;  padding-bottom: 56.7%;">
                                    <video tabindex="-1" class="video-stream html5-main-video"
                                           :src="'storage/img/homevideo/' + video.video_file_link"
                                           style="width: calc(100% - 30px);height: 100%;position: absolute;left: 15px;"
                                           loop muted controls autoplay>
                                        <source :src="'storage/img/homevideo/' + video.video_file_link"
                                                type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--MAIN SPONSOR SLIDER BEGIN-->
            <div class="main-sponsor-slider-background" v-if="homePages.team">
                <div class="container">
                    <div class="row">
                        <h5>{{homePages.team_title}}</h5>
                        <p>{{homePages.team_desc}}</p>
                        <div class="booking">
                            <a :href="homePages.team_btn_link">{{homePages.team_btn_text}}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div v-for="(team, index) in teams" :key="team.id"
                             class="col-md-3 col-sm-6  text-center sponsor-icons-wrapper">
                            <div>
                                <img :src="'storage/img/team/' + team.image_link" class="sponsor-icons-custom"
                                     alt="team image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--MAIN SPONSOR SLIDER END-->

        </section>


        <!--MAIN TEAM STORE END-->
        <section class="partners" v-if="homePages.partner">
            <div class="container">
                <div class="row">
                    <h4 class="text-center-on-mb">{{homePages.partner_title}}</h4>
                    <div v-for="(partner, index) in partners" :key="partner.id"
                         class="col-md-3 col-sm-6  text-center sponsor-icons-wrapper">
                        <a :href="partner.partner_link" target="_blank">
                            <img :src="'storage/img/partner/' + partner.image_link" class="sponsor-icons-custom"
                                 alt="partner image">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import pfetch from "../pfetch/pfetch";

    export default {
        name: "Home",
        data() {
            return {
                homePages: {},
                sliders: {},
                learnings: {},
                homeVideo: {},
                teams: {},
                partners: {},
            }
        },
        created() {
            this.getHomepages();
            this.getSliders();
            this.getlearningss();
            this.getHomeVideo();
            this.getTeams();
            this.getPartners();
        },
        methods: {
            async getHomepages() {
                const url = 'v1/homepages';
                const res = await pfetch(url);
                if (res) {
                    this.homePages = (res);
                    console.log(this.homePages);
                }
            },
            async getSliders() {
                const url = 'v1/sliders/get_data';
                const res = await pfetch(url);
                if (res) {
                    this.sliders = res;
                }
            },
            async getlearningss() {
                const url = 'v1/learnings/get_data';
                const res = await pfetch(url);
                if (res) {
                    this.learnings = res;
                }
            },
            async getHomeVideo() {
                const url = 'v1/homeVideo';
                const res = await pfetch(url);
                if (res.data) {
                    this.homeVideo = res.data;
                }
            },
            async getTeams() {
                const url = 'v1/teams/get_data';
                const res = await pfetch(url);
                if (res) {
                    this.teams = res;
                }
            },
            async getPartners() {
                const url = 'v1/partners/get_data';
                const res = await pfetch(url);
                if (res) {
                    this.partners = res;
                }
            },
        }
    }
</script>

<style scoped>
    @import '../../../sass/theme/css/classes.css';
</style>
