<template>
    <!--MAIN MENU WRAP BEGIN-->
    <div class="main-menu-wrap sticky-menu">
        <div class="container">
            <a href="#" class="custom-logo-link"><img
                src="/assets/images/bg-banner/MES-Name-No-blue-outline-onfrj8iy5rrmpzfdrpnn2gdoq0s5cqj6ioo2sa2bcw.png"
                alt="logo" class="custom-logo"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#team-menu"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <nav class="navbar">
                <div class="collapse navbar-collapse" id="team-menu">
                    <ul class="main-menu nav">
                        <li v-bind:class="{'active': currentRoute === 'home'}">
                            <router-link :to="{name:'home'}"><span>Home</span></router-link>
                        </li>
                        <li v-bind:class="{'active': ['classes','classes_esports_coding','classes_coding_tech'].indexOf(currentRoute) > -1}">
                            <router-link :to="{name:'classes'}"><span>Facility</span></router-link>
                            <ul>
                                <!--<li><router-link :to="{name:'classes_esports_coding'}"><span>Esports</span></router-link></li>-->
                                <li><router-link :to="{name:'classes_esports_coding'}"><span>Summer Camps</span></router-link></li>
                                <li><router-link :to="{name:'classes_coding_tech'}"><span>Coding & Technology</span></router-link></li>
                                <li><router-link :to="{name:''}"><span>LAN EVENTS</span></router-link></li>
                                <li><router-link :to="{name:''}"><span>Open Gaming</span></router-link></li>
                                <li><router-link :to="{name:''}"><span>Simulators</span></router-link></li>
                            </ul>
                        </li>
                       <!-- <li v-bind:class="{'active': ['pc_console'].indexOf(currentRoute) > -1}">
                            <router-link :to="{name:'compete'}"><span>Open Gaming</span></router-link>
                            <ul>
                                <li><router-link :to="{name:''}"><span>PC & Console</span></router-link></li>
                            </ul>
                        </li>
                        <li v-bind:class="{'active': ['racing', 'flight'].indexOf(currentRoute) > -1}">
                            <router-link :to="{name:'compete'}"><span>Simulators</span></router-link>
                            <ul>
                                <li><router-link :to="{name:''}"><span>Racing</span></router-link></li>
                                <li><router-link :to="{name:''}"><span>Flight</span></router-link></li>
                            </ul>
                        </li> -->
                        
                        <li v-bind:class="{'active': ['compete_ac_league', 'ac_mine_craft'].indexOf(currentRoute) > -1}">
                            <router-link :to="{name:'compete'}"><span>Leagues</span></router-link>
                            <ul>
                                <li><router-link :to="{name:'compete_ac_league'}"><span>AC League</span></router-link></li>
                                <li><router-link :to="{name:'ac_mine_craft'}"><span>AC Minecraft</span></router-link></li>
                            </ul>
                        </li>
                        <li v-bind:class="{'active': ['nfl_flag', 'fight_for_change'].indexOf(currentRoute) > -1}">
                            <router-link :to="{name:'compete'}"><span>Tournaments</span></router-link>
                            <ul>
                                <li v-bind:class="{'active': currentRoute === 'nfl_flag'}"><router-link :to="{name:'nfl_flag'}"><span>NFL FLAG</span></router-link></li>
                                <!--<li><router-link :to="{name:'fight_for_change'}"><span>Fight For Change</span></router-link></li>-->
                            </ul>
                        </li>
                        <!-- <li v-bind:class="{'active': currentRoute === 'nfl_flag'}"><router-link :to="{name:'nfl_flag'}"><span>NFLFLAG</span></router-link></li>
                         -->
                        <!--<li v-bind:class="{'active': currentRoute === 'pricing'}"><router-link :to="{name:'pricing'}"><span>Pricing</span></router-link></li> -->
                        <li v-bind:class="{'active': currentRoute === 'online_coaching'}"><router-link :to="{name:'online_coaching'}"><span>Online coaching</span></router-link></li>
                        <li v-bind:class="{'active': currentRoute === 'contact'}"><router-link :to="{name:'contact'}"><span>Contact</span></router-link></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--MAIN MENU WRAP END-->
</template>

<script>
    export default {
        name: "LayoutHeader",
        computed:{
            currentRoute(){
                return this.$route.name;
            }
        }
    }
</script>

<style scoped>

</style>
