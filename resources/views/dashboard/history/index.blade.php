<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="container" style="margin-top: 100px;">
            <div class="row d-xxl-flex flex-row justify-content-xxl-center">

                @include('layouts.sidebar')

                <div class="col-md-6 view-cont flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 flex-xxl-grow-1"
                     style="background: linear-gradient(52deg, rgba(52,58,64,0.6) 0%, rgba(255,255,255,0.36)), rgba(69,69,69,0.66);
                            border-top-right-radius: 10px;border-bottom-right-radius: 10px;padding-top: 12px;padding-bottom: 12px;">
                    <div  style="min-height: 100%;min-width: 100%;background: rgba(255,255,255,0.86);
                                 border-top-right-radius: 10px;border-bottom-right-radius: 10px;">
                        
                        <section id="history" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h4 class="text-uppercase text-start section-heading">HISTORY</h4>
                                        <h5 class="text-start text-muted section-subheading" 
                                        style="font-size: 15pt;">Add, Edit or Remove | History</h5>
                                    </div>
                                </div>
                                
                                <hr style="margin-top:20px; margin-bottom:20px;">

                                <div class="row">
                                    <div class="col-lg-12 bg-dark" style="padding: 10px 10px 40px 10px;">
                                        <ul class="list-group timeline" id="history-list">
                                        
                                                @include('dashboard.history.listview')

                                            <li class="list-group-item  bg-dark ">
                                                <button class="add-timeline-btn btn btn-primary d-flex d-sm-flex d-md-flex d-lg-flex 
                                                d-xxl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center
                                                justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center
                                                justify-content-xxl-center align-items-xxl-center timeline-image"  data-bs-toggle="modal" 
                                                data-bs-target="#HistoryModal"><i class="fa fa-plus" style="font-size: 20pt;"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>
        
        @include('dashboard.history.modal')
        @include('dashboard.history.ajax')
        
</x-app-layout>
