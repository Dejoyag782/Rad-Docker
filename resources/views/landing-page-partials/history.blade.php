<div class="col-lg-12">
    <ul class="list-group timeline">
        
            @foreach ($histories as $history)
                <li class="list-group-item {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : 'timeline' }}">
                <div class="timeline-image" style="background-size: cover, auto; 
                        no-repeat; background-image: url({{ $history->photo ? asset('storage/'.$history->photo) : 'https://static.vecteezy.com/system/resources/previews/021/277/888/original/picture-icon-in-flat-design-style-gallery-symbol-illustration-png.png' }});">
                </div>
                <div class="{{ $loop->iteration % 2 == 0 ? 'text-start' : 'text-end' }} timeline-panel">
                        <div class="timeline-heading">
                            <h4 id="timeline">{{ $history->timeline }}</h4>
                            <h4 id="title" class="subheading">{{ $history->title }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p id="desc" class="text-muted">{{ $history->desc }}</p>
                        </div>
                    </div>
                </li>
            @endforeach

            @if ($histories->currentPage() == $histories->lastPage())
                <li class="list-group-item timeline-inverted">
                    <button class="btn btn-primary d-flex justify-content-center align-items-center timeline-image">
                        <h4 style="margin-top: 0;margin-bottom: 0;">&nbsp;Be Part<br>&nbsp;Of Our<br>&nbsp;Story!</h4>
                    </button> 
                </li>
            @else
                <li class="list-group-item timeline-inverted">
                    <button class="btn btn-primary d-flex justify-content-center align-items-center timeline-image">
                        <h4 style="margin-top: 0;margin-bottom: 0;">&nbsp;See More<br>&nbsp;Of Our<br>&nbsp;Story!</h4>
                    </button>
                </li>
            @endif
    </ul>
    <!-- Pagination links -->
    <div style="padding:15px; margin-top:20px; min-width:auto; background-color: rgb(33 37 41); display:flex; flex-direction:center; justify-content:center;">
        {{ $histories->links('vendor.pagination.simple-tailwind') }}
    </div>

</div>