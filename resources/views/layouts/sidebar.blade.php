{{-- Large Sidebar --}}
<div class="col-md-6 flex-sm-grow-1 flex-sm-shrink-1 flex-md-grow-1 flex-md-shrink-1 sidebar-lg" style="color:#fec503; max-width: 13%; background: #25292d;padding-right: 0px;min-height: 700px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
<?php $page = Request::segment(1); ?>
<div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;border-top-left-radius: 10px;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="padding-right: 0px;min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('dashboard')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-dashboard">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">Dashboard</strong>
                </i>
            </a>
        </div>
    </div>
   
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('services')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-briefcase">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">Services</strong>
                </i>
            </a>
        </div>
    </div>
    
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('portfolio')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-folder">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">Portfolio</strong>
                </i>
            </a>
        </div>
    </div>
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('history')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-clock-o">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">History</strong>
                </i>
            </a>
        </div>
    </div>
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('team')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-users">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">Team</strong>
                </i>
            </a>
        </div>
    </div>
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('messages')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-envelope">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">Messages</strong>
                </i>
            </a>
        </div>
    </div>
    @if (auth()->user()->user_type === 'ad')
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center align-items-xxl-end"  href="{{route('users')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-user">
                    <strong style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%; padding-left: 10px;">Users</strong>
                </i>
            </a>
        </div>
    </div>
    @endif
</div>

{{-- Small Sidebar --}}

<div class="col-md-6 flex-sm-grow-1 flex-sm-shrink-1 flex-md-grow-1 flex-md-shrink-1 sidebar-sm" style="color:#fec503; max-width: 5%; background: #25292d;padding-right: 0px;min-height: 700px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;border-top-left-radius: 10px;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="padding-right: 0px;min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('dashboard')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-dashboard"></i>
            </a>
        </div>
    </div>
   
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('services')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-briefcase"></i>
            </a>
        </div>
    </div>
    
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('portfolio')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-folder"></i>
            </a>
        </div>
    </div>
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('history')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-clock-o"></i>
            </a>
        </div>
    </div>
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('team')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-users"></i>
            </a>
        </div>
    </div>
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('messages')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-envelope"></i>
            </a>
        </div>
    </div>
    @if (auth()->user()->user_type === 'ad')
    <div class="row d-xxl-flex flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 justify-content-xxl-center align-items-xxl-center" data-bss-hover-animate="pulse" style="background: #343a40;min-height: 49.6px;border-top-width: 0.5px;border-top-style: ridge;border-bottom: 0.5px solid rgb(40,46,52) ;border-left-style: dotted;">
        <div class="col d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="min-height: 49.6px;">
            <a class="navbar-brand text-center d-xl-flex d-xxl-flex align-items-baseline justify-content-xl-start align-items-xl-center justify-content-xxl-center align-items-xxl-end"  href="{{route('users')}}" style="font-family: Poppins, sans-serif;border-radius: 0;border-style: none;margin-bottom: 5px;margin-top: 5px;min-width: 100%;">
                <i class="fa fa-user"></i>
            </a>
        </div>
    </div>
    @endif
</div>
