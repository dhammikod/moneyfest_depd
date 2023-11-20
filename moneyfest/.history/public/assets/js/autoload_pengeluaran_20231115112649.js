document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tanggal", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    // Fetch data for jenis dropdown on page load
    populateDropdown('jenis', '/api/jenis-kategoris');
    populateDropdown('kategori', '/api/kategoris/1')

    // Event listener for jenis dropdown change
    document.getElementById('jenis').addEventListener('change', function() {
        // Fetch data for kategori dropdown based on selected jenis
        const selectedJenis = this.value;
        populateDropdown('kategori', '/api/kategoris/' + selectedJenis);
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
});
