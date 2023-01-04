<template>
    <div class="vue-app-container">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Coding and Technology</h1>
                        <p>Our curriculum consists of several coding and programming courses such as Python and Scratch; microprocessor programming; 3D print and design; applied digital skills such as web design; and robotics.</p>
                        <p>These courses will be available on rotation annually depending on teacher availability and registrants. Course offerings, descriptions, and prices can be found below:</p>

                        <h4>Coding and Programming</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#scratchModal">
                                <h5>Scratch</h5>
                                <p>Block-based coding designed to teach computational thinking and logic to students in grades K through 9</p>
                                <p><b>Age Band:</b> (K–9)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#googleCSModal">
                                <h5>Google CS First</h5>
                                <p>Block-based coding designed to teach computational thinking and logic to students in grades K through 9. Google curriculum is provided.</p>
                                <p><b>Age Band:</b> (K–9)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#MITAppModal">
                                <h5>MIT App Inventor</h5>
                                <p>Block-based programming designed to develop software applications for grades K through 12.</p>
                                <p><b>Age Band:</b> (K–12)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#cargenieModal">
                                <h5>Carnegie Mellon CS Academy</h5>
                                <p>Text-based (Python) advanced programming curriculum designed to learn computational thinking, algorithms, and functions.</p>
                                <p><b>Age Band:</b> (8–12)</p>
                            </div>
                        </div>

                        <h4>Microprocessor Programming</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#microbitModal">
                                <h5>Micro:bit</h5>
                                <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                                <p><b>Age Band:</b> (4–12)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#circuitModal">
                                <h5>Circuit Playground</h5>
                                <p>Block-based coding designed to teach computational thinking and logic to students in grades K through 9. Google curriculum is provided.</p>
                                <p><b>Age Band:</b> (K–9)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#codeModal">
                                <h5>Code.org</h5>
                                <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                                <p><b>Age Band:</b> (K–12)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#arduinoModal">
                                <h5>Arduino</h5>
                                <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                                <p><b>Age Band:</b> (8–12)</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#raspberryModal">
                                <h5>Raspberry Pi</h5>
                                <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                                <p><b>Age Band:</b> (6–12)</p>
                            </div>
                        </div>

                        <h4>Soldering and Electronics 101</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#circuitryModal">
                                <h5>Circuitry</h5>
                                <p>Learn soldering techniques and circuit board building. Take home your working circuit boards!</p>
                                <p><b>Age Band:</b> (6–12)</p>
                            </div>
                        </div>

                        <h4>3D Design and Printing</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#3dproductionModal">
                                <h5>3D Production</h5>
                                <p>Learn how to design 3D models and printing.</p>
                                <p><b>Age Band:</b> (4–12)</p>
                            </div>
                        </div>

                        <h4>Applied Digital Skills (Google Tools and Google Web Design)</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#googleToolsModal">
                                <h5>Google Tools</h5>
                                <p>Master Google products, including Google Drive, Google Docs (MS Word), Google Sheets (MS Excel), Google Slides (Powerpoint), Google Forms, and many more.</p>
                            </div>
                            <div class="card-item" data-toggle="modal" data-target="#googleSitesModal">
                                <h5>Google Sites</h5>
                                <p>Master creating Google sites with hands-on projects. Create your own website and publish!</p>
                            </div>
                        </div>

                        <h4>Robotics</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#ftcModal">
                                <h5>FTC, FRC, VEX, LEGO</h5>
                                <p>Learn engineering design and prepare for regional and state competitions.</p>
                            </div>
                        </div>

                        <h4>Leadership Programs</h4>
                        <div class="card-container">
                            <div class="card-item" data-toggle="modal" data-target="#congressionModal">
                                <h5>Congressional Award</h5>
                                <p>Serve your community; develop 21st century and interpersonal skills with one-on-one mentoring opportunities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal" id="congressionModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">FTC, FRC, VEX, LEGO</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Serve your community; develop 21st century and interpersonal skills with one-on-one mentoring opportunities.</p>
                        <br>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $40 per student per after school session / $60 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="ftcModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">FTC, FRC, VEX, LEGO</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Learn engineering design and prepare for regional and state competitions.</p>
                        <br>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $40 per student per after school session / $60 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="googleSitesModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Google Sites</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Master creating Google sites with hands-on projects. Create your own website and publish!</p>
                        <br>
                        <p><b>Length:</b>1 to 3 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $40 per student per after school session / $60 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="googleToolsModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Google Tools</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Master Google products, including Google Drive, Google Docs (MS Word), Google Sheets (MS Excel), Google Slides (Powerpoint), Google Forms, and many more.</p>
                        <br>
                        <p><b>Length:</b>1 to 3 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $40 per student per after school session / $60 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="3dproductionModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">3D Production</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Learn how to design 3D models and printing.</p>
                        <p><b>Age Band: (4–12)</b></p>
                        <p><b>Length:</b>1 to 4 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $40 per student per after school session / $60 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="circuitryModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Circuitry</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Learn soldering techniques and circuit board building. Take home your working circuit boards!</p>
                        <p><b>Age Band: (6–12)</b></p>
                        <p><b>Length:</b>1 to 4 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $40 per student per after school session / $60 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="microbitModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Carnegie Mellon CS Academy</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                        <p><b>Age Band: (4–12)</b></p>
                        <p><b>Length:</b>1 to 3 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="circuitModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Circuit Playground</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Block-based coding designed to teach computational thinking and logic to students in grades K through 9. Google curriculum is provided.</p>
                        <p><b>Age Band: (K–9)</b></p>
                        <p><b>Length:</b>Semester or year long</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="codeModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Code.org</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                        <p><b>Age Band: (4–12)</b></p>
                        <p><b>Length:</b>1 to 3 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="arduinoModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Arduino</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                        <p><b>Age Band: (6–12)</b></p>
                        <p><b>Length:</b>2 to 6 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="raspberryModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Raspberry Pi</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>A novel micro processor board to learn programming while visualizing the created algorithm.</p>
                        <p><b>Age Band: (6–12)</b></p>
                        <p><b>Length:</b>2 to 6 weeks</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="scratchModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Scratch</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Block-based coding designed to teach computational thinking and logic to students in grades K through 9.</p>
                        <p><b>Age Band: (K–9)</b></p>
                        <p><b>Length:</b>Semester or year long</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="googleCSModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Google CS First</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Block-based coding designed to teach computational thinking and logic to students in grades K through 9. Google curriculum is provided.</p>
                        <p><b>Age Band: (K–9)</b></p>
                        <p><b>Length:</b>Semester or year long</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="MITAppModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">MIT App Inventor</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Block-based programming designed to develop software applications for grades K through 12.</p>
                        <p><b>Age Band: (K–12)</b></p>
                        <p><b>Length:</b>Semester or year long</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="cargenieModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Carnegie Mellon CS Academy</h6>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Text-based (Python) advanced programming curriculum designed to learn computational thinking, algorithms, and functions.</p>
                        <p><b>Age Band: (8–12)</b></p>
                        <p><b>Length:</b>Semester or year long</p>
                        <br>
                        <p>
                            <b>Course Delivery Options:</b><br>
                            After school (2 hrs)<br>
                            Weekend (4 hrs)
                        </p>
                        <br>
                        <br>
                        <p><b>Cost:</b> $30 per student per after school session / $50 per student per weekend session</p>
                        <div class="booking"><a href="contact.html">Call or Email us to Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ClassesCodingTech"
    }
</script>

<style scoped>
    @import '../../../sass/theme/css/classes-coding-technology.css';
</style>
