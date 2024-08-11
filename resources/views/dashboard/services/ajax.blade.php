<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.view-service-btn').forEach(button => {
        button.addEventListener('click', async () => {
            const id = button.getAttribute('data-id');
            // console.log(id);
            try {
                const response = await fetch(`/service/${id}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                // Set the values in the modal
                document.getElementById('id').value = data.id;
                
                document.getElementById('serviceModalLabel').innerText = 'Service Details';                               
                document.getElementById('faviconPreview').setAttribute('class', 'fa '+ data.icon +' fa-stack-1x fa-inverse');
                document.getElementById('submitBtn').innerText = 'Submit Changes';                
                document.getElementById('selectedFavicon').value = data.icon;
                document.getElementById('name').value = data.name; // Changed from text to value
                document.getElementById('desc').value = data.desc; // Changed from text to value  
                
                // Display roles
                const rolesContainer = document.getElementById('roleContainer');
                rolesContainer.innerHTML = ''; // Clear existing roles

                const rolesInput = document.querySelector('input[name="roles[]"]');
                let rolesArray = [];

                if (data.roles && data.roles.length > 0) {
                    // console.log('Roles received:', data.roles); // Log the roles data
                    data.roles.forEach(role => {
                        // Create a new role capsule
                        const roleCapsule = document.createElement('div');
                        roleCapsule.className = 'roleCapsule';
                        
                        // Create role text
                        const roleText = document.createElement('span');
                        roleText.textContent = role.role_name;
                        roleCapsule.appendChild(roleText);

                        // Create delete button
                        const deleteBtn = document.createElement('span');
                        deleteBtn.className = 'deleteBtn';
                        deleteBtn.textContent = 'x';
                        deleteBtn.addEventListener('click', () => {
                            roleCapsule.remove();
                            // Optionally update rolesArray and rolesInput value
                            rolesArray = rolesArray.filter(r => r !== role.role_name);
                            rolesInput.value = JSON.stringify(rolesArray);
                            console.log('Updated roles array:', rolesArray);
                        });
                        roleCapsule.appendChild(deleteBtn);

                        // Append role capsule to the container
                        rolesContainer.appendChild(roleCapsule);

                        // Add role to rolesArray
                        rolesArray.push(role.role_name);
                    });
                } else {
                    rolesContainer.innerHTML = '<div id="noRolesMessage">No roles found for this service.</div>';
                    console.log('No roles found for this service.');

                    // Fade out and remove message after 3 seconds
                    setTimeout(() => {
                        const noRolesMessage = document.getElementById('noRolesMessage');
                        if (noRolesMessage) {
                            noRolesMessage.style.transition = 'opacity 1s';
                            noRolesMessage.style.opacity = '0';
                            setTimeout(() => noRolesMessage.remove(), 1000); // Remove after fade-out
                        }
                    }, 2000);
                }
                rolesInput.value = JSON.stringify(rolesArray); // Use JSON.stringify to serialize the array
            
                // Display portfolio
                const subHeaderInput = document.getElementById('sub_header');
                const selectedImage = document.getElementById('selectedImage');
                console.log(data.portfolios[0]);
                if (data.portfolios && data.portfolios.length > 0) {
                    const portfolio = data.portfolios[0]; // Assuming one portfolio per service
                    subHeaderInput.value = portfolio.sub_header;
                    
                    if (portfolio.thumbnail) {
                        selectedImage.style.backgroundImage = `url({{ asset('storage/${portfolio.thumbnail}') }})` ;
                    }
                } else {
                    subHeaderInput.value = '';
                    selectedImage.style.backgroundImage = `url('{{asset('welcome_assets/img/no-image.png')}}')`;
                }

            } catch (error) {
                console.error('Fetch error:', error);
            }
        });
    });


    document.querySelectorAll('.add-service-btn').forEach(button => {
        button.addEventListener('click', async () => {

                // Set the values in the modal
                document.getElementById('id').value = '';
                document.getElementById('serviceModalLabel').innerText = 'Add New Service';
                document.getElementById('faviconPreview').setAttribute('class', 'fa fa-question-circle fa-stack-1x fa-inverse');
                document.getElementById('submitBtn').innerText = 'Add Service';             
                document.getElementById('selectedFavicon').value = 'fa-question-circle';                
                const selectedImage = document.getElementById('selectedImage');
                document.getElementById('sub_header').value = '';
                selectedImage.style.backgroundImage = `url('{{asset('welcome_assets/img/no-image.png')}}')`;
                document.getElementById('name').value = '';
                document.getElementById('desc').value = '';

                const rolesContainer = document.getElementById('roleContainer');
                rolesContainer.innerHTML = ''; // Clear existing roles

                const rolesInput = document.querySelector('input[name="roles[]"]');
                let rolesArray = [];                
                rolesInput.value = JSON.stringify(rolesArray); // Use JSON.stringify to serialize the array
           
        });
    });

    const deleteServiceBtns = document.querySelectorAll('.delete-service-btn');

    deleteServiceBtns.forEach(btn => {
    btn.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission if applicable

        const serviceId = this.dataset.id; // Access data-id attribute

        Swal.fire({
        title: 'Are you sure?',
        text: `Are you sure to remove service"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!'
        }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/destroy-service/${serviceId}`, { // Use fetch API for AJAX request
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token
            }
            })
            .then(response => response.json()) // Parse response as JSON
            .then(data => {
                if (data.success) {
                    // Success: Update UI (e.g., remove list item, show success message)
                    const serviceItem = document.querySelector(`[data-id="${serviceId}"]`).closest('div');
                    serviceItem.parentNode.removeChild(serviceItem);
                    showNotification(data.success);
                } else {
                    // Error: Handle error (e.g., show error message)
                    showNotification(data.error, true);
                }
            })
            .catch(error => {
            // Handle network or other errors
            console.error('Error deleting service:', error);
            showNotification('An error occurred. Please try again later.', true);
            });
        }
        });
    });
    });
    
// FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR //
    
    // Array of Font Awesome icon classes
    var favicons = [
        'fa-camera', 'fa-camera-retro', 'fa-film','fa-headphones', 'fa-music', 'fa-play',
        'fa-play-circle', 'fa-podcast', 'fa-rss', 'fa-stop', 'fa-stop-circle', 'fa-tv', 
        'fa-video-camera', 'fa-volume-up', 'fa-code', 'fa-cogs', 'fa-database', 
        'fa-desktop', 'fa-edit', 'fa-folder', 'fa-folder-open', 'fa-laptop', 
        'fa-server', 'fa-upload', 'fa-apple', 'fa-microphone',
        'fa-paint-brush', 'fa-pencil', 'fa-eggplant'
    ];

    
    // Append favicons to the modal
    favicons.forEach(function(icon) {
        $('#faviconOptions').append(
        '<div class="col-3 text-center">' +
        '<i class="fa ' + icon + ' favicon-option" data-favicon="' + icon + '" data-dismiss="modal"></i>' +
        '</div>'
        );
    });

    // Handle favicon selection
    $(document).on('click', '.favicon-option', function() {
        $('.favicon-option').removeClass('selected'); // Remove previous selections
        $(this).addClass('selected'); // Add selected class to the clicked icon

        var selectedFavicon = $(this).data('favicon');
        $('#selectedFavicon').val(selectedFavicon);
        $('#faviconPreview').attr('class', 'fa ' + selectedFavicon + ' fa-stack-1x fa-inverse').show();
        $('#faviconModal').modal('hide');
    });

// !! FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR = FAVICON SELECTOR !! //

// ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR //

    const roleInput = document.getElementById('roleInput');
    const addRoleBtn = document.getElementById('addRoleBtn');
    const roleContainer = document.getElementById('roleContainer');
    const rolesInput = document.getElementById('rolesInput');

    function getRoles() {
        const roles = [];
        roleContainer.querySelectorAll('.roleCapsule').forEach(capsule => {
            roles.push(capsule.textContent.replace('x', '').trim());
        });
        return roles;
    }

    function updateRolesInput() {
        rolesInput.value = JSON.stringify(getRoles());
    }

    addRoleBtn.addEventListener('click', function() {
        const roleValue = roleInput.value.trim();

        if (roleValue !== '') {
            const roleCapsule = document.createElement('div');
            roleCapsule.classList.add('roleCapsule');
            roleCapsule.textContent = roleValue;

            const deleteBtn = document.createElement('span');
            deleteBtn.classList.add('deleteBtn');
            deleteBtn.textContent = 'x';
            deleteBtn.addEventListener('click', function() {
                roleContainer.removeChild(roleCapsule);
                updateRolesInput();
            });

            roleCapsule.appendChild(deleteBtn);
            roleContainer.appendChild(roleCapsule);
            roleInput.value = '';
            updateRolesInput();
        }
    });

    document.getElementById('ServiceForm').addEventListener('submit', function() {
        updateRolesInput();
        console.log(getRoles());
    });


// !! ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR = ROLES CREATOR !! //
  


});
   
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
