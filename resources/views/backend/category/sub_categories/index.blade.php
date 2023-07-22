@extends('backend.master')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category</h1>
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
                   
                @foreach ($subacegory as $key=>$data)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->subcategory_name }}</td>
                    <td>{{ $data->subcategory_slug }}</td>
                    <td>{{ $data->category->category_name }}</td>
                    <td>
                    <button type="button" value="{{ $data->id }}" class="btn btn-primary" id="editSubCategoryBtn" data-toggle="modal" data-target="#subcategoryModalEdit"><i class="fa fa-edit"></i></button>    
                    <a href="{{ route('subcategory.destory',$data->id) }}" onclick="confirmation(event)" class="btn btn-danger"><i class="fa fa-trash"></i></a>    
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
       <form action="{{ route('subcategory.store') }}" method="post" >
        @csrf
       
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="category_id" required>
                  @foreach ($category as $data)
                    <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                  @endforeach
                </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Category Name</label>
                  <input type="text" name="subcategory_name" class="form-control" placeholder="sub category">
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
<div class="modal fade" id="subcategoryModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Subcategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="moda_body">
          <div class="modal-body">
            <form action="{{ route('subcategory.update') }}" method="post" >
             @csrf
            
                     <div class="form-group">
                       <label for="exampleInputEmail1">Category</label>
                     <select class="form-control" name="category_id" id="category_id" required>
                       @foreach ($category as $data)
                         <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                       @endforeach
                     </select>
     
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category Name</label>
                      <input type="text" name="subcategory_name" id="subcategory_name"  class="form-control" placeholder="sub category">
                      <input type="hidden" name="subcategory_id" id="subcategory_id"  class="form-control">
                    </div>
                     <div class="card-footer mr-auto">
                       <button type="submit" name="btn" class="btn btn-primary">Update</button>
                     </div>
                   </form>
             </div>
       
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

