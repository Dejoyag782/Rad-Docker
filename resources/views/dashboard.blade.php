<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="container" style="margin-top: 100px;">
            <div class="row d-xxl-flex flex-row justify-content-xxl-center">

                @include('layouts.sidebar')

                <div class="col-md-6 view-cont flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 flex-xxl-grow-1" style="background: linear-gradient(52deg, rgba(52,58,64,0.6) 0%, rgba(255,255,255,0.36)), rgba(69,69,69,0.66);border-top-right-radius: 10px;border-bottom-right-radius: 10px;padding-top: 12px;padding-bottom: 12px;">
                    <div style="min-height: 100%;min-width: 100%;background: rgba(255,255,255,0.86);border-top-right-radius: 10px;border-bottom-right-radius: 10px;">
                        <section id="dash" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-uppercase text-start section-heading" style="text-align: left;">RAD CLIPS MEDIA</h2>
                                        <h3 class="text-muted section-subheading" style="font-size: 20px;text-align: left;margin-bottom: 30pxpx;">DASHBOARD</h3>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-briefcase fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">SERVICES</h4>
                                        <p class="text-muted">6<br></p>
                                    </div>
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-folder-open fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">PROJECTS</h4>
                                        <p class="text-muted">5<br></p>
                                    </div>
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">TEAM</h4>
                                        <p class="text-muted">3<br></p>
                                    </div>
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">MESSAGES</h4>
                                        <p class="text-muted">5<br></p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="services" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-uppercase text-start section-heading" style="text-align: left;">Services</h2>
                                        <h3 class="text-muted section-subheading" style="font-size: 20px;text-align: left;margin-bottom: 30pxpx;">Add, Edit or Remove | Services</h3>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-film fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">Video Editing</h4>
                                        <p class="text-muted">Our expert video editing services bring your vision to life, whether it's for promotional videos, social media content, or corporate presentations.<br></p>
                                    </div>
                                    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-video-camera fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">Videography</h4>
                                        <p class="text-muted">Our videography service captures your moments with precision &amp; creativity. We do corporate events,&nbsp; promotional shoots, weddings &amp; special occasions.<br></p>
                                    </div>
                                    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-camera fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">Photography</h4>
                                        <p class="text-muted">Our photography services ensures to capture the essence of every moment. Our photographers do corporate events to portraits and lifestyle shoots.<br></p>
                                    </div>
                                    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-paint-brush fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">Graphic Design</h4>
                                        <p class="text-muted">Our team excels in creating eye-catching visuals, from social media graphics to blending artistic flair strategically for stunning &amp; effective designs.<br></p>
                                    </div>
                                    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-microphone fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">Sound Design</h4>
                                        <p class="text-muted">Our team of skilled sound designers specializes in creating immersive audio experiences, from custom soundtracks, effects, voiceovers &amp; mixing.<br></p>
                                    </div>
                                    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">Song Writing</h4>
                                        <p class="text-muted">Our talented songwriters specialize in crafting original lyrics &amp; melodies across genres, ensuring each composition resonates with your audience<br></p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col text-center d-xxl-flex justify-content-xxl-center align-items-xxl-center"><button class="btn btn-primary d-xxl-flex align-items-xxl-center" type="button" style="margin-bottom: 75px;margin-top: 75px;min-width: 30px;min-height: 30px;font-size: 30pt;"><i class="fa fa-plus" style="font-size: 40pt;"></i>&nbsp;Add a Service</button></div>
                                </div>
                            </div>
                        </section>
                        <section class="bg-light" id="portfolio" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-uppercase text-start section-heading">Portfolio</h2>
                                        <h3 class="text-start text-muted section-subheading" style="font-size: 20px;">Add, Edit or Remove | Projects</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="#portfolioModal1" data-bs-toggle="modal">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                                            </div><img class="img-fluid" src="welcome_assets/img/portfolio/Video%20Editing.png">
                                        </a>
                                        <div class="portfolio-caption">
                                            <h4>Clips</h4>
                                            <p class="text-muted">Video Edits</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="#portfolioModal2" data-bs-toggle="modal">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                                            </div><img class="img-fluid" src="welcome_assets/img/portfolio/Videography.png">
                                        </a>
                                        <div class="portfolio-caption">
                                            <h4>Shoot</h4>
                                            <p class="text-muted">Videography</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="#portfolioModal3" data-bs-toggle="modal">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                                            </div><img class="img-fluid" src="welcome_assets/img/portfolio/3-thumbnail.jpg">
                                        </a>
                                        <div class="portfolio-caption">
                                            <h4>Window</h4>
                                            <p class="text-muted">Photography</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="#portfolioModal4" data-bs-toggle="modal">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                                            </div><img class="img-fluid" src="welcome_assets/img/portfolio/graphics%20design.png">
                                        </a>
                                        <div class="portfolio-caption">
                                            <h4><strong>Explore</strong><br></h4>
                                            <p class="text-muted">Graphic Design</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="#portfolioModal5" data-bs-toggle="modal">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                                            </div><img class="img-fluid" src="welcome_assets/img/portfolio/serum-3d-665x499.jpg">
                                        </a>
                                        <div class="portfolio-caption">
                                            <h4>Blast</h4>
                                            <p class="text-muted">Sound Design</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="#portfolioModal6" data-bs-toggle="modal">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                                            </div><img class="img-fluid" src="welcome_assets/img/portfolio/Song%20Writing.png">
                                        </a>
                                        <div class="portfolio-caption">
                                            <h4>Lyric</h4>
                                            <p class="text-muted">Song Writing</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="history" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-uppercase text-start section-heading">HISTORY</h2>
                                        <h3 class="text-start text-muted section-subheading" style="font-size: 15pt;">Add, Edit or Remove | History</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="list-group timeline">
                                            <li class="list-group-item">
                                                <div class="timeline-image"><img class="rounded-circle img-fluid" src="welcome_assets/img/about/1.jpg"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4>November 2023</h4>
                                                        <h4 class="subheading">How we Began</h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="text-muted">RAD Clips Media began when Nissan Bohol looked for videographers to shoot a testimonial video. This is when the founders of RAD which are Dex Joshua Curayag &amp; Rogelio Tasong Jr. were asked to shoot for a testimonial video.&nbsp;</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-xxl-flex flex-row justify-content-xxl-end">
                                                <div class="timeline-image"><img class="rounded-circle img-fluid" src="welcome_assets/img/about/2.jpg"></div>
                                                <div class="text-start timeline-panel" style="padding-left: 20px;padding-right: 100px;">
                                                    <div class="timeline-heading">
                                                        <h4>January 2024</h4>
                                                        <h4 class="subheading">Another Milestone</h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="text-muted">The testimonial video of Nissan Bohol that was shot by our team ranked in the top 5 at Nissan Philippines.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item timeline-inverted">
                                                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center timeline-image"><i class="fa fa-plus" style="font-size: 50pt;"></i></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="bg-light" id="team" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-uppercase text-start section-heading">Team</h2>
                                        <h3 class="text-start text-muted section-subheading" style="font-size: 15pt;">Add, Edit or Remove | Talent</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="team-member"><img class="rounded-circle mx-auto" src="welcome_assets/img/team/318802872_3421445571510773_8389724998033089710_n.jpg">
                                            <h4>Dex Joshua Curayag</h4>
                                            <p class="text-muted">Videographer | Sound Designer | Video Editor</p>
                                            <ul class="list-inline social-buttons">
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="https://www.facebook.com/dexjoshua.curayag.5/"><i class="fa fa-facebook"></i></a></li>
                                                <li class="list-inline-item"><a href="https://www.linkedin.com/in/dex-joshua-curayag-67764b316/"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="team-member"><img class="rounded-circle mx-auto" src="welcome_assets/img/team/312658485_3350485938527610_3870889274646053422_n.jpg">
                                            <h4>Rogelio Tasong Jr</h4>
                                            <p class="text-muted">Video Editor | Videographer | Graphic Designer</p>
                                            <ul class="list-inline social-buttons">
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="https://www.facebook.com/rj.tasong"><i class="fa fa-facebook"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="team-member"><img class="rounded-circle mx-auto" src="welcome_assets/img/team/93245406_1585567444925506_8528516718580989952_n.jpg">
                                            <h4>Aleksandr Memphis Olaguir</h4>
                                            <p class="text-muted">Photographer | Graphic Designer | Photo Editor</p>
                                            <ul class="list-inline social-buttons">
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="https://www.facebook.com/Memphis1302"><i class="fa fa-facebook"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col text-center d-xxl-flex justify-content-xxl-center align-items-xxl-center"><button class="btn btn-primary d-xxl-flex align-items-xxl-center" type="button" style="margin-bottom: 75px;margin-top: 75px;min-width: 30px;min-height: 30px;font-size: 30pt;"><i class="fa fa-plus" style="font-size: 40pt;"></i>&nbsp;Add to Team</button></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
