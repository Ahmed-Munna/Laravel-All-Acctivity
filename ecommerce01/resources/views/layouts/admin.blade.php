<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Commerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- Toastr plagin -->
  <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> 
@guest

@else
<div class="wrapper">
        <!-- Navbar -->
        @include('layouts.admin_partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.admin_partials.sidebar')
    @endguest
  <!-- Content Wrapper. Contains page content -->
    @yield('admin_content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<script src="{{asset('backend/plugins/tpastr/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('backend/dist/js/custom.js')}}"></script>
<script type="text/javascript       ">
  //alart massege

  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

    // $("#updateCategory").click(function() {

    //   var url =  $(this).data("url");
      // $.get(url, function(data) {

      //   $("#categoryId").attr("value", data.id);
      //   $("#categoryName").attr("value", data.category_name);

      // });
        // console.log(url);
      // $("#fromRoute").attr("action", "{{route('category.update')}}");
      // $(".modal-title").text("Update Category");

    // });

    $("#createCategory").click(function() {

      $("#fromRoute").attr("action", "{{route('category.create')}}");
      $("#fromRoute").attr("method", "post");
      $(".modal-title").text("Create Category");
      $(".save").attr("id", "create");

    });

    $("#cancel").click(function() {

      $("#categoryId").removeAttr("value");
      $("#categoryName").removeAttr("value");
      $("#fromRoute").removeAttr("action");
      $("#fromRoute").removeAttr("action");
      
    });

    $(document).on("click", "#updateCategory", function() {
      let url = $(this).data('url');
      $.get(url, function(data) {
         
        $("#categoryId").attr("value", data.id);
        $("#categoryName").attr("value", data.category_name);
         
      });
      $("#fromRoute").attr("action", "{{route('category.update')}}");
      $("#fromRoute").attr("method", "post");
      $(".modal-title").text("Update Category");
      $(".save").attr("id", "update");
    });

    // $(document).on("click", "#update", function() {
    //   $.ajax({
    //     url: "{{route('category.update')}}",
    //     type: "post",
    //     data: {
    //       _tocen: _tocen,
    //       categoryId: id,
    //       categoryName: categoryName,
    //     },
    //     error: function (data) {
    //       console.log('update successfull');
    //     } 
    //   });
    // });

    $(document).on('click', '#updateCategory', function() {
      let url = $(this).data('url');
      $.get(url, function(data) {
        $("#subCategoryId").attr("value", data.id);
        $("#editsubCategory").attr("value", data.subcategory_name);
      });
    });

    // child category data table

    $(function childCategory() {
      let table = $('.ytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('childcategory.index')}}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'category_name', name: 'category_name'},
          {data: 'subcategory_name', name: 'subcategory_name'},
          {data: 'childcategory_name', name: 'childcategory_name'},
          {data: 'slug', name: 'slug'},
          {data: 'action', name: 'action', oderable: true, serchable: true}
        ]
      });
    });

   /*
    Print the brand datatable using Laravel yajara package 
    to display the brand information.
  */

    $(function brand() {
      let table = $('.brandtable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('brand.index')}}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'brand_name', name: 'brand_name'},
          {data: 'slug', name: 'slug'},
          {data: 'brand_image', name: 'brand_image', render: function (data, type, full, meta) {
            return "<img src=\"" + data + "\" height=\"40\" width=\"40\" >";
          }},
          {data: 'action', name: 'action', oderable:true, serchable: true}
        ]
      });
    });

  // # End of brand datatable code

    // page creation data table

    $(function pages() {
        let pageCreate = $('.allpagetable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{route('page.index')}}",
          
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'page_name', name: 'page_name'},
            {data: 'page_title', name: 'page_title'},
            {data: 'action', name: 'action', oderable: true, serchable: true},
          ],
        });
    });

    // end of table

    // coupon

    $(function coupon() {
      let coupons = $('.cuponTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('coupon.index')}}",

        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'coupon_code', name: 'coupon_code'},
          {data: 'coupon_amount', name: 'coupon_amount'},
          {data: 'valid_date', name: 'valid_date'},
          {data: 'coupon_type', name: 'coupon_type'},
          {data: 'coupon_status', name: 'coupon_status'},
          {data: 'action', name: 'action', oderable: true, serchable: true},
        ],
      });
    });

    // end coupon

    // brand update view

    $(document).on('click', '#updateBrand', function () {
      let url = $(this).attr('href');
   
        $.get(url, function(data) {
          $('#brandId').attr('value', data.id);
          $('#oldimg').attr('src', data.brand_image);
          $('#brandName2').attr('value', data.brand_name);
        });
    });

    // update view

    $(document).on('click', '.update', function() {
      let url = $(this).data('url');
      $.get(url,function(data) {
        $('#childCategoryId').attr('value', data.id);
        $('#editchildCategory').attr('value', data.childcategory_name);
      })
    });

    // delete 

    $(document).on('click', '.delete', function() {
      let url = $(this).data('url');
      $.get(url, function() {
        console.log('done');
      });
    });
    				

    //page management update view

    $(document).on('click', '#updatePage', function() {
      let url = $(this).attr('href');
      
      $.get(url,function(data) {
        $('#id').attr('value', data.id);
        $('#update_page_name').attr('value', data.page_name);
        $('#update_page_title').attr('value', data.page_title);
        $('#update_page_discription').text(data.page_discription);

        if ($("#one").val() == data.page_position) {
          $("#one").prop('selected', true);
        } else if ($("#two").val() == data.page_position) {
          $("#two").prop('selected', true);
        } else {
          $("#three").prop('selected', true);
        }
      })
    });

    $(document).ready(function() {

      

    //   $("#updatePage").click(function () {
    //   // let url = $("#updatePage").attr('href');

      

    //   // $.get(url, function (data) {
    //   //   $('').attr('value', data.id);
    //   //   $('').attr('value', data.page_position);
    //   //   $('').attr('value', data.page_name);
    //   //   $('').attr('value', data.page_slug);
    //   //   $('').attr('value', data.page_title);
    //   //   $('').text(data.page_discription);

    //   //   console.log(data);
    //   // });
    // });
  })



</script>
</body>
</html>