<x-app-layout>
    <x-slot name="header">
        <style>
            /* Favicon Selector */
            .favicon-option {
            font-size: 2em;
            cursor: pointer;
            padding: 10px;
            }
            .favicon-option.selected {
            border: 2px solid blue;
            border-radius: 5px;
            }
            /* Roles Adder */
            #roleInput {
                margin-bottom: 10px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            #addRoleBtn:hover {
                background-color: #f1c40f; /* Lighter yellow on hover */
            }

            #roleContainer {
                margin-top: 10px;
                Background-color: rgb(200, 200, 200);
                padding: 10px;
                border-radius: 5px;
            }

            .roleCapsule {
                display: inline-block;
                padding: 5px 10px;
                margin: 5px;
                background-color: #1f2937; /* Black */
                color: #fff; /* White */
                border-radius: 15px;
                font-size: 14px;
                position: relative;
            }

            .roleCapsule .deleteBtn {
                position: absolute;
                top: 0;
                right: 0;
                padding: 0 5px;
                cursor: pointer;
                font-weight: bold;
                font-size: 12px;
                background-color: #fbc531; /* Yellow */
                color: #1f2937; /* Black */
                border-radius: 50%;
            }

        </style>
        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="container" style="margin-top: 100px;">
            <div class="row d-xxl-flex flex-row justify-content-xxl-center">

                @include('layouts.sidebar')

                <div class="col-md-6 view-cont flex-sm-grow-1 flex-md-grow-1 flex-lg-grow-1 flex-xl-grow-1 flex-xxl-grow-1" style="background: linear-gradient(52deg, rgba(52,58,64,0.6) 0%, rgba(255,255,255,0.36)), rgba(69,69,69,0.66);border-top-right-radius: 10px;border-bottom-right-radius: 10px;padding-top: 12px;padding-bottom: 12px;">
                    <div  style="min-height: 100%;min-width: 100%;background: rgba(255,255,255,0.86);border-top-right-radius: 10px;border-bottom-right-radius: 10px;">
                       
                        <section id="services" style="padding-top: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h4 class="text-uppercase text-start section-heading d-flex justify-content-between" style="text-align: left;">Services
                                            <a id="addServiceBtn" class="btn add-service-btn" style="background-color:#212529; color: rgb(249, 242, 242);" data-bs-toggle="modal" data-bs-target="#ServiceModal">
                                                <i id="toggleIcon" class="fa fa-user" style="padding-right:5px;"></i>Add Service
                                            </a>
                                        </h4>
                                        <h5 class="text-muted section-subheading" style="font-size: 20px;text-align: left;margin-bottom: 30pxpx;">Add, Edit or Remove | Services</h5>
                                    </div>
                                </div>
                                
                                <hr style="margin-top:20px; margin-bottom:20px;">

                                <div class="row text-center">

                                    @include('dashboard.services.listview')
                                    
                                </div>
                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.services.modal')        
        @include('dashboard.services.favicon-selector-modal')
        @include('dashboard.services.ajax')
</x-app-layout>
