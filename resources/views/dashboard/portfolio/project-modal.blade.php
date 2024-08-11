<!-- Add Modal -->
<div class="modal fade" id="ProjectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="projectModalLabel"><b>Project Details</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ProjectForm" method="POST" action="{{ route('project.storeOrUpdate') }}" enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">                    
                    <input type="hidden" name="id" id="id">    
                    <input type="hidden" name="service_id" id="service_id">                  
                    
                    <div class="form-group">
                        <label for="fileTypeSelect">Select File Type</label>
                        <select class="form-control" id="fileTypeSelect" onchange="updateFileInput()">
                        <option value="">Select File Type</option>
                            <option value="Photo">Photo</option>
                            <option value="Audio">Audio</option>
                            <option value="Video">Video</option>
                            <option value="Link">Link</option>
                        </select>
                        <input id="file_type" name="file_type" type="hidden">
                    </div>

                    <div id="fileInputContainer">
                        <!-- Dynamic file input or view will be appended here -->
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="sub_heading" class="form-label">Project Sub Header</label>
                        <input type="text" class="form-control" id="sub_heading" name="sub_heading" />
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="client" class="form-label">Client</label>
                        <input type="text" class="form-control" id="client" name="client" />
                    </div>

                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="select_team_ids">Team</label>
                        <select class="multiple-choices mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" name="select_team_ids[]" id="select_team_ids" multiple>
                            @foreach($team as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="project_team_ids" name="project_team_ids[]" />
                    </div>

                    <div class="form-group">
                        <label for="timeline" class="form-label">Date</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="monthSelector">Select Month</label>
                                        <select class="form-control" id="monthSelector">
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="yearSelector">Select Year</label>
                                        <select class="form-control" id="yearSelector">
                                            <!-- Years will be populated by JavaScript -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <input type="text" class="form-control" hidden='true' id="date" name="date" required>
                    </div>

                <div class="modal-footer">
                    <button type="submit" id='submitBtn' class="btn btn-primary">Add Project</button>
                    <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
