document.addEventListener('DOMContentLoaded', function() {
  flatpickr("#tanggal", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
  });
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