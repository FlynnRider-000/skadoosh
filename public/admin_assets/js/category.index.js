jQuery(function ($) {

  let table = $('#list-table').DataTable({
      "responsive": true,
      "pageLength": 50
  });

  // Sort by datatable desc
  table.order([0, 'desc'])
      .draw();

})