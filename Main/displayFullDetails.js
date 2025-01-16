
document.addEventListener('DOMContentLoaded', function () {
    // Get all boxes-container elements
    const boxesContainers = document.querySelectorAll('.boxes-container');

    // Add click event listener to each boxes-container
    boxesContainers.forEach(box => {
        box.addEventListener('click', function () {
            const itemId = this.getAttribute('data-id'); // Get the item ID

            // Fetch item details using AJAX
            fetch(`getItemsDetails.php?id=${itemId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    // Update the overlay content with the fetched data
                    const overlayContent = document.querySelector('.overlay-content');
                    if (overlayContent) {
                        overlayContent.innerHTML = data;
                    }

                    // Show the overlay
                    const overlay = document.getElementById('overlay');
                    if (overlay) {
                        overlay.style.display = 'flex';
                    }
                })
                .catch(error => {
                    console.error('Error fetching item details:', error);
                    // Optionally, display an error message in the overlay
                    const overlayContent = document.querySelector('.overlay-content');
                    if (overlayContent) {
                        overlayContent.innerHTML = '<p>Error loading item details. Please try again.</p>';
                    }
                });
        });
    });

    // Close overlay when the close button is clicked or when clicking outside the overlay content
    const overlay = document.getElementById('overlay');
    if (overlay) {
        overlay.addEventListener('click', function (event) {
            if (event.target.id === 'close' || event.target === this) {
                this.style.display = 'none'; // Hide the overlay
            }
        });
    }
});
