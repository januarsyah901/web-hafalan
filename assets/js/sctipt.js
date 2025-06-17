document.addEventListener('DOMContentLoaded', function () {
    // Initialize searchable dropdowns
    initSearchableDropdown('santri');
    initSearchableDropdown('surah');
    initSearchableDropdown('hafalan');
});

function initSearchableDropdown(type) {
    const searchInput = document.getElementById(type + 'Search');
    const dropdownItems = document.querySelectorAll('#' + type + 'List .dropdown-item');
    const noResults = document.getElementById(type + 'NoResults');
    const selectedSpan = document.getElementById(type + 'Selected');
    const hiddenInput = document.getElementById(type + 'Value');
    const dropdownList = document.getElementById(type + 'List');

    // Search functionality
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        let hasResults = false;

        dropdownItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            const listItem = item.parentElement;

            if (text.includes(searchTerm)) {
                listItem.style.display = 'block';
                hasResults = true;
            } else {
                listItem.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (hasResults) {
            noResults.style.display = 'none';
        } else {
            noResults.style.display = 'block';
        }
    });

    // Item selection
    dropdownItems.forEach(item => {
        item.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            const text = this.textContent;

            // Update display
            selectedSpan.textContent = text;
            hiddenInput.value = value;

            // Update demo form
            if (type === 'santri') {
                document.getElementById('selectedSantriDisplay').value = text;
            } else if (type === 'surah') {
                document.getElementById('selectedSurahDisplay').value = text;
            }

            // Close dropdown
            const dropdown = bootstrap.Dropdown.getInstance(document.getElementById(type + 'Dropdown'));
            dropdown.hide();

            // Clear search
            searchInput.value = '';
            dropdownItems.forEach(item => {
                item.parentElement.style.display = 'block';
            });
            noResults.style.display = 'none';
        });
    });

    // Clear search when dropdown is opened
    document.getElementById(type + 'Dropdown').addEventListener('shown.bs.dropdown', function () {
        searchInput.focus();
    });

    // Prevent dropdown from closing when clicking on search input
    searchInput.addEventListener('click', function (e) {
        e.stopPropagation();
    });
}




