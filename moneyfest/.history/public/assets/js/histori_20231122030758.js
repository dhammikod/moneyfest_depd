document.addEventListener('DOMContentLoaded', function () {
  flatpickr("#tanggal", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
  });

  document.getElementById('kategori').addEventListener('change', function () {
    const selectedKategoriValue = this.value;

    if (selectedKategoriValue == 12 || selectedKategoriValue == 4) {
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
    additionalDropdown.style = "border-color: #2F80ED; background-color: #E0E9F4"

    additionalSelectContainer.appendChild(additionalDropdown);

    // populateDropdown('additionalDropdown','/api/produk')
    const dropdown = document.getElementById('additionalDropdown');

    axios.get('/api/produk')
      .then(function (response) {
        var index = 0;
        response.data.forEach(function (item) {
          if (response.data.length > 0 && index == 0) {
            change_price(item.id);
          }
          index++;
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

  function change_price($id,$url) {
    if ($id != -1) {
      axios.get('/api/produk/pemasukan/' + $id)
        .then(function (response) {
          response.data.forEach(function (item) {
            const textInputField = document.getElementById('nominal');
            textInputField.value = item.harga_jual;
          });
        })
        .catch(function (error) {
          console.error('Error fetching data:', error);
        });
    } else {
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
var options = {
  valueNames: ['id', 'name', 'kategori', 'nominal', 'jumlah', 'satuan', 'tanggal', 'catatan']
};

// Init list
var contactList = new List('contacts', options);

var idField = $('#id-field'),
  nameField = $('#name-field'),
  kategoriField = $('#kategori-field'),
  nominalField = $('#nominal-field'),
  jumlahField = $('#jumlah-field'),
  satuanField = $('#satuan-field'),
  tanggalField = $('#tanggal-field'),
  addBtn = $('#add-btn'),
  editBtn = $('#edit-btn').hide(),
  removeBtns = $('.remove-item-btn'),
  editBtns = $('.edit-item-btn');

