<template>
    <div class="vue-app-container">
        <section class="first">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="background-img" src="url(https://metrotech.gg/assets/images/imgs/Compete2-1.jpg)"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Whether you’re playing for competitive growth, pride, bragging rights, or cash prizes, we’ve got you covered. Come test your skills!
                        </p>

                        <h4>Leagues & Tournaments</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <img src="https://metrotech.gg/assets/images/imgs/LeagueofLegends.jpg" alt="">
                                <p><b>Time:</b> Sunday Evenings</p>
                                <p><b>Prizing:</b> Prize pot up to $600</p>
                                <ul class="list-container">
                                    <li>1st—70% of prize pot</li>
                                    <li>2nd—30% of prize pot</li>
                                </ul>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <img src="https://metrotech.gg/assets/images/imgs/NBA.jpg" alt="">
                                <p><b>Time:</b> Saturday Evenings</p>
                                <p><b>Prizing:</b> Prize pot up to $200</p>
                                <ul class="list-container">
                                    <li>1st—70% of prize pot</li>
                                    <li>2nd—30% of prize pot</li>
                                </ul>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <img src="https://metrotech.gg/assets/images/imgs/Madden.jpg" alt="">
                                <p><b>Time:</b> Saturday Evenings</p>
                                <p><b>Prizing:</b> Prize pot up to $200</p>
                                <ul class="list-container">
                                    <li>1st—70% of prize pot</li>
                                    <li>2nd—30% of prize pot</li>
                                </ul>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <img src="https://metrotech.gg/assets/images/imgs/Fornite.jpg" alt="">
                                <p><b>Time:</b> Friday Evenings</p>
                                <p><b>Prizing:</b> Prize pot up to $320</p>
                                <ul class="list-container">
                                    <li>1st—70% of prize pot</li>
                                    <li>2nd—30% of prize pot</li>
                                </ul>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <img src="https://metrotech.gg/assets/images/imgs/supersmash.jpg" alt="">
                                <p><b>Time:</b> Friday Evenings</p>
                                <p><b>Prizing:</b> Prize pot up to $600</p>
                                <ul class="list-container">
                                    <li>1st—70% of prize pot</li>
                                    <li>2nd—30% of prize pot</li>
                                </ul>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <img src="https://metrotech.gg/assets/images/imgs/CODGOW.jpg" alt="">
                                <p><b>Time:</b> Monday Evenings</p>
                                <p><b>Prizing:</b> Prize pot up to $560</p>
                                <ul class="list-container">
                                    <li>1st—70% of prize pot</li>
                                    <li>2nd—30% of prize pot</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="paragraph">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>The following game options will be offered at the Metro Tech &amp; Training facility for summer camp play for your students. Depending on the level of interest at your school, we can offer both varsity and junior varsity league play opportunities. There must be a minimum of 6 players per team to participate in our esports leagues and summer camps. This enables the students to mobilize as a team and choose which game(s) they would like to compete in.</p>
                        <p><strong>How do I join Metro’s league?</strong> <br>
                            Applications become available for Fall 2020 High School Leagues on August 1.</p>
                        <ul class="list-container">
                            <li>GPA requirement: 2.5 or higher</li>
                            <li>Minimum of 6 players for the same (or multiple) games</li>
                            <li>Maximum of 48 players per school. Tryouts will be held if roster exceeds 6 to determine varsity and junior varsity placement.</li>
                        </ul>
                        <p><strong>How many students can you accommodate?</strong></p>
                        <ul class="list-container">
                            <li>Metro can support up to 6 teams of 6 students each for PC play at any given time.</li>
                            <li>Console gaming stations can support an additional 12 students for casual play or small competitions.</li>
                        </ul>
                        <p><strong>Is there an “on” and “off” season like traditional athletics?</strong></p>
                        <ul class="list-container">
                            <li>Fall (6–10 weeks)</li><li>Winter (6–10 weeks)</li>
                            <li>Summer Camps (6 weeks)</li>
                        </ul>
                        <p><strong>What would a weekly schedule look like?</strong></p>
                        <p><a href="https://metrotech.gg/assets/images/imgs/SummerCampSample.jpg" target="_blank" rel="noopener">View a sample schedule</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "Compete"
    }
</script>

<style scoped>
    @import '../../../sass/theme/css/compete.css';
</style>
