@extends('backend.master')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>child Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add New</button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Subcategory name</th>
                    <th>Subcategory (Slug)</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                   
               
                  <tr>
                    <td>child</td>
                    <td>child</td>
                    <td>child</td>
                    <td>child</td>
                    <td>
                    <button type="button" value="child" class="btn btn-primary" id="editSubCategoryBtn" data-toggle="modal" data-target="#subcategoryModalEdit"><i class="fa fa-edit"></i></button>    
                    <a href="child" onclick="confirmation(event)" class="btn btn-danger"><i class="fa fa-trash"></i></a>    
                    </td>
                   
                  </tr>
               
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  {{-- ----------------Category Model----------------- --}}




    
@endsection

{{-- ========================================style and script==================== --}}

@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/') }}backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
{{-- Data table script --}}
<script>
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
  </script>

  {{-- ajax script --}}
<script>

  // $('body').on('click','#editSubCategoryBtn',function(){

  //   let id = $(this).data('id');
  //   $.get("subcategory/edit/"+id, function(data){

  //     $("moda_body").html(data);


  //   });

  // });

    function clearData(){

      $('#categoryName').val('');

    }

    // __Edit Form Data Show ajax start__//

    $(document).ready(function(){

    $(document).on('click', '#editSubCategoryBtn', function (){

      var id = $(this).val();
    clearData();
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "/subcategory/edit/"+id,
    success: function(response){

      $('#subcategory_name').val(response.subcategory_name);
        $('#category_id').val(response.category_id );
        $('#subcategory_id').val(response.id );

    }

    });

    });

    });

</script>

@endsection

