@extends('layouts.new_layouts.master')
 
@section('hero-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Arsip</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">List</h6>
</nav>
@endsection

@section('content')
<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
  </style>

<div class="container-fluid py-4" style="min-height: 500px">
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="col-md-12 mt-4">
            <a href="/admin-create-arsip" class="btn btn-xs btn-primary">Arsip Baru</a>
        </div>
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Arsip</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">---</span>  Daftar Arsip
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Arsip Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="{{asset('arsip_image/'.$item->arsip_image)}}" class="avatar avatar-sm me-3" alt="team7">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="/admin-edit-arsip/{{$item->id}}" >
                                        <h6 class="mb-0 text-sm">
                                          @if (strlen($item->arsip_name) > 30)
                                              {{substr($item->arsip_name,0,30)}} ...
                                          @else
                                              {{$item->arsip_name}}
                                          @endif
                                        </h6>
                                    </a>
                                </div>
                            </div>
                          </td>
                          <td  class="text-xs font-weight-bold">
                            {{$item->kategoribuku->kategoribuku_name}}
                          </td>
                          <td class="text-xs text-center  font-weight-bold">
                            <a href="#x" class="text-xs font-weight-bold text-danger" data-toggle="modal" data-target="#modal-delete" id="btn-dell" 
                            onclick="hapus('{{$item->id}}','{{$item->arsip_name}}')"
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
            {{$data->links('pagination::bootstrap-4')}}
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
                    <label for="mainmenu_name">Nama Arsip</label>
                    <input type="hidden" id="delete_banner_id" name="id" required>
                    <input type="text" readonly id="delete_banner_name" name="arsip_name" class="form-control" placeholder="..." required>
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
    var tipe;
    function hapus(id,banner_name,tipe) {
        $('#delete_banner_id').val(id);
        $('#delete_banner_name').val(banner_name);
        console.log(id +'-'+ banner_name);
        tipe = tipe;
    }

    $('#form_dell').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/admin-remove-arsip",
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
                            window.location.href = "/admin-arsip";
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