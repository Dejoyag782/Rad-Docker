
if (window.innerWidth < 768) {
	[].slice.call(document.querySelectorAll('[data-bss-disabled-mobile]')).forEach(function (elem) {
		elem.classList.remove('animated');
		elem.removeAttribute('data-bss-hover-animate');
		elem.removeAttribute('data-aos');
	});
}

document.addEventListener('DOMContentLoaded', function() {

	var hoverAnimationTriggerList = [].slice.call(document.querySelectorAll('[data-bss-hover-animate]'));
	var hoverAnimationList = hoverAnimationTriggerList.forEach(function (hoverAnimationEl) {
		hoverAnimationEl.addEventListener('mouseenter', function(e){ e.target.classList.add('animated', e.target.dataset.bssHoverAnimate) });
		hoverAnimationEl.addEventListener('mouseleave', function(e){ e.target.classList.remove('animated', e.target.dataset.bssHoverAnimate) });
	});
}, false);


function showNotification(message, isError = false) {
	const notificationContent = $('#notificationContent');
	const sidePanel = $('#sidePanel');
	
	// Create a new notification element
	const notificationElement = $('<div></div>')
		.addClass('notification')
		.css({
			'padding': '10px',
			'margin-bottom': '10px',
			'border': '1px solid',
			'border-color': isError ? 'red' : 'green',
			'background-color': isError ? '#f8d7da' : '#d4edda',
			'color': isError ? '#721c24' : '#155724',
			'position': 'relative'
		})
		.text(message);

	// Create a close button
	const closeButton = $('<span></span>')
		.css({
			'position': 'absolute',
			'top': '5px',
			'right': '10px',
			'cursor': 'pointer',
			'font-weight': 'bold'
		})
		.text('x')
		.click(function () {
			notificationElement.fadeOut('slow', function () {
				$(this).remove();
				// Hide the side panel if no notifications are left
				if (notificationContent.children().length === 0) {
					sidePanel.hide();
				}
			});
		});

	// Add the close button to the notification element
	notificationElement.append(closeButton);

	// Add the notification to the side panel
	notificationContent.append(notificationElement);

	// Show the side panel
	sidePanel.show();

	// Automatically hide the notification after 5 seconds
	setTimeout(function () {
		notificationElement.fadeOut('slow', function () {
			$(this).remove();
			// Hide the side panel if no notifications are left
			if (notificationContent.children().length === 0) {
				sidePanel.hide();
			}
		});
	}, 5000);
}

// Profile Pciture Edit
function displaySelectedImage(event, elementId) {
    const selectedDiv = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedDiv.style.backgroundImage = `url(${e.target.result})`;
            selectedDiv.style.backgroundSize = 'cover';  // Optionally, set the background size
            selectedDiv.style.backgroundPosition = 'center';  // Optionally, set the background position
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}


// Image Cropper


