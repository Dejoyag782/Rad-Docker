<!-- Add Modal -->
<div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="PortfolioModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 0 0 10px 0;">
            <div class="modal-header bg-dark text-light">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row" style="padding: 10px 20px 10px 20px;">
                <div class="col-lg-12 text-center">
                    <h4 class="text-uppercase text-start section-heading d-flex justify-content-between" style="text-align: left;">"Service Name" Projects
                        <a id="addServiceBtn" class="btn add-service-btn" style="background-color:#212529; color: rgb(249, 242, 242);" data-bs-toggle="modal" data-bs-target="#ProjectModal">
                            <i id="toggleIcon" class="fa fa-user" style="padding-right:5px;"></i>Add Project
                        </a>
                    </h4>
                    <h5 class="text-muted section-subheading" style="font-size: 20px;text-align: left;margin-bottom: 30pxpx;">Add, Edit or Remove | Project</h5>
                </div>
            </div>
            <div style="padding: 10px 20px 10px 20px;">
                            @include('dashboard.portfolio.table')
                        
            </div>
        </div>
    </div>
</div>