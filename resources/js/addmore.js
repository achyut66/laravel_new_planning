document.addEventListener('DOMContentLoaded', function() {
    // Select the table body and row template
    const tableBody = document.querySelector('#membersTable tbody');
    const rowTemplate = document.querySelector('#rowTemplate').content;

    // Handle click event for adding new rows
    tableBody.addEventListener('click', function(event) {
        if (event.target.closest('.addMore')) {
            const newRow = document.importNode(rowTemplate, true);

            // Update the serial number for the new row
            const rows = tableBody.querySelectorAll('tr');
            newRow.querySelector('td').textContent = `${rows.length + 1}.`;
            
            // Append the new row to the table body
            tableBody.appendChild(newRow);
        }

        // Handle click event for removing rows
        if (event.target.closest('.removeRow')) {
            if (confirm('Are you sure you want to remove this row?')) {
                const row = event.target.closest('tr');
                if (row && row.parentNode) {
                    row.parentNode.removeChild(row);
                }
                // Update row numbers
                updateRowNumbers();
            }
        }
    });

    // Function to update row numbers after removing a row
    function updateRowNumbers() {
        const rows = tableBody.querySelectorAll('tr');
        rows.forEach((row, index) => {
            row.querySelector('td').textContent = `${index + 1}.`;
        });
    }
});
