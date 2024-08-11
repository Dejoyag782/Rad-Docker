@foreach ($team as $member)
<div class="col-sm-4">
    <div class="team-member">
        <img class="rounded-circle mx-auto" src="{{ $member->photo ? asset('storage/'.$member->photo) : 'welcome_assets/img/no-picture.svg' }}">
        <ul class="list-inline social-buttons" style="margin-top:-40px; margin-right:-100px;">
            <li class="list-inline-item" style="border: white 5px solid; border-radius:50%;">
                <a href="{{ $member->linked_in }}"><i class="fa fa-linkedin"></i></a>
            </li>
        </ul>
        <h4>{{ $member->name }}</h4>
        <p class="text-muted">
            @foreach ($member->roles as $role)
                {{ $role->role_name }}{{ !$loop->last ? ' | ' : '' }}
            @endforeach
        </p>
    </div>
</div>
@endforeach

<div style="padding:15px; margin-top:20px; min-width:auto; background-color: rgb(33 37 41); display:flex; flex-direction:center; justify-content:center;">
    {!! $team->links('vendor.pagination.simple-tailwind') !!}
</div>
