<template>
    <div class="vue-app-container">
        <div class="container-fluid" style="padding: 0">
            <div class="row">
                <div class="col-md-12">
                    <div id="video_container1">
                        <div class="video-container">
                            <iframe title="YouTube video player"
                                    src="https://www.youtube.com/embed/PGKkRxnyKDs?autoplay=1&amp;controls=0&amp;rel=0&amp;playsinline=1&amp;enablejsapi=1&amp;origin=https%3A%2F%2Flocalhost&amp;widgetid=1&amp;mute=1"
                                    id="widget2" __idm_id__="296052738"
                                    allowfullscreen="true" webkitallowfullscreen="true"
                                    mozallowfullscreen="true"></iframe>
                        </div>
                        <div class="inner">
                            <h3>Apart-But-Together Atlantic City Esports League (#MetroACLeague)</h3>
                            <h6>Powered By Logitech!</h6>
                            <!--                            <div class="booking"><a href="#register">Register</a></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="broadcast_container">
                                <div class="title">
                                    <h3>Live Broadcast</h3>
                                </div>
                                <div id="twitch-embed">

                                </div><! Load the Twitch embed script -->
        <!--<script src="https://embed.twitch.tv/embed/v1.js">
        </script> &lt;!&ndash; Create a Twitch.Embed object that will render within the "twitch-embed" root element. &ndash;&gt;
        <script type="text/javascript">
            var embed = new Twitch.Embed("twitch-embed", {
                width: '100%',
                height: 480,
                channel: "MetroEsportsLIVE",
                // only needed if your site is also embedded on embed.example.com and othersite.example.com
                parent: ["embed.example.com", "othersite.example.com"]
            });

            embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
                var player = embed.getPlayer();

                player.setMuted(true);
            });
        </script>-->
        <!-- <div class="bottom-bar">
         </div>
     </div>
 </div>
</div>
</div>-->
        <section id="how-work">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>How it works</h1>
                        <p>Students enrolled in schools within the Atlantic City School District can register for
                            friendly competition in our professional Esports League specifically designed for
                            students.</p>
                        <!--                        <p>Competition runs from April X to June X, comprising of X contests per week.</p>-->
                        <!--                        <p>Playoffs will begin on X date, with the top performers in each division crowned as champions on June X.</p>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h2>🧑 Join!</h2>
                        <div class="elementor-divider">
              <span class="elementor-divider-separator">
              </span>
                        </div>
                        <p>Register in one of the featured games.</p>
                    </div>
                    <div class="col-md-4">
                        <h2>🎮 Compete!</h2>
                        <div class="elementor-divider">
              <span class="elementor-divider-separator">
              </span>
                        </div>
                        <p>Play in a one-week preseason, followed by an x-week season.</p>
                    </div>
                    <div class="col-md-4">
                        <h2>🏆 Win!</h2>
                        <div class="elementor-divider">
              <span class="elementor-divider-separator">
              </span>
                        </div>
                        <p>The top ranked players during the seasons compete in the playoffs to take the crown.</p>
                    </div>
                </div>
                <div class="row"
                     style="flex: 1; display: flex; flex-direction: row; justify-content: center; margin-top: 30px; margin-bottom: 30px;flex-wrap: wrap">
                    <div class="col-md-3 col-sm-6" style="margin-left: 10px;margin-right: 10px;">
                        <div class="store-list-item">
                            <div>
                                <div class="team-container">
                                    <p class="custom-content" style="margin-bottom: 10px!important;">Join the LEAGUE</p>
                                    <h6 style="text-align: center;font-weight: bold;">XBOX</h6>
                                    <img src="/assets/images/imgs/Madden.jpg"
                                         class="team-image">
                                </div>
                                <div class="info">
                                    <span class="name">AC: MADDEN SEASON I</span>
                                    <div class="btn-wrap">
                                        <router-link class="btn btn-block small"
                                                     :to="{name:'db_register',params:{'entity_id': 89}}">REGISTER
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" style="margin-left: 10px;margin-right: 10px;">
                        <div class="store-list-item">
                            <div>
                                <div class="team-container">
                                    <p class="custom-content" style="margin-bottom: 10px!important;">Join the LEAGUE</p>
                                    <h6 style="text-align: center;font-weight: bold;">PS4</h6>
                                    <img src="/assets/images/imgs/NBA.jpg"
                                         class="team-image">
                                </div>
                                <div class="info">
                                    <span class="name">AC: NBA 2K SEASON I</span>
                                    <div class="btn-wrap">
                                        <router-link class="btn btn-block small"
                                                     :to="{name:'db_register',params:{'entity_id': 90}}">REGISTER
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="ac_league_selection">-->
                    <!--                        <select v-model="leagueId">-->
                    <!--                            <option value="89">AC: MADDEN SEASON I</option>-->
                    <!--                            <option value="90">AC: NBA 2K SEASON I</option>-->
                    <!--                        </select>-->
                    <!--                    </div>-->
                    <!--                    <a class="btn btn-outline-success btn-transparent moving-inner" @click.prevent="joinLeague" style="text-shadow: 3px 1px 2px black;">Register!</a>-->
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <h2 style="color: black;">Powered By:</h2>
                        <a href="https://doctorbattles.com/parent_league/profile/leagues/36" target="_blank">
                            <img width="100%" style="max-width: 470px;margin-top: 24px;" alt=""
                                 data-srcset="https://metrotech.gg/assets/images/bg-banner/adjusted.png 470w, https://metrotech.gg/assets/images/bg-banner/adjusted.png 300w, https://metrotech.gg/assets/images/bg-banner/adjusted.png 20w"
                                 data-src="https://metrotech.gg/assets/images/bg-banner/adjusted.png"
                                 data-sizes="(max-width: 470px) 100vw, 470px"
                                 class="attachment-large size-large lazyloaded"
                                 src="https://metrotech.gg/assets/images/bg-banner/adjusted.png"
                                 sizes="(max-width: 470px) 100vw, 470px"
                                 srcset="https://metrotech.gg/assets/images/bg-banner/adjusted.png 470w, https://metrotech.gg/assets/images/bg-banner/adjusted.png 300w, https://metrotech.gg/assets/images/bg-banner/adjusted.png 20w">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured_games">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="https://doctorbattles.com/parent_league/profile/leagues/36">
                            <h1 style="text-align: center;" target="_blank"> View League Schedule, Standings, and Chat </h1>
                        </a>
                        <div class="game_container"
                             style="flex: 1; display: flex; flex-direction: row;flex-wrap: wrap;justify-content: space-around; margin: auto; with: 80%; margin-top: 50px">
                            <div class="item">
                                <h5 style="text-align: center">XBOX</h5>
                                <a href=" https://doctorbattles.com/league/profile/front_page/89">
                                    <img title="Madden" alt="Madden"
                                         data-src="https://metrotech.gg/assets/images/imgs/Madden.jpg"
                                         class=" ls-is-cached lazyloaded"
                                         src="https://metrotech.gg/assets/images/imgs/Madden.jpg">
                                </a>
                            </div>
                            <div class="item">
                                <h5 style="text-align: center">PS4</h5>
                                <a href=" https://doctorbattles.com/league/profile/front_page/90">
                                    <img title="Madden" alt="Madden"
                                         data-src="https://metrotech.gg/assets/images/imgs/NBA.jpg"
                                         class=" ls-is-cached lazyloaded"
                                         src="https://metrotech.gg/assets/images/imgs/NBA.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="competition_format">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Competition Format</h3>
                        <div class="sub_item">
                            <h6>Ranking System</h6>
                            <p>Players will be ranked based on a win loss record. Season matches are 1 game 5 minute
                                quarters/ periods. </p>
                        </div>
                        <div class="sub_item">
                            <h6>Playoffs</h6>
                            <p>The playoffs will start at the end of the season, and will consist of a single
                                elimination bracket. The championships will be streamed live, by professional
                                commentators!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="divisions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="element-widget-wrap">
                            <h1>Divisions</h1>
                            <ul id="eael-feature-list-0224e62" class="eael-feature-list-items square stacked ">
                                <!--
                                    <li class="eael-feature-list-item">
                                        <div class="eael-feature-list-icon-box">
                                            <div class="eael-feature-list-icon-inner">
                                                <span class="eael-feature-list-icon">
                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="eael-feature-list-content-box">
                                            <h3 class="eael-feature-list-title">Elementary School</h3>
                                            <p class="eael-feature-list-content">3rd Grade, 4th Grade, 5th Grade</p>
                                        </div>
                                    </li> -->
                                <li class="eael-feature-list-item">
                                    <div class="eael-feature-list-icon-box">
                                        <div class="eael-feature-list-icon-inner">
                                            <span class="eael-feature-list-icon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="eael-feature-list-content-box">
                                        <h3 class="eael-feature-list-title">Middle School</h3>
                                        <p class="eael-feature-list-content">6th Grade, 7th Grade, 8th Grade</p>
                                    </div>
                                </li>
                                <li class="eael-feature-list-item">
                                    <div class="eael-feature-list-icon-box">
                                        <div class="eael-feature-list-icon-inner">

                      <span class="eael-feature-list-icon">

                      <i class="fa fa-user-graduate" aria-hidden="true"></i>

                      </span>
                                        </div>
                                    </div>
                                    <div class="eael-feature-list-content-box">
                                        <h3 class="eael-feature-list-title">High School</h3>
                                        <p class="eael-feature-list-content">9th Grade, 10th Grade, 11th Grade, 12th
                                            Grade</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="media_coverage">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Media Coverage</h1>
                        <h3>Live Stream</h3>
                        <p>We will stream featured match-ups during the season using our team of professional
                            broadcasters and commentary. And we will also boost visibility of student content using our
                            social media presence.</p>
                        <h3>Social Media</h3>
                        <p>Use the hashtag “#MetroACLeague” when sharing your own clips and screenshots of your gameplay
                            on Twitter/Instagram/Facebook for a chance to be featured in our official highlight-reels,
                            live-streams, and to qualify for contests!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="media_item">
                            <div class="image">
                                <img
                                    src="https://scontent-iad3-1.xx.fbcdn.net/v/t1.0-9/cp0/94238467_130791418527332_6153343552706314240_n.png?_nc_cat=108&amp;_nc_sid=e007fa&amp;_nc_ohc=evJqpwVW-SsAX_GJ1bf&amp;_nc_ht=scontent-iad3-1.xx&amp;oh=881fd452b022b97760ed91b0721b03ec&amp;oe=5EC2BAC5"
                                    alt="" class="imagelazy img-responsive">
                            </div>

                            <div class="postContentCard">
                                <h4>
                                    <div class="postNetwork" data-network="Facebook" data-network-color="">
                                        <i class="fa fa-facebook" style="color:#3A5795"></i>
                                    </div>
                                    <div class="authorDetails">
                                        <img src="https://graph.facebook.com/108075410798933/picture?type=square" alt=""
                                             data-check="checked">
                                        <div class="postAuthorName" style=" color:#1f1b1b;">
                                            Metro Esports
                                        </div>
                                        <div class="authrHandleTime">
                      <span class="authrHandle" style=" color:#1f1b1b;" target="_blank">
                        @Metro Esports
                      </span>
                                            <div class="sepratedot" style=" color:#1f1b1b;"></div>
                                            <span class="timePost" style=" color:#1f1b1b;">2 months ago</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </h4>
                                <!-- <div class="shareWrapper" data-color="">
                                  <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3&amp;description=+via+%23taggbox" class="fbShare" target="_blank">        <i class="fa fa-share icon" aria-hidden="true">        </i>       </a>              <a href="https://twitter.com/intent/tweet?text=+via+%23taggbox&amp;url=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3" class="twShare" target="_blank">        <i class="fa fa-twitter" aria-hidden="true">        </i>       </a>              <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3&amp;summary=+via+%23taggbox" class="liShare" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true">
                                    </i>
                                  </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media_item">
                            <div class="image">
                                <img src="https://www.instagram.com/p/B_OWeZPp8Qx/media?size=l" alt=""
                                     class="imagelazy img-responsive">
                            </div>

                            <div class="postContentCard">
                                <p>test #MetroACLeague</p>
                                <h4>
                                    <div class="postNetwork" data-network="Facebook" data-network-color="">
                                        <i class="fa fa-instagram" style="color:#cd486b"></i>
                                    </div>
                                    <div class="authorDetails">
                                        <img
                                            src="https://ui-avatars.com/api/?name=Instagram User&amp;background=fff&amp;color=000"
                                            alt="" data-check="checked">
                                        <div class="postAuthorName" style=" color:#1f1b1b;">
                                            Instagram User
                                        </div>
                                        <div class="authrHandleTime">
                      <span class="authrHandle" style=" color:#1f1b1b;" target="_blank">
                        @Instagram User
                      </span>
                                            <div class="sepratedot" style=" color:#1f1b1b;"></div>
                                            <span class="timePost" style=" color:#1f1b1b;">2 months ago</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </h4>
                                <!-- <div class="shareWrapper" data-color="">
                                  <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3&amp;description=+via+%23taggbox" class="fbShare" target="_blank">        <i class="fa fa-share icon" aria-hidden="true">        </i>       </a>              <a href="https://twitter.com/intent/tweet?text=+via+%23taggbox&amp;url=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3" class="twShare" target="_blank">        <i class="fa fa-twitter" aria-hidden="true">        </i>       </a>              <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3&amp;summary=+via+%23taggbox" class="liShare" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true">
                                    </i>
                                  </a>
                                </div> -->
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="media_item">
                            <div class="image">
                                <img
                                    src="https://scontent-iad3-1.xx.fbcdn.net/v/t1.0-9/cp0/94238467_130791418527332_6153343552706314240_n.png?_nc_cat=108&amp;_nc_sid=e007fa&amp;_nc_ohc=evJqpwVW-SsAX_GJ1bf&amp;_nc_ht=scontent-iad3-1.xx&amp;oh=881fd452b022b97760ed91b0721b03ec&amp;oe=5EC2BAC5"
                                    alt="" class="imagelazy img-responsive">
                            </div>

                            <div class="postContentCard">
                                <p>test #MetroACLeague</p>
                                <h4>
                                    <div class="postNetwork" data-network="Facebook" data-network-color="">
                                        <i class="fa fa-twitter" style="color:#00aced"></i>
                                    </div>
                                    <div class="authorDetails">
                                        <img
                                            src="https://pbs.twimg.com/profile_images/1049426237360300033/FOg5UlyW_normal.jpg"
                                            alt="" data-check="checked">
                                        <div class="postAuthorName" style=" color:#1f1b1b;">
                                            rogueyoshi ⚡
                                        </div>
                                        <div class="authrHandleTime">
                      <span class="authrHandle" style=" color:#1f1b1b;" target="_blank">
                        @rogueyoshi_FGC
                      </span>
                                            <div class="sepratedot" style=" color:#1f1b1b;"></div>
                                            <span class="timePost" style=" color:#1f1b1b;">2 months ago</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </h4>
                                <!-- <div class="shareWrapper" data-color="">
                                  <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3&amp;description=+via+%23taggbox" class="fbShare" target="_blank">        <i class="fa fa-share icon" aria-hidden="true">        </i>       </a>              <a href="https://twitter.com/intent/tweet?text=+via+%23taggbox&amp;url=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3" class="twShare" target="_blank">        <i class="fa fa-twitter" aria-hidden="true">        </i>       </a>              <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.facebook.com%2FMetroEsportsUS%2Fphotos%2Fa.130791325194008%2F130791415193999%2F%3Ftype%3D3&amp;summary=+via+%23taggbox" class="liShare" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true">
                                    </i>
                                  </a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div id="archive">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Video Archives</h1>
                    </div>
                </div>

                <!--MAIN TEAM STORE END-->
                <section class="partners" v-if="homePages.partner">
                    <div class="container">
                        <div class="row">
                            <h4 class="text-center-on-mb">{{homePages.partner_title}}</h4>
                            <div v-for="(partner, index) in partners" :key="partner.id"
                                 class="col-md-3 col-sm-6  text-center sponsor-icons-wrapper">
                                <a :href="partner.partner_link" target="_blank">
                                    <img :src="'/storage/img/partner/' + partner.image_link"
                                         class="sponsor-icons-custom"
                                         alt="partner image">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</template>

<script>
    import pfetch from "../pfetch/pfetch";

    export default {
        name: "CompeteAcLeague",
        data() {
            return {
                access_token: null,
                leagueId: 89,
                homePages: {},
                partners: {},
            }
        },
        created() {
            this.getHomepages();
            this.loadToken();
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
            async getPartners() {
                const url = 'v1/partners/get_data';
                const res = await pfetch(url);
                if (res) {
                    this.partners = res;
                }
            },
            async loadToken() {
                const url = 'api/token';
                const res = await pfetch(url);
                if (res.token) {
                    this.access_token = res.token;
                }
            },
            joinLeague(league_id) {
                try {
                    if (!this.access_token) {
                        window.location.href = '/signin_with_doctorbattles';
                        return;
                    }
                    let postData = {
                        league_id: league_id
                    };
                    const url = 'https://doctorbattles.com/api/v1/auto_join_league';
                    console.log(this.access_token);
                    $.ajax({
                        url: url,
                        method: 'POST',
                        dataType: 'json',
                        data: postData,
                        headers: {
                            'Authorization': 'Bearer ' + this.access_token,
                        },
                        success: function (res) {
                            if (res.status != 'OK') {
                                if (res.response_txt) {
                                    alert(res.response_txt);
                                } else {
                                    console.log(res);
                                }
                            } else if (res.response_txt != '') {
                                alert(res.response_txt)
                            }
                        },
                        error: function (e) {
                            console.log(e);
                            if (e.status === 401) {
                                window.location.href = '/signin_with_doctorbattles';
                            }
                        }
                    });
                } catch (e) {
                    console.log(e);
                }
            },
            createAutoTeam(postData, callback) {
                let data = {
                    team_name: postData.team_name,
                    platform_id: 0,
                    game_id: 0,
                    region_id: 0,
                    video_link: "",
                    bio_content: "",
                    file_name: null,
                    banner_image: null,
                    group_id: 0,
                    proceed: 1,
                    league_id: postData.league_id
                };

                $.ajax({
                    url: 'https://doctorbattles.com/api/v1/team_mg/child/join_auto_team',
                    method: 'POST',
                    dataType: 'JSON',
                    data: data,
                    headers: {
                        'Authorization': 'Bearer ' + access_token
                    },
                    success: function (res) {
                        if (res.status == 'OK') {
                            callback();
                        }
                    },
                    error: function () {
                    }
                })
            }
        }
    }
</script>

<style scoped lang="scss">
    @import '../../../sass/theme/css/compete-ac-league.css';

    .ac_league_selection {
        margin-bottom: 20px;

        select {
            padding: 15px 10px;
            border: 1px solid transparent;
            width: 100%;
            background: #fff;
            font-size: 14px;
            color: #666;
            line-height: normal;
            outline: 0;;
        }
    }

    #video_container1 {
        position: relative;
        padding-top: 35%;

        .video-container {
            /* height: 400px; */
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
            height: 100%;

            iframe {
                height: 100%;
            }
        }
    }

    .game_container .item img {
        width: 99%;
    }

    .game_container .item img:hover {
        width: 100%;
    }
</style>
