@foreach ($services as $service)
    <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa {{ $service->icon }} fa-stack-1x fa-inverse"></i></span>
        <button class="btn btn-primary view-service-btn" data-id="{{ $service->id }}" data-bs-toggle="modal" data-bs-target="#ServiceModal">
            <i class="fa fa-pencil"></i>
        </button>
        <button class="btn btn-danger delete-service-btn" data-id="{{ $service->id }}">
            <i class="fa fa-trash"></i>
        </button>
        <h4 class="section-heading">{{ $service->name }}</h4>
        <p class="text-muted">{{ $service->desc }}<br></p>
    </div>
@endforeach

<!-- Pagination links -->
{{ $services->links('vendor.pagination.simple-bootstrap-5') }}