function handleIconClick() {
    // Check if the iframe already exists to prevent adding it multiple times
    if (!document.querySelector('iframe.chatbot-iframe')) {
      // Create and configure the iframe
      const iframe = document.createElement('iframe');
      iframe.width = '350';
      iframe.height = '430';
      iframe.allow = 'microphone;'; // Enable microphone access if necessary
      iframe.src = 'https://console.dialogflow.com/api-client/demo/embedded/b9a193b4-6938-4c71-b3a0-199b60c62b43';
      iframe.style.position = 'fixed';
      iframe.style.bottom = '90px';
      iframe.style.right = '20px';
      iframe.style.zIndex = '1000';
      iframe.classList.add('chatbot-iframe');
  
      // Append the iframe to the body
      document.body.appendChild(iframe);
    }
  }
  
  // Create the hover element (adjust CSS for style)
  const hoverElement = document.createElement('div');
  hoverElement.classList.add('chatbot-hover');
  hoverElement.textContent = 'Talk with me to book your game!';
  
  // Position the hover element (adjust CSS as needed)
  hoverElement.style.position = 'absolute';
  hoverElement.style.bottom = 'calc(100% + 10px)'; /* Position slightly below the icon */
  hoverElement.style.right = '0';
  hoverElement.style.padding = '10px'; /* Adjust padding for aesthetics */
  hoverElement.style.backgroundColor = '#fff'; /* Set background color */
  hoverElement.style.borderRadius = '5px'; /* Add rounded corners */
  hoverElement.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.2)'; /* Add subtle shadow */
  hoverElement.style.opacity = 0; /* Initially hidden */
  
  // Add the hover element to the body (before or after the icon container as needed)
  document.body.appendChild(hoverElement);
  
  // Add event listener to the icon or its container (adjust selector as needed)
  const iconContainer = document.querySelector('.your-icon-container-selector'); // Replace with your selector
  iconContainer.addEventListener('mouseover', () => {
    hoverElement.style.opacity = 1; // Show the message on hover
  });
  
  iconContainer.addEventListener('mouseout', () => {
    hoverElement.style.opacity = 0; // Hide the message on mouseout
  });
  

function search() {
    const input = document.getElementById('search-input').value.toLowerCase();
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase();
        const subtitle = card.querySelector('.card-subtitle').textContent.toLowerCase();

        if (title.includes(input) || subtitle.includes(input)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}
