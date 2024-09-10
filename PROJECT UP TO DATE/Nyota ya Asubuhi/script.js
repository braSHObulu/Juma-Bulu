document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signup-form');

    signupForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const role = document.getElementById('role').value;

        // Simulate user registration (e.g., save to a database)
        console.log(`User registered: Name=${name}, Email=${email}, Role=${role}`);

        // Redirect to the appropriate dashboard
        if (role === 'donor') {
            window.location.href = 'donor-dashboard.html';
        } else if (role === 'sponsor') {
            window.location.href = 'sponsor-dashboard.html';
        }
    });
});

//code for donor dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Handle donation form submission
    const donationForm = document.getElementById('donation-form');
    donationForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const amount = document.getElementById('amount').value;
        console.log(`Donation made: Amount=${amount}`);
        alert('Thank you for your donation!');
    });

    // Handle newsletter subscription form submission
    const newsletterForm = document.getElementById('newsletter-form');
    newsletterForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const email = document.getElementById('newsletter-email').value;
        console.log(`Newsletter subscription: Email=${email}`);
        alert('Thank you for subscribing to our newsletter!');
    });
});

// Function to view impact reports
function viewReports() {
    const reportList = document.getElementById('report-list');
    reportList.innerHTML = `
        <ul>
            <li><a href="#">Impact Report 2023</a></li>
            <li><a href="#">Impact Report 2022</a></li>
            <li><a href="#">Impact Report 2021</a></li>
        </ul>
    `;
}
//codes for sponsor dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Handle sponsorship form submission
    const sponsorshipForm = document.getElementById('sponsorship-form');
    sponsorshipForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const sponsorshipOption = document.getElementById('sponsorship-option').value;
        console.log(`Sponsorship option selected: ${sponsorshipOption}`);
        alert(`You have selected to sponsor a ${sponsorshipOption === 'child' ? 'specific child' : 'program'}.`);
    });

    // Handle gift form submission
    const giftForm = document.getElementById('gift-form');
    giftForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const giftMessage = document.getElementById('gift-message').value;
        console.log(`Gift message sent: ${giftMessage}`);
        alert('Your gift and message have been sent!');
    });
});

function viewChildProfile() {
    const childProfile = document.getElementById('child-profile');
    childProfile.innerHTML = `
        <h4>Sponsored Child Profile</h4>
        <p>Name: John Doe</p>
        <p>Age: 10</p>
        <p>Favorite Activities: Soccer, Drawing</p>
        <!-- Add more profile details as needed -->
    `;
}

function viewProgressReports() {
    const progressReports = document.getElementById('progress-reports');
    progressReports.innerHTML = `
        <h4>Progress Reports</h4>
        <ul>
            <li><a href="#">Progress Report June 2023</a></li>
            <li><a href="#">Progress Report May 2023</a></li>
            <li><a href="#">Progress Report April 2023</a></li>
        </ul>
    `;
}

function viewEventInfo() {
    const eventInfo = document.getElementById('event-info');
    eventInfo.innerHTML = `
        <h4>Upcoming Events</h4>
        <ul>
            <li>Annual Charity Gala - July 25, 2023</li>
            <li>Back-to-School Drive - August 15, 2023</li>
            <li>Holiday Party - December 20, 2023</li>
        </ul>
    `;
}


