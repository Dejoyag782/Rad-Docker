<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="container" style="margin-top: 100px;">
            <div class="row d-xxl-flex flex-row justify-content-xxl-center">

                @include('layouts.sidebar')

                <div class="col-md-6 view-cont flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 flex-xxl-grow-1" style="background: linear-gradient(52deg, rgba(52,58,64,0.6) 0%, rgba(255,255,255,0.36)), rgba(69,69,69,0.66);border-top-right-radius: 10px;border-bottom-right-radius: 10px;padding-top: 12px;padding-bottom: 12px;">
                    <div  style="min-height: 100%;min-width: 100%;background: rgba(255,255,255,0.86);border-top-right-radius: 10px;border-bottom-right-radius: 10px;">
                        
                        <section id="dash" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-uppercase text-start section-heading" style="text-align: left;">RAD CLIPS MEDIA</h2>
                                        <h3 class="text-muted section-subheading" style="font-size: 20px;text-align: left;margin-bottom: 30pxpx;">DASHBOARD</h3>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-briefcase fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">SERVICES</h4>
                                        <p class="text-muted">{{ $serviceCount }}<br></p>
                                    </div>
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-folder-open fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">PROJECTS</h4>
                                        <p class="text-muted">5<br></p>
                                    </div>
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">TEAM</h4>
                                        <p class="text-muted">{{ $teamCount }}<br></p>
                                    </div>
                                    <div class="col-md-3"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span>
                                        <h4 class="section-heading">MESSAGES</h4>
                                        <p class="text-muted">{{ $archivedMessagesCount }}<br></p>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
