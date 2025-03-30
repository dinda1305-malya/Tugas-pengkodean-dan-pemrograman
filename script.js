document.getElementById('logout').addEventListener('click', function() {
    // Add logout logic here
    alert('Logging out...');
});

// Example: Fetch sales data using AJAX
document.getElementById('sales-filter').addEventListener('submit', function(e) {
    e.preventDefault();
    const year = document.getElementById('year').value;
    const month = document.getElementById('month').value;

    // Simulate fetching data
    console.log(`Fetching sales data for ${month} ${year}`);
});