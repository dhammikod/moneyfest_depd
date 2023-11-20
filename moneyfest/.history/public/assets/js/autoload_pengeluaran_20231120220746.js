document.addEventListener('DOMContentLoaded', function() {
    createAdditionalDropdown();

    flatpickr("#tanggal", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    populateDropdown('kategori', '/api/kategoris/1');

    document.getElementById('kategori').addEventListener('change', function () {
        const selectedKategoriValue = this.value;

        if (selectedKategoriValue == 4) {
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
});
