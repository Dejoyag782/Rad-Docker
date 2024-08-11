@foreach ($portfolios as $portfolio)
        
    <div class="col-sm-6 col-md-4 portfolio-item">
        <a type="button" data-id="{{ $portfolio->service_id }}" class="portfolio-link" data-bs-toggle="modal" data-bs-target="#PortfolioModal">
            <div class="portfolio-hover">
                <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
            </div>
            <div class="img-fluid" style="background-size: 100% 100% ; background-repeat: no-repeat; background-image: url({{ $portfolio->thumbnail ? asset('storage/'.$portfolio->thumbnail) : 'https://static.vecteezy.com/system/resources/previews/021/277/888/original/picture-icon-in-flat-design-style-gallery-symbol-illustration-png.png' }});">
                <img class="img-fluid" src="welcome_assets/img/portfolio/Blank_canvas.png">
            </div>
            
        </a>
        <div class="portfolio-caption">
            <h4>{{ $portfolio->sub_header }}</h4>
            <p class="text-muted">{{ $portfolio->service->name }}</p>
        </div>
    </div>

@endforeach

<!-- Pagination links -->
{{ $portfolios->links('vendor.pagination.simple-bootstrap-5') }}