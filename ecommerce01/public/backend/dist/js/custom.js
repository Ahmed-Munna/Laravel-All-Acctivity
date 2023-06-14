$(document).ready(function() {
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  });
  // logout

//   $(document).on("click", "#logout", function(e){
//         e.preventDefault();
//         var link = $(this).attr("href");
//         swal({
//           title: "Are you want to logout?",
//           text: "logout",
//           icon: "warning",
//           buttons: true,
//           dangerMode: true,
//         })
//         .then(willDelete) => {
//           if (willDelete) {
//             window.location.href = link;
//           } else {
//             swal("cancel");
//           }
//         }
//        });
  

  // ajax request

  