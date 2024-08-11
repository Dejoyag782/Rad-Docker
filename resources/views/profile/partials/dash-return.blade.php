<div class="col-md-3 d-flex align-items-center">
    <span class="fa-stack fa d-flex alignt-items-center">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-arrow-left fa-stack-1x fa-inverse"></i></span>
        </x-nav-link>                        
        <p class="text-muted" style="padding-left:5px;">Back to Dashboard<br></p>
</div>