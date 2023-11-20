document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#tanggal", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    // Fetch data for jenis dropdown on page load
    populateDropdown('jenis', '/api/jenis-pengeluaran');
    populateDropdown('kategori', '/api/kategoris/2');

    document.getElementById('kategori').addEventListener('change', function () {
        const selectedKategoriValue = this.value;

        if (selectedKategoriValue == 12) {
            alert("Selected Kategori Value:" + selectedKategoriValue)
            createAdditionalDropdown();
        } else {
            removeAdditionalDropdown();
        }
    });

    // Function to populate dropdown options using API
    function populateDropdown(dropdownId, apiUrl) {
        const dropdown = document.getElementById(dropdownId);

        axios.get(apiUrl)
            .then(function (response) {
                // Clear existing options
                dropdown.innerHTML = "";

                // Populate options
                response.data.forEach(function (item) {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.jenis_kategori || item.kategori;
                    dropdown.add(option);
                });
            })
            .catch(function (error) {
                console.error('Error fetching data:', error);
            });
    }

    // Function to create additional dropdown
    function createAdditionalDropdown() {
        // Create a div container for the additional dropdown
        const additionalSelectContainer = document.getElementById('additionalSelectContainer');
    
        // Create the additional dropdown
        const additionalDropdown = document.createElement('select');
        additionalDropdown.id = 'additionalDropdown';
        additionalDropdown.name = 'additionalDropdown';
    
        // Add options to the additional dropdown
        populateDropdown('additionalDropdown', '/api/list-produk');
    
        // Append the additional dropdown to the container
        additionalSelectContainer.appendChild(additionalDropdown);
    }
    

    // Function to remove additional dropdown
    function removeAdditionalDropdown() {
        const additionalDropdown = document.getElementById('additionalDropdown');
        if (additionalDropdown) {
            additionalDropdown.remove();
        }
    }
});
