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

        var isArchived = false;

        function updateDataTable() {
        $('#datatable').DataTable().destroy();
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: isArchived ? "{{ route('getArchivedMessages') }}" : "{{ route('getMessages') }}",
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
                data: 'name',
            },
            {
                data: 'email',
            },
            {
                data: 'phone',
            },
            {
                data: 'desc',
            },
            {
                data: null,
                render: function (data, type, row) {
                    if (isArchived) {
                        return '<button class="btn btn-danger delete-btn" data-id="' + row.id + '"><i class="fa fa-trash"></i></button>' ;
                    } else {
                        return '<button type="button" class="btn btn-secondary view-message-btn" data-bs-toggle="modal" data-id="' + row.id + '" data-bs-target="#messageModal"><i class="fa fa-eye"></i></button>' + 
                        '<button class="btn btn-warning archive-btn" style="margin-left:3px;" data-id="' + row.id + '"><i class="fa fa-archive"></i></button>';
                    }
                    },
                orderable: false
            }
            ]
        });
        }

        $(document).ready(function () {
        updateDataTable();

        $('#toggleDatatables').click(function () {
            isArchived = !isArchived;
            updateIcon();
            updateHeader();
            updateDataTable();
        });
        
        });

        // Archive Button Icon Changer
        function updateIcon() {
            const icon = $('#toggleIcon');            
            const archiveToggler = $('#toggleDatatables');

            if (isArchived) {
                archiveToggler.removeClass('btn-warning').addClass('btn-secondary');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                archiveToggler.removeClass('btn-secondary').addClass('btn-warning');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        }

        // Header Name Toggler
        function updateHeader() {
            const header = $('#toggleHeader_messages');
            if (isArchived) {
                header.text('Review or Remove | Archived Messages ');
            } else {
                header.text('Review, Archive or Remove | Messages ');
            }
        }
        

        // -----------------------------------------------------------end datatable display-----------------------------------------//

        // -----------------------------------------------------------start view/delete/archive-----------------------------------------//

        // View Message Details
        $('#datatable').on('click', '.view-message-btn', function() {
            var id = $(this).data('id');

            // Fetch data using AJAX
            $.ajax({
                url: '/messages/' + id,  // Adjust the URL to your route
                type: 'GET',
                success: function(response) {
                    // Populate modal fields
                    $('#messageModal #id').val(response.id);
                    $('#messageModal #name').text(response.name);
                    $('#messageModal #email').text(response.email);
                    $('#messageModal #phone').text(response.phone);
                    $('#messageModal #desc').text(response.desc);
                },
                error: function(response) {
                    // alert('Error fetching message details.');
                    showNotification('Error fetching message details.');
                }
            });
        });

        // Archive Button
        $('#datatable').on('click', '.archive-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                    url: "{{ route('archiveMessage') }}",
                    type: "POST",
                    data: { id: id },
                    success: function(response) {
                        // alert(response.success);
                        showNotification(response.success);
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        // alert(response.responseJSON.error);
                        showNotification(response.responseJSON.error);
                    }
                });
        });

        // Delete Button
        $('#datatable').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                    url: "{{ route('deleteMessage') }}",
                    type: "POST",
                    data: { id: id },
                    success: function(response) {
                        // alert(response.success);
                        showNotification(response.success);
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        // alert(response.responseJSON.error);
                        showNotification(response.responseJSON.error);
                    }
                });
        });

        // -----------------------------------------------------------end view/delete/archive-----------------------------------------//

    });

    
</script>