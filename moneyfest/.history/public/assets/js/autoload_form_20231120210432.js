document.addEventListener('DOMContentLoaded', function () {
    createAdditionalDropdown();

    flatpickr("#tanggal", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    // Fetch data for jenis dropdown on page load
    populateDropdown('kategori', '/api/kategoris/2');

    document.getElementById('kategori').addEventListener('change', function () {
        const selectedKategoriValue = this.value;

        if (selectedKategoriValue == 12) {
            createAdditionalDropdown();
        } else {
            removeAdditionalDropdown();
        }
    });

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
        additionalDropdown.style="border-color: #2F80ED; background-color: #E0E9F4"
    
        // Append the additional dropdown to the container
        additionalSelectContainer.appendChild(additionalDropdown);
        
        // populateDropdown('additionalDropdown','/api/produk')
        const dropdown = document.getElementById('additionalDropdown');

        axios.get('/api/produk')
            .then(function (response) {

                // Populate options
                response.data.forEach(function (item) {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.nama;
                    dropdown.add(option);
                });
                const option = document.createElement('option');
                    option.value = -1;
                    option.text = 'none of the above';
                    dropdown.add(option);
            })
            .catch(function (error) {
                console.error('Error fetching data:', error);
            });
        
        additionalDropdown.addEventListener('change', function () {
            const selectedValue = this.value;
            console.log('Selected Value:', selectedValue);

            // Make an API request based on the selected value
            // Replace a certain value in a text input field with the id of nominal
            const textInputField = document.getElementById('yourTextInputFieldId');
            textInputField.value = selectedValue; // Replace with the desired logic
        });
    }
    

    // Function to remove additional dropdown
    function removeAdditionalDropdown() {
        const additionalDropdown = document.getElementById('additionalDropdown');
        if (additionalDropdown) {
            additionalDropdown.remove();
        }
    }
});
