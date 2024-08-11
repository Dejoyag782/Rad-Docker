<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.view-history-btn').forEach(button => {
        button.addEventListener('click', async () => {
            const id = button.getAttribute('data-id');
            // console.log(id);
            try {
                const response = await fetch(`/history/${id}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                // Set the values in the modal
                document.getElementById('id').value = data.id;
                // console.log(data.id);
                // console.log(data.photo);                
                // console.log(data.timeline);                
                // console.log(data.title);                
                // console.log(data.desc);

                document.getElementById('submitBtn').innerText = 'Submit Changes';
                document.getElementById('selectedImage').style.backgroundImage = `url(${data.photo ? 'storage/' + data.photo : 'https://static.vecteezy.com/system/resources/previews/021/277/888/original/picture-icon-in-flat-design-style-gallery-symbol-illustration-png.png'})`;
                const timeline = data.timeline;  // Changed from text to value
                const [selectedMonth, selectedYear] = timeline.split(' ');

                // Set the values of the selectors
                document.getElementById('monthSelector').value = selectedMonth;
                document.getElementById('yearSelector').value = selectedYear;

                document.getElementById('title').value = data.title; // Changed from text to value
                document.getElementById('desc').value = data.desc; // Changed from text to value
            } catch (error) {
                console.error('Fetch error:', error);
            }
        });
    });


    document.querySelectorAll('.add-timeline-btn').forEach(button => {
        button.addEventListener('click', async () => {

                // Set the values in the modal
                document.getElementById('id').value = '';

                document.getElementById('submitBtn').innerText = 'Add Timeline';
                document.getElementById('selectedImage').style.backgroundImage = `url('https://static.vecteezy.com/system/resources/previews/021/277/888/original/picture-icon-in-flat-design-style-gallery-symbol-illustration-png.png')`;
                document.getElementById('timeline').value = ''; // Changed from text to value
                document.getElementById('title').value = ''; // Changed from text to value
                document.getElementById('desc').value = ''; // Changed from text to value
           
        });
    });

    const deleteHistoryBtns = document.querySelectorAll('.delete-history-btn');

    deleteHistoryBtns.forEach(btn => {
    btn.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission if applicable

        const historyId = this.dataset.id; // Access data-id attribute

        Swal.fire({
        title: 'Are you sure?',
        text: `Are you sure to remove timeline"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!'
        }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/destroy-history/${historyId}`, { // Use fetch API for AJAX request
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
                    const historyItem = document.querySelector(`[data-id="${historyId}"]`).closest('li');
                    historyItem.parentNode.removeChild(historyItem);
                    showNotification(data.success);
                } else {
                    // Error: Handle error (e.g., show error message)
                    showNotification(data.error, true);
                }
            })
            .catch(error => {
            // Handle network or other errors
            console.error('Error deleting history:', error);
            showNotification('An error occurred. Please try again later.', true);
            });
        }
        });
    });
    });
    

});



document.addEventListener('DOMContentLoaded', function() {
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
    const outputTextArea = document.getElementById('timeline');

    function updateTextArea() {
        const selectedMonth = monthSelector.value;
        const selectedYear = yearSelector.value;
        outputTextArea.value = `${selectedMonth} ${selectedYear}`;
    }

    monthSelector.addEventListener('change', updateTextArea);
    yearSelector.addEventListener('change', updateTextArea);
});




</script>
