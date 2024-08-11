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
                        
                        <section id="messages" style="padding-top: 10px;">
                            <div class="container">
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <h4 class="text-uppercase text-start section-heading d-flex justify-content-between">Messages <a class="btn btn-warning" id="toggleDatatables" style=" color: rgb(35, 35, 35);" onclick="toggleDatatables()"><i  id="toggleIcon" class="fa fa-eye" style="padding-right:5px;"></i>Archive</a></h4>
                                            <h5 id="toggleHeader_messages" class="text-start text-muted section-subheading" style="font-size: 15pt; display:flex; justify-content:space-between;">Review, Archive or Remove | Messages </h5>
                                        </div>
                                    </div>
                                    
                                    <hr style="margin-top:20px; margin-bottom:20px;">

                                    <div class="row">
                                        <div class="col-12">
                                            @include('dashboard.messages.table')
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.messages.ajax')
        @include('dashboard.messages.modal')

</x-app-layout>
