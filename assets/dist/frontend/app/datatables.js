$(document).ready(function () {
    $('#example1').DataTable({
        responsive: true,
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
    });
});