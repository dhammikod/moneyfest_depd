document.addEventListener('DOMContentLoaded', function () {
    // createAdditionalDropdown();

    flatpickr("#tanggal", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    populateDropdown('kategori', '/api/kategoris/2');

    document.getElementById('kategori').addEventListener('change', function () {
        const selectedKategoriValue = this.value;

        if (selectedKategoriValue == 13) {
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

    function createAdditionalDropdown() {
        const additionalSelectContainer = document.getElementById('additionalSelectContainer');
    
        const additionalDropdown = document.createElement('select');
        additionalDropdown.id = 'additionalDropdown';
        additionalDropdown.name = 'additionalDropdown';
        additionalDropdown.style="border-color: #2F80ED; background-color: #E0E9F4"
    
        additionalSelectContainer.appendChild(additionalDropdown);
        
        // populateDropdown('additionalDropdown','/api/produk')
        const dropdown = document.getElementById('additionalDropdown');

        axios.get('/api/produk')
            .then(function (response) {
                alert(response.data[0]);

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
        
        document.getElementById('additionalDropdown').addEventListener('change', function () {
            const selectedKategoriValue = this.value;
    
            change_price(selectedKategoriValue);
        });
    }

    function change_price($id){
        if($id!= -1){
            axios.get('/api/produk/pemasukan/'+$id)
                .then(function (response) {
                    response.data.forEach(function (item) {
                        const textInputField = document.getElementById('nominal');
                        textInputField.value = item.harga_jual; 
                    });                        
                })
                .catch(function (error) {
                    console.error('Error fetching data:', error);
                });
        }else{
            const textInputField = document.getElementById('nominal');
            textInputField.value = 0;
        }
    }
    
    function removeAdditionalDropdown() {
        const additionalDropdown = document.getElementById('additionalDropdown');
        if (additionalDropdown) {
            additionalDropdown.remove();
        }
    }
});
