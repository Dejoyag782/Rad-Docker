
    @foreach ($services as $service)
        <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa {{ $service->icon }} fa-stack-1x fa-inverse"></i></span>
            <h4 class="section-heading">{{ $service->name }}</h4>
            <p class="text-muted">{{ $service->desc }}<br></p>
        </div>
    @endforeach

<!-- Pagination links -->
<div style="padding:15px; margin-top:20px; min-width:auto; background-color: rgb(33 37 41); display:flex; flex-direction:center; justify-content:center;">
    {{ $services->links('vendor.pagination.simple-bootstrap-5') }}
</div>