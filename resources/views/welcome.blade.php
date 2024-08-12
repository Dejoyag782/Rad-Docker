<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="description" content="RAD Clips Media offers a comprehensive suite of creative services including videography, video editing, photography, sound design, graphic design, and songwriting. Whether you're seeking stunning visuals, immersive soundscapes, or captivating designs, our talented team brings expertise and passion to every project. Elevate your brand with RAD Clips Media – where creativity meets craftsmanship.">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">    
    <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">    
    <link rel="stylesheet" href="{{asset('css/bootstrap_modified.css')}}">
    <link rel="stylesheet" href="{{asset('css/Highlight-Blue.css')}}">
    <link rel="stylesheet" href="{{asset('css/Login-Form-Dark.css')}}">
    <link rel="stylesheet" href="{{asset('css/untitled.css')}}">
    <link rel="stylesheet" href="{{asset('css/Article-List.min.css')}}">

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/agency.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bs-init.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    

</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container">
            <div class="d-flex align-items-center">
                <a class="navbar-brand text-center d-flex justify-content-center align-items-center" href="#page-top" style="font-family: Audiowide, serif;min-height: 50px;max-height: 60px;min-width: 50px;max-width: 60px;border-radius: 50px;border-style: none;margin-bottom: 5px;margin-top: 5px;padding: 5px;padding-top: 8px;padding-bottom: 8px;margin-right: 5px;"><img src="welcome_assets/img/RADBLACK.svg" style="min-height: 30px;max-height: 40px;"></a>
                <a class="navbar-brand text-center d-flex justify-content-center align-items-center" href="#page-top" style="font-family: Audiowide, serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 60px;">RAD</a>
            </div>
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background: url(&quot;welcome_assets/img/9024f529-6c42-4783-8c7b-9a23c4b6bca3_upscaled.png&quot;) no-repeat;background-size: cover;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>We Digitalize Your Memories</span></div>
                <div class="intro-heading text-uppercase"><span>RAD CLIPS MEDIA</span></div><a class="btn btn-primary btn-xl text-uppercase" role="button" href="#services">Tell me more</a>
            </div>
        </div>
    </header>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Services</h2>
                    <h3 class="text-muted section-subheading">What we can offer to you.</h3>
                </div>
            </div>
            <div class="row text-center">
                @include('landing-page-partials.services', ['services' => $service])
            </div>
        </div>
    </section>
    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Portfolio</h2>
                    <h3 class="text-muted section-subheading">Feel free to explore our projects</h3>
                </div>
            </div>
            <div class="row">
                @include('landing-page-partials.portfolios', ['portfolios' => $portfolios])
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">About</h2>
                    <h3 class="text-muted section-subheading">The story behind RAD Clips Media</h3>
                </div>
            </div>
            <div class="row">
            @include('landing-page-partials.history', ['histories' => $histories])
            </div>
        </div>
    </section>
    <section class="bg-light" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">RAD Team</h2>
                    <h3 class="text-muted section-subheading">Meet RAD Clips Media's members</h3>
                </div>
            </div>
            <div id="team-container" class="row">
                @include('landing-page-partials.team-members', ['team' => $team])
            </div>
        </div>
    </section>
    <section id="contact" style="background-image:url('welcome_assets/img/map-image.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Contact Us</h2>
                    <h3 class="text-muted section-subheading">Message us for the services that you need.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" method="POST" action="{{ route('message.store') }}" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Your Name *" required="">
                                    <small class="form-text text-danger flex-grow-1 help-block lead"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email *" required="">
                                    <small class="form-text text-danger help-block lead"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="tel" id="phone" name="phone" placeholder="Your Phone *" required="">
                                    <small class="form-text text-danger help-block lead"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <textarea class="form-control" id="desc" name="desc" placeholder="Your Message *" required=""></textarea>
                                    <small class="form-text text-danger help-block lead"></small>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© RAD 2024</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=61561400998845"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Frad-clips%2F%3Ffbclid%3DIwZXh0bgNhZW0CMTAAAR2G0-JmHH29iIJD6A0pOy-2se4q36cf3xY1yS_ah5Yz-NHree6UuC8SvLg_aem_LzRB7G-CD7RrTYENADlBXw&amp;h=AT3N0fqYGrg18RIziCA5ESCTL7EpyGecHshunTk6_Idl0yacmD0aHYtw4_ngtDfGWk2Wi2Oc99CCUPkqKYqMfWnvBXimPHkM5a5jUBuh9fSGlhAh2zP4WDpvr5vrKAUbx7RL3Q"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="welcome_assets/img/portfolio/1-full.jpg">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('landing-page-partials.modal')
{{--     
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal6">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="welcome_assets/img/portfolio/6-full.jpg">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bs-init.js') }}"></script>
    <script src="{{ asset('js/agency.js') }}"></script>

    <script>

    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Initialize Portfolio Modal
        $('.portfolio-link').on('click', function() {
            var serviceId = $(this).data('id');
            
            // Initial state
            $('#projects_datatable').html(''); // Clear the container
            $('#PortfolioModal .section-heading').html('Loading Projects...'); // Set initial text

            // Function to load and display projects
            function loadProjects(page = 1, search = '') {
                $.ajax({
                    url: '/displayProjectsByService/' + serviceId,
                    method: 'GET',
                    data: {
                        page: page,
                        search: search
                    },
                    success: function(response) {
                        // Update the modal header with the service name
                        $('#PortfolioModal .section-heading').html(response.service_name + ' Projects');
                        $('#ProjectModal #ProjectForm #service_id').val(serviceId);
                        
                        var projectContainer = $('<div class="row"></div>');
                        
                        // Render projects
                        $.each(response.data, function(index, project) {
                            var projectItem = $('<div class="col-md-4 mb-4"></div>');
                            var content = '';
                            
                            switch (project.file_type) {
                                case 'Video':
                                    content = `<video controls width="100%" height="300" class="shadow" style="border-radius:20px;" frameborder="0">
                                                    <source src="storage/${project.file_path}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>`+
                                                `<div style="text-align:left!important;">
                                                    <h4>${project.project_name}</h4>
                                                    <h5>${project.sub_heading}</h5>
                                                    <p style="margin-bottom:0px;">Client: ${project.client}</p>
                                                    <p style="margin-bottom:0px;">Date: ${project.date}</p>
                                                </div>`;
                                    break;
                                case 'Photo':
                                    content = `<img class="shadow" style="border-radius:20px;" frameborder="0" src="storage/${project.file_path}" alt="Image" width="100%">${project.project_name}</img>`;
                                    break;
                                case 'Audio':
                                    content =   `<div class="shadow" style="border-radius:5px; background-image:url('welcome_assets/img/portfolio/music_bg.png'); background-size: cover; background-position: center;">
                                                <div style="text-align:left!important;  padding-left:5px;">
                                                    <h4>${project.project_name}<span></h4>
                                                    <h5>${project.sub_heading}</h5>
                                                    <p style="margin-bottom:0px;">Client: ${project.client}</p>
                                                    <p style="margin-bottom:0px;">Date: ${project.date}</p>
                                                </div>`
                                                +
                                                `<audio controls style="width: 100%;">
                                                    <source src="storage/${project.file_path}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio></div>`;
                                    break;
                                case 'Link':
                                    content = `<iframe src="${project.file_path}" width="100%" height="300" class="shadow" style="border-radius:20px;" frameborder="0"></iframe>`
                                    +
                                                `<div style="text-align:left!important;">
                                                    <h4>${project.project_name}</h4>
                                                    <h5>${project.sub_heading}</h5>
                                                    <p style="margin-bottom:0px;">Client: ${project.client}</p>
                                                    <p style="margin-bottom:0px;">Date: ${project.date}</p>
                                                </div>`;
                                    break;
                                default:
                                    content = 'Unsupported file type';
                                    break;
                            }

                            projectItem.append(content);
                            projectContainer.append(projectItem);
                        });

                        $('#projects_datatable').html(projectContainer);

                        // Render pagination links
                        $('#pagination').html(response.pagination);

                        // If no projects found
                        if (response.data.length === 0) {
                            $('#projects_datatable').html('<div class="col-12 text-center">No projects found.</div>');
                        }
                    },
                    error: function() {
                        $('#PortfolioModal .section-heading').html('Error loading projects');
                    }
                });
            }

            // Load projects initially
            loadProjects();

            // Event listener for pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#search-input').val();
                loadProjects(page, search);
            });

            // Event listener for search
            $('#search-input').on('keyup', function() {
                var search = $(this).val();
                loadProjects(1, search); // Load first page with search term
            });
        });

        // Insert search bar and pagination container
        $('#PortfolioModal .modal-body').prepend(`
            <div class="row mb-3 d-flex justify-content-end">
                <div class="col-md-5">
                    <input type="text" id="search-input" class="form-control shadow" placeholder="Search projects...">
                </div>
            </div>
        `);

        $('#PortfolioModal .modal-body').append(`
            <div class="row mb-3 d-flex justify-content-center">
                <div class="col-md-2 text-center">
                    <div id="pagination" class="pagination">
                        
                    </div>
                </div>
            </div>
        `);
    });


    </script>
</body>

</html>