<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {

        // -----------------------------------------------------------start datatable display-----------------------------------------//

        $('#team_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('getTeamMember') }}",
                type: "POST",
                data: function (data) {
                    data.search = $('input[type="search"]').val();
                }
            },
            order: ['1', 'DESC'],
            pageLength: 10,
            searching: true,
            aoColumns: [
                {
                    data: 'photo',
                    render: function (data, type, row) {
                        var photoUrl = data ? `{{ asset('storage/') }}/${data}` : `{{ asset('welcome_assets/img/no-picture.svg')}}`;
                        return `<div class="rounded-circle mx-auto" style="background-image: url('${photoUrl}'); no-repeat, #ffffff;
                        background-size: cover, auto; min-height: 50px!important; min-width: 50px!important; max-width: 50px!important;
                        max-height: 50px!important;"></div>`;
                    }
                },
                {
                    data: 'name',
                },
                {
                    data: 'linked_in',
                    render: function (data, type, row) {
                        return `<ul class="list-inline social-buttons">
                            <li class="list-inline-item display-flex justify-content-center align-items-center"><a class="justify-content-center align-items-center" href="${data}"><i style="padding-left:10px;" class="fa fa-linkedin"></i></a></li>
                        </ul>`;
                    }
                },
                {
                    data: 'team_member_roles',
                        render: function (data) {
                            if (Array.isArray(data) && data.length > 0) {
                                return '<ul style="list-style-type:disc;">' + data.map(role => `<li>${role}</li>`).join('') + '</ul>';
                            } else {
                                return ''; // Handle empty roles
                            }
                        }
                },
                {
                    data: null,
                    render: function (data, type, row) {
                            return '<button type="button" class="btn btn-secondary view-team-btn" data-bs-toggle="modal" data-id="' + row.id + '" data-bs-target="#teamModal"><i class="fa fa-eye"></i></button>' + 
                            '<button style="margin-left:5px;" class="btn btn-danger delete-btn" data-id="' + row.id + '" data-name="' + row.name + '"><i class="fa fa-trash"></i></button>';
                        },
                    orderable: false
                }
            ]
        });
    });

        // -----------------------------------------------------------end datatable display-----------------------------------------//


        

        // -----------------------------------------------------------start view/delete/archive-----------------------------------------//

        // View Team Details
        $('#team_datatable').on('click', '.view-team-btn', function() {
            var id = $(this).data('id');

            // Fetch data using AJAX
            $.ajax({
                url: '/team/' + id,  // Adjust the URL to your route
                type: 'GET',
                success: function(response) {
                    // Populate modal fields
                    $('#teamModal #id').val(response.id);
                    $('#teamModal #name').val(response.name);
                    $('#teamModal #linked_in').val(response.linked_in);
                    // Assuming response.profile_pic contains the URL of the profile picture
                    var photoUrl = response.photo ? `storage/${response.photo}` : `{{ asset('welcome_assets/img/no-picture.svg')}}`;
                    // Set the background image of the profile_pic div

                    // Clear existing roles
                    $('#teamModal #edit_member_roles').empty();
                    $('#teamModal .choices__list--multiple').empty();

                    var i = 1;
                    // Populate roles
                    if (response.roles && response.roles.length > 0) {
                        response.roles.forEach(function(role) {
                            $('#teamModal #edit_member_roles').append(`<option value="${role.id}" 
                                data-custom-properties="[object Object]">${role.role_name}</option>`);

                            $('#teamModal .choices__list--multiple').append(`<div class="choices__item 
                                choices__item--selectable" data-item="" data-id="${i}" data-value="${role.id}" 
                                data-custom-properties="[object Object]" aria-selected="true" data-deletable="">${role.role_name}
                                <button type="button" class="choices__button" aria-label="Remove item: '${role.id}'" data-button="">
                                Remove item</button></div>`);
                            console.log(role.id);
                            i++;
                        });
                    } else {
                        $('#teamModal #edit_member_roles').append('<li>No roles assigned</li>');
                    }
                    
                    $('#teamModal #customFile1').val('');
                    $('#teamModal #selectedImage').css('background-image', `url(${photoUrl})`);
                    $('#editTeamForm').attr('action', '/team/update/' + response.id); // Set form action dynamically
                    

                },
                error: function(response) {
                    // alert('Error fetching team details.');
                    showNotification('Error fetching member details.', true);
                }
            });
        });

        // Delete Button using sweet alerts
        $('#team_datatable').on('click', '.delete-btn', function() {
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
                        url: "{{ route('deleteTeamMember') }}",
                        type: "POST",
                        data: { id: id },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            showNotification(response.success);
                            $('#team_datatable').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            showNotification(response.responseJSON.error, true);
                        }
                    });
                }
            });
        });



        // -----------------------------------------------------------end view/delete/archive-----------------------------------------//

        $(document).ready(function() {

            $('#addTeamForm').on('submit', function(event) {
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
                        
                        showNotification(response.success); // You might replace this with a custom notification function
                        // Hide the modal and reset the form
                        $('#addTeamModal .close-modal').click();
                        $('#addTeamForm #customFile2').val(''); // Clear file input
                        $('#addTeamForm #name').val('');        // Clear text input
                        $('#addTeamForm #linked_in').val('');   // Clear text input


                        // Optionally, refresh your DataTable
                        $('#team_datatable').DataTable().ajax.reload();
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
        

        // Submit Form via AJAX
        $('#editTeamForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle successful update
                    $('#teamModal').modal('hide');

                    // refresh datatable
                    $('#team_datatable').DataTable().ajax.reload();
                    showNotification(response.success);
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
                        $('.notification ').css('background', 'rgb(239, 213, 213)','important');
                        showNotification(errorMessage, true);
                    }
            });
        });

    });

        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the class 'dynamic-choices'
            var elements = document.querySelectorAll('.multiple-choices');
            
            elements.forEach(function(element) {
                // Initialize Choices for each element
                new Choices(element, {
                    removeItemButton: true,
                    placeholder: true,
                    placeholderValue: 'Select roles',
                    allowHTML: true
                });
            });
        });



</script>