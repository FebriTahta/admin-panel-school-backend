@extends('layouts.new_layouts.master')
 
@section('css')
    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('hero-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Brosur</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Create</h6>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4" style="min-height: 500px">
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="col-md-12 mt-4">
            <a href="/admin-floatmenu" class="btn btn-xs btn-warning">Kembali</a>
        </div>
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Float Menu</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">---</span> Create Float Menu  <br>
                    Sumber : <a href="https://fontawesome.com/v5/search" target="_blank">https://fontawesome.com/v5/search</a>
                  </p>
                </div>
              </div>
            </div>
            
            <form id="form_edit"> @csrf
                <div class="card-body px-0 pb-2">
                    <div class="row" style="padding: 20px">
                        @if ($status == 'edit')
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banner_banner">NAMA FLOAT MENU</label>
                                <input type="text" value="{{$data->floatmenus_name}}" name="floatmenus_name" placeholder="......." class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="judul_banner">ICON FLOAT MENU</label>
                                <input type="text" value="{{$data->floatmenus_icon}}" class="form-control mb-2" name="floatmenus_icon" placeholder="......" required>
                            </div>  
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="judul_banner">LINK FLOAT MENU</label>
                                <input type="text" value="{{$data->floatmenus_link}}" class="form-control mb-2" name="floatmenus_link" placeholder="......" required>
                            </div>  
                        </div>
                            
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary" id="btn_edit" value="SUBMIT">
                        </div>
                        @else
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banner_banner">NAMA FLOAT MENU</label>
                                <input type="text" name="floatmenus_name" placeholder="......." class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="judul_banner">ICON FLOAT MENU</label>
                                <input type="text" class="form-control mb-2" name="floatmenus_icon" placeholder="......" required>
                            </div>  
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="judul_banner">LINK FLOAT MENU</label>
                                <input type="text" class="form-control mb-2" name="floatmenus_link" placeholder="......" required>
                            </div>  
                        </div>
                            
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary" id="btn_edit" value="SUBMIT">
                        </div>
                        @endif
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        
        $('#form_edit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "/admin-new-floatmenu",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btn_edit').attr('disabled', 'disabled');
                    $('#btn_edit').val('Process...');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $("#form_edit")[0].reset();
                        $('#btn_edit').val('UPDATE');
                        $('#btn_edit').attr('disabled', false);
                        toastr.success(response.message);
                        swal({
                            title: "SUCCESS!",
                            text: response.message,
                            type: "success",
                            timer: 2000,
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "/admin-floatmenu";
                            }
                        });
                    } else {
                        $('#btn_edit').val('SUBMIT!');
                        $('#btn_edit').attr('disabled', false);
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