@foreach ($histories as $history)
        <li class="list-group-item  bg-dark {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : 'timeline' }}">

            <div class="text-end">
                <button class="btn btn-primary view-history-btn" data-id="{{ $history->id }}" data-bs-toggle="modal" data-bs-target="#HistoryModal">
                    <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-danger delete-history-btn" data-id="{{ $history->id }}">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            <div class="timeline-image" style="background-size: cover, auto; 
                    no-repeat; background-image: url({{ $history->photo ? asset('storage/'.$history->photo) : 'https://static.vecteezy.com/system/resources/previews/021/277/888/original/picture-icon-in-flat-design-style-gallery-symbol-illustration-png.png' }});">
            </div>
            <div class="{{ $loop->iteration % 2 == 0 ? 'text-start' : 'text-end' }} timeline-panel">
                <div class="timeline-heading text-light">
                    <h4 >{{ $history->timeline }}</h4>
                    <h4 class="subheading">{{ $history->title }}</h4>
                </div>
                <div class="timeline-body">
                    <p class="text-muted">{{ $history->desc }}</p>
                </div>
            </div>
        </li>
    @endforeach

<!-- Pagination links -->
{{ $histories->links('vendor.pagination.simple-bootstrap-5') }}