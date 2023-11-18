document.addEventListener('DOMContentLoaded', function() {
  flatpickr("#tanggal", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
  });
});
var options = {
  valueNames: ['id', 'nama', 'jenis', 'deskripsi', 'stok', 'harga_jual', 'harga_beli', 'terjual']
};

// Init list
var contactList = new List('contacts', options);

var idField = $('#id-field'),
  nameField = $('#nama-field'),
  kategoriField = $('#jenis-field'),
  nominalField = $('#deskripsi-field'),
  jumlahField = $('#stok-field'),
  satuanField = $('#harga_jual-field'),
  tanggalField = $('#harga_beli-field'),
  tanggalField = $('#terjual-field'),
  addBtn = $('#add-btn'),
  editBtn = $('#edit-btn').hide(),
  removeBtns = $('.remove-item-btn'),
  editBtns = $('.edit-item-btn');