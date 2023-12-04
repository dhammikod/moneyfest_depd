document.addEventListener('DOMContentLoaded', function() {

});
var options = {
  valueNames: ['id', 'nama', 'jabatan', 'gaji']
};

alert("cicaktengkorak");

// Init list
var contactList = new List('contacts', options);

var idField = $('#id-field'),
  nameField = $('#nama-field'),
  kategoriField = $('#jabatan-field'),
  nominalField = $('#gaji-field'),
  addBtn = $('#add-btn'),
  editBtn = $('#edit-btn').hide(),
  removeBtns = $('.remove-item-btn'),
  editBtns = $('.edit-item-btn');