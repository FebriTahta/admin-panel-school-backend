@extends('layouts.new_layouts.master')
 
@section('hero-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">banner</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">List</h6>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4" style="min-height: 500px">
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="col-md-12 mt-4">
            <a href="/admin-create-banner" class="btn btn-xs btn-primary">New banner</a>
        </div>
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>banner</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">---</span>  Daftar banner
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama banner</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desc banner</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($banner as $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="{{asset('image_banner/'.$item->banner_image)}}" class="avatar avatar-sm me-3" alt="team7">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="/admin-edit-banner/{{$item->id}}" >
                                        <h6 class="mb-0 text-sm">
                                            @if (strlen($item->banner_name) > 30)
                                                {{substr($item->banner_name,0,30)}} ...
                                            @else
                                                {{$item->banner_name}}
                                            @endif
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">
                                {{substr($item->banner_desc,0,50)}}...
                            </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="#x" class="text-xs font-weight-bold text-danger" data-toggle="modal" data-target="#modal-delete" id="btn-dell" 
                            onclick="hapus('{{$item->id}}','{{$item->banner_name}}')"
                            > Hapus </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="pagination" style="margin-top: 20px">
            {{$banner->links('pagination::bootstrap-4')}}
          </div>
        </div>
      </div>
 </div>

 <div class="modal fade" id="modal-edit" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
          <h5 class="modal-title text-white">DATA KATEGORI</h5>
        </div>
        <form id="form_edit">@csrf
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-12 col-12">
                        <input type="hidden" name="id" id="edit_id">
                        <input type="text" class="form-control text-capitalize" id="kategori_name" name="kategori_name" placeholder="NAMA KATEGORI" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" id="btn_edit" class="btn btn-sm btn-primary" value="SUBMIT">
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-delete" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
          <h5 class="modal-title text-white">Remove</h5>
        </div>
        <form id="form_dell">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="mainmenu_name">Nama banner</label>
                    <input type="hidden" id="delete_banner_id" name="id" required>
                    <input type="text" readonly id="delete_banner_name" name="banner_name" class="form-control" placeholder="..." required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" value="Delete" id="btndel">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>

    function hapus(id,banner_name) {
        $('#delete_banner_id').val(id);
        $('#delete_banner_name').val(banner_name);
        console.log(id +'-'+ banner_name);
    }

    $('#form_dell').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/remove-banner",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btndel').attr('disabled', 'disabled');
                $('#btndel').val('Process...');
            },
            success: function(response) {
                if (response.status == 200) {
                    $("#form_dell")[0].reset();
                    $('#btndel').val('Hapus');
                    $('#btndel').attr('disabled', false);
                    toastr.success(response.message);
                    swal({
                        title: "SUCCESS!",
                        text: response.message,
                        type: "success",
                        timer: 2000,
                    }).then(okay => {
                        if (okay) {
                            window.location.href = "/admin-banner";
                        }
                    });
                } else {
                    $('#btndel').val('Hapus!');
                    $('#btndel').attr('disabled', false);
                    toastr.error(response.message);
                    $('#errList').html("");
                    $('#errList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_values) {
                        $('#errList').append('<div>' + err_values + '</div>');
                    });
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>
@endsection