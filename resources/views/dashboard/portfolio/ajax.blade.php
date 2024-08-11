<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Initialize DataTable
        $('.portfolio-link').on('click', function() {
            var serviceId = $(this).data('id');
            
            // Destroy existing DataTable instance if it exists
            if ($.fn.DataTable.isDataTable('#projects_datatable')) {
                $('#projects_datatable').DataTable().destroy();
                $('#projects_datatable').empty(); // Clear the table content
            }
            
            // Set up table header
            $('#projects_datatable').html(`
                <thead class="table-dark">
                    <tr>
                        <td>File</td>
                        <td>Project Name</td>
                        <td>Date</td>
                        <td>Client</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody></tbody>
            `);
            // Initialize or update DataTable
            $('#PortfolioModal .section-heading').html('Loading Projects...'); // Set initial text

            $('#PortfolioModal .modal-body table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/getProjectsByService/' + serviceId,
                    data: function (d) {
                        d.search = {
                            value: d.search.value
                        };
                    }
                },
                columns: [
                    {
                        data: 'file_type', // The column to check file type
                        name: 'file_type',
                        render: function(data, type, row) {
                            switch (data) {
                                case 'Video':
                                    return `<video controls width="200"><source src="storage/${row.file_path}" type="video/mp4">Your browser does not support the video tag.</video>`;
                                case 'Photo':
                                    return `<img src="storage/${row.file_path}" alt="Image" width="200" />`;
                                case 'Audio':
                                    return `<audio controls class="custom-audio"><source src="storage/${row.file_path}" type="audio/mpeg">Your browser does not support the audio element.</audio>`;
                                case 'Link':
                                    return `<iframe src="${row.file_path}" width="300" height="200" frameborder="0"></iframe>`;
                                default:
                                    return 'Unsupported file type';
                            }
                        }
                    },                  
                    { data: 'project_name', name: 'project_name' },                    
                    { data: 'date', name: 'date' },
                    { data: 'client', name: 'client' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<button type="button" class="btn btn-secondary view-project-btn" data-bs-toggle="modal" data-id="' + row.id + '" data-bs-target="#ProjectModal"><i class="fa fa-eye"></i></button>' + 
                                '<button style="margin-left:5px;" class="btn btn-danger delete-btn delete-project-btn" data-id="' + row.id + '" data-name="' + row.project_name + '"><i class="fa fa-trash"></i></button>';
                        },
                        orderable: false
                    }
                ],
                drawCallback: function(settings) {
                    // Update the modal header with the service name
                    $('#PortfolioModal .section-heading').html(settings.json.service_name + ' Projects');                    
                    $('#ProjectModal #ProjectForm #service_id').val(serviceId);

                     // Ensure the Add Project button is present
                    $('#PortfolioModal .section-heading').append(
                        '<a id="addServiceBtn" class="btn add-project-btn" style="background-color:#212529; color: rgb(249, 242, 242);" data-bs-toggle="modal" data-bs-target="#ProjectModal">' +
                            '<i id="toggleIcon" class="fa fa-user" style="padding-right:5px;"></i>Add Project' +
                        '</a>'
                    );

                    $('#projects_datatable tbody').find('.dataTables_empty').attr('colspan', 6); 
                },
                // Ensure to set the table ID for proper initialization
                "destroy": true,
                "stateSave": true // Optionally save the state (pagination, search, etc.)
            });
        });
        // End of Initialize DataTable


        // Delete BTN
        $('#projects_datatable').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            var name = $(this).data('name'); // This should now return the correct name

            Swal.fire({
                title: 'Are you sure?',
                text: `Are you sure to remove "${name}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('deleteProject') }}",
                        type: "POST",
                        data: { id: id },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            showNotification(response.success);
                            $('#projects_datatable').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            showNotification(response.responseJSON.error, true);
                        }
                    });
                }
            });
        });
        // END Delete BTN

        // View Project Details

        // View Team Details
        $('#projects_datatable').on('click', '.view-project-btn', function() {
            var id = $(this).data('id');

            // Fetch data using AJAX
            $.ajax({
                url: '/project/' + id,  // Adjust the URL to your route
                type: 'GET',
                success: function(response) {
                    // Populate modal fields
                    $('#ProjectModal #id').val(response.id);
                    $('#ProjectModal #service_id').val(response.service_id);
                    $('#ProjectModal #project_name').val(response.project_name);
                    $('#ProjectModal #file_type').val(response.file_type);
                    $('#ProjectModal #fileTypeSelect').val(response.file_type);

                    $('#ProjectModal #fileInputContainer').empty(); // Clear previous content
                    console.log(response.project_team_ids);

                    if (response.file_type === 'Photo') {     
                        $('#ProjectModal #fileInputContainer').append(`
                            <x-input-label for="photo" :value="__('Project File')" />
                            <div class="mb-4 d-flex justify-content-center" style="display: flex; justify-content:center !important; max-height: auto !important; min-width:100% !important; max-width:250px!important;">
                                <div>
                                    <div class="img-fluid" id="selectedImage" style="margin:auto; background-size: 100% 100% ; background-repeat: no-repeat; background-image: url('storage/${response.file_path}');">
                                        <img class="img-fluid" src="welcome_assets/img/portfolio/Blank_canvas.png">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-right">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="customFile1">Upload File</label>
                                    <input type="file" name="file_path" class="form-control d-none" accept=".png, .jpg, .jpeg" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" value="storage/${response.file_path}" />
                                </div>
                            </div>`);
                    } else if (response.file_type === 'Audio') {       
                        $('#ProjectModal #fileInputContainer').append(`
                            <x-input-label for="audio" :value="__('Project Audio')" />
                            <audio controls class="w-100">
                                <source src="storage/${response.file_path}" id="audioSource" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <input type="file" name="file_path" class="form-control" accept=".mp3, .wav" id="customFile2" onchange="updateAudioSource(event)" value="storage/${response.file_path}" />`);
                    } else if (response.file_type === 'Video') {          
                        $('#ProjectModal #fileInputContainer').append(`
                            <x-input-label for="video" :value="__('Project Video')" />
                            <video controls class="w-100" volume="1.0">
                                <source src="storage/${response.file_path}" id="videoSource" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <input type="file" name="file_path" class="form-control" accept=".mp4, .mov" id="customFile3" onchange="updateVideoSource(event)" value="storage/${response.file_path}" />`);
                    } else if (response.file_type === 'Link') {          
                        $('#ProjectModal #customFile4').val(response.file_path);
                        $('#ProjectModal #fileInputContainer').append(`
                            <x-input-label for="iframe" :value="__('Project Link')" />
                            <iframe id="linkFrame" class="w-100" style="height:300px;" src="${response.file_path}"></iframe>
                            <input type="text" name="file_path" class="form-control" id="customFile4" onchange="updateIframeSource(event)" placeholder="Enter URL" />`);
                    }
                    // Assuming response.profile_pic contains the URL of the profile picture
                    // var photoUrl = response.file_path ? `storage/${response.file_path}` : `{{ asset('welcome_assets/img/no-picture.svg')}}`;
                    // Set the background image of the profile_pic div

                    
                    $('#ProjectModal #sub_heading').val(response.sub_heading);                    
                    $('#ProjectModal #desc').val(response.desc);                    
                    $('#ProjectModal #client').val(response.client);                    
                    $('#ProjectModal #date').val(response.date);

                    // Clear existing roles
                    $('#ProjectModal #select_team_ids').empty();
                    $('#ProjectModal .choices__list--multiple').empty();

                    var team_ids = JSON.parse(response.project_team_ids);
                    
                    console.log(team_ids);
                    var project_team_ids = team_ids.map(String);
                    // Step 3: Stringify the array to save it as a JSON string
                    var project_team_idsString = JSON.stringify(project_team_ids);
                    $('#ProjectModal #project_team_ids').val(project_team_idsString);

                    var member_names = response.team_members.map(function(member) {
                        return member.name;
                    });
                    var i = 1;
                    var j = 0;
                    // Populate roles
                    if (team_ids && team_ids.length > 0) {
                        team_ids.forEach(function(teams) {
                            $('#ProjectModal #select_team_ids').append(`<option value="${team_ids[j]}" 
                                data-custom-properties="[object Object]">${member_names[j]}</option>`);

                            $('#ProjectModal .choices__list--multiple').append(`<div class="choices__item 
                                choices__item--selectable" data-item="" data-id="${j}" data-value="${team_ids[j]}" 
                                data-custom-properties="[object Object]" aria-selected="true" data-deletable="">${member_names[j]}
                                <button type="button" class="choices__button" aria-label="Remove item: '${team_ids[j]}'" data-button="">
                                Remove item</button></div>`);
                            console.log(team_ids[j]);
                            i++;
                            j++;
                        });
                    } else {
                        $('#ProjectModal #select_team_ids').append('<li>No roles assigned</li>');
                    }

                    

                    var timeline = response.date;  // Changed from text to value
                    var [selectedMonth, selectedYear] = timeline.split(' ');

                    // Set the values of the selectors
                    document.getElementById('monthSelector').value = selectedMonth;
                    document.getElementById('yearSelector').value = selectedYear;
                    console.log(response.date);
                   

                },
                error: function(response) {
                    // alert('Error fetching team details.');
                    showNotification('Error fetching member details.', true);
                }
            });
        });

        // End View Project Details

        // Submit New Project
        $('#ProjectForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'), // Use the form's action URL
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    

                    // Show a success notification
                    $('#ProjectModal #id').val('');
                    $('#ProjectModal #project_name').val('');
                    $('#ProjectModal #file_type').val('');
                    $('#ProjectModal #fileTypeSelect').val('');
                    $('#ProjectModal #fileInputContainer').empty();
                    $('#ProjectModal #sub_heading').val('');                    
                    $('#ProjectModal #desc').val('');                    
                    $('#ProjectModal #client').val('');                    
                    $('#ProjectModal #date').val('');
                    // Clear existing team
                    $('#ProjectModal #select_team_ids').empty();
                    $('#ProjectModal .choices__list--multiple').empty();
                    showNotification(response.success); // You might replace this with a custom notification function
                    // Hide the modal and reset the form
                    $('#ProjectModal .close_modal').click();


                    // Optionally, refresh your DataTable
                    $('#projects_datatable').DataTable().ajax.reload();
                    // location.reload();
                },
                error: function(xhr) {
                    // Handle validation errors
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessage += errors[key] + '\n';
                        }
                    }
                    showNotification(errorMessage, true);
                }
            });
        });
        // End of Submit New Project


        // Multi Select

        // Get all elements with the class 'dynamic-choices'
        var elements = document.querySelectorAll('.multiple-choices');
        
        elements.forEach(function(element) {
            // Initialize Choices for each element
            const choicesInstance = new Choices(element, {
                removeItemButton: true,
                placeholder: true,
                placeholderValue: 'Select Members',
                allowHTML: true
            });

            // Get the corresponding hidden input field
        const hiddenInput = document.getElementById('project_team_ids');

        // Listen for change events on the Choices instance
        element.addEventListener('change', function(event) {
            // Get selected values as an array
            const selectedValues = choicesInstance.getValue(true);

            // Update the hidden input with the selected values as a JSON string
            hiddenInput.value = JSON.stringify(selectedValues); // Convert array to JSON string
        });

        // Optionally, initialize the hidden input with existing selected values if needed
        const initialSelectedValues = element.value ? JSON.parse(element.value) : [];
        choicesInstance.setValue(initialSelectedValues);
        hiddenInput.value = JSON.stringify(initialSelectedValues); 
        });

        // End of Multi Select
        
        // Date Selector

        const currentYear = new Date().getFullYear();
        const startYear = 1900; // You can adjust the starting year as needed
        const yearSelector = document.getElementById('yearSelector');

        // Populate the year selector
        for (let year = currentYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelector.appendChild(option);
        }

        // Update text area on change
        const monthSelector = document.getElementById('monthSelector');
        const outputTextArea = document.getElementById('date');

        function updateTextArea() {
            const selectedMonth = monthSelector.value;
            const selectedYear = yearSelector.value;
            outputTextArea.value = `${selectedMonth} ${selectedYear}`;
        }

        monthSelector.addEventListener('change', updateTextArea);
        yearSelector.addEventListener('change', updateTextArea);

        // End of Date Selector

        

    });

    // Ajax Request End || Ajax Request End || Ajax Request End || Ajax Request End || Ajax Request End || Ajax Request End || Ajax Request End //



    // FileType Select & Renderer

    function updateFileInput() {
            const fileType = document.getElementById('fileTypeSelect').value;
            const fileInputContainer = document.getElementById('fileInputContainer');            
            const fileTypeInput = document.getElementById('file_type');

            fileInputContainer.innerHTML = ''; // Clear previous content

            if (fileType === 'Photo') {                
                fileTypeInput.value = 'Photo';
                fileInputContainer.innerHTML = `
                    <x-input-label for="photo" :value="__('Project File')" />
                    <div class="mb-4 d-flex justify-content-center" style="display: flex; justify-content:center !important; max-height: auto !important; min-width:100% !important; max-width:250px!important;">
                        <div>
                            <div class="img-fluid" id="selectedImage" style="margin:auto; background-size: 100% 100% ; background-repeat: no-repeat; background-image: url('welcome_assets/img/no-image.png');">
                                <img class="img-fluid" src="welcome_assets/img/portfolio/Blank_canvas.png">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-right">
                        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile1">Upload File</label>
                            <input type="file" name="file_path" class="form-control d-none" accept=".png, .jpg, .jpeg" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                        </div>
                    </div>`;
            } else if (fileType === 'Audio') {          
                fileTypeInput.value = 'Audio';
                fileInputContainer.innerHTML = `
                    <x-input-label for="audio" :value="__('Project Audio')" />
                    <audio controls class="w-100">
                        <source src="" id="audioSource" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <input type="file" name="file_path" class="form-control" accept=".mp3, .wav" id="customFile2" onchange="updateAudioSource(event)" />`;
            } else if (fileType === 'Video') {          
                fileTypeInput.value = 'Video';
                fileInputContainer.innerHTML = `
                    <x-input-label for="video" :value="__('Project Video')" />
                    <video controls class="w-100" volume="1.0">
                        <source src="" id="videoSource" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <input type="file" name="file_path" class="form-control" accept=".mp4, .mov" id="customFile3" onchange="updateVideoSource(event)" />`;
            } else if (fileType === 'Link') {          
                fileTypeInput.value = 'Link';
                fileInputContainer.innerHTML = `
                    <x-input-label for="iframe" :value="__('Project Link')" />
                    <iframe id="linkFrame" class="w-100" style="height:300px;" src=""></iframe>
                    <input type="text" name="file_path" class="form-control" id="customFile4" onchange="updateIframeSource(event)" placeholder="Enter URL" />`;
            }
        }

        function displaySelectedImage(event, elementId) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById(elementId);
                output.style.backgroundImage = `url(${reader.result})`;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function updateAudioSource(event) {
            const audioSource = document.getElementById('audioSource');
            audioSource.src = URL.createObjectURL(event.target.files[0]);
            audioSource.parentElement.load();
        }

        function updateVideoSource(event) {
            const file = event.target.files[0]; // Get the first file from the input
            if (file) {
                const videoSource = document.getElementById('videoSource');
                videoSource.src = URL.createObjectURL(file);
                videoSource.parentElement.load();
            } else {
                console.error("No file selected or invalid file.");
            }
        }


        function updateIframeSource(event) {
            const linkFrame = document.getElementById('linkFrame');
            const linkInput = document.getElementById('customFile4');
            linkInput.val = event.target.value;
            linkFrame.src = event.target.value;
        }
        // End of FileType Select & Renderer
</script>
