@extends('backend.master')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
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
                    <th>Category name</th>
                    <th>Category (Slug)</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($category as $key=>$data)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->category_name }}</td>
                    <td>{{ $data->category_slug }}</td>
                    <td>
                    <button type="button" value="{{ $data->id }}" class="btn btn-primary" id="editCategoryBtn" data-toggle="modal" data-target="#categoryModalEdit"><i class="fa fa-edit"></i></button>    
                    <a href="{{ route('category.destory',$data->id) }}" onclick="confirmation(event)" class="btn btn-danger"><i class="fa fa-trash"></i></a>    
                    </td>
                   
                  </tr>
                @endforeach
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

  {{-- Add new Category Model --}}
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       <form action="{{ route('category.store') }}" method="post" >
        @csrf
       
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" name="category_name" class="form-control" placeholder="category">
                </div>
                <div class="card-footer mr-auto">
                  <button type="submit" name="btn" class="btn btn-primary">Save</button>
                </div>
              </form>
        </div>
       
      </div>
    </div>
  </div>
  {{-- Edit Category Model --}}
<div class="modal fade" id="categoryModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       <form action="{{ route('category.update') }}" method="post" >
        @csrf
       
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" id="categoryName" name="category_name" class="form-control">
                  <input type="hidden" id="categoryId" name="category_id" class="form-control">
                </div>
                <div class="card-footer mr-auto">
                  <button type="submit" name="btn" class="btn btn-primary">Update</button>
                </div>
              </form>
        </div>
       
      </div>
    </div>
  </div>



    
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

    function clearData(){

      $('#categoryName').val('');

    }

    // __Edit Form Data Show ajax start__//

    $(document).ready(function(){

    $(document).on('click', '#editCategoryBtn', function (){

    var id = $(this).val();
    clearData();
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "/category/edit/"+id,
    success: function(response){

        $('#categoryName').val(response.category_name);
        $('#categoryId').val(response.id);

    }

    });

    });

    });

</script>

@endsection

