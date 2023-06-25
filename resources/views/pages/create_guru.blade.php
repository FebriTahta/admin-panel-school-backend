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
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">guru</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Create</h6>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4" style="min-height: 500px">
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="col-md-12 mt-4">
            <a href="/admin-daftar-guru" class="btn btn-xs btn-warning">Kembali</a>
        </div>
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Berita</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">---</span>  Buat Berita Baru
                  </p>
                </div>
              </div>
            </div>
            <form id="form_edit"> @csrf
                <div class="card-body px-0 pb-2">
                    <div class="row" style="padding: 20px">
                        @if ($status == 'edit')
                            <div class="form-group">
                                <label for="banner_guru">FOTO GURU</label>
                                <input type="hidden" name="id" value="{{$guru->id}}">
                                <input type="file" name="guru_image" class="form-control" accept="image/*" id="inputGroupFile01" onchange="showPreview(event);">
                                <div class="preview" style="max-width: 100%; margin-top: 20px">
                                    <small style="font-size: 12px; display: none" class="text-danger" id="text-preview">*Preview Banner</small>
                                    <img style="max-width: 300px" id="inputGroupFile01-preview" src="{{asset('image_guru/'.$guru->guru_image)}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="judul_berita">NAMA GURU</label>
                                        <input type="text" value="{{$guru->guru_name}}" class="form-control" name="guru_name" placeholder="......" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="judul_berita">WHATSAPP GURU</label>
                                        <input type="number" value="{{$guru->guru_wa}}" class="form-control" name="guru_wa" placeholder="......" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="wa_guru">JABATAN GURU</label>
                                        <input type="text" class="form-control" value="{{$guru->guru_jabatan}}" name="guru_jabatan" placeholder="......" required>
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-primary" id="btn_edit" value="SUBMIT">
                            </div>
                        @else
                            <div class="form-group">
                                <label for="banner_guru">FOTO GURU</label>
                                <input type="file" name="guru_image" class="form-control" accept="image/*" id="inputGroupFile01" onchange="showPreview(event);" required>
                                <div class="preview" style="max-width: 100%; margin-top: 20px">
                                    <small style="font-size: 12px" class="text-danger" id="text-preview">*Preview Banner</small>
                                    <img style="max-width: 300px" id="inputGroupFile01-preview" src="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="judul_guru">NAMA GURU</label>
                                        <input type="text" class="form-control" name="guru_name" placeholder="......" required>
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="wa_guru">WHATSAPP GURU</label>
                                        <input type="number" class="form-control" name="guru_wa" placeholder="......" required>
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="wa_guru">JABATAN GURU</label>
                                        <input type="text" class="form-control" name="guru_jabatan" placeholder="......" required>
                                    </div>  
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
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("inputGroupFile01-preview");
                preview.src = src;
                preview.style.display = "block";
                document.getElementById( 'text-preview' ).style.display = 'none';
                // $('#label_img').html(src.substr(0, 30));
            }
        }
        
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                focus: true,
                blockquoteBreakingLevel: 1,
                styleTags: [
                'p',
                    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
                placeholder: 'write here...'
            });
        });

        $('#form_edit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "/new-guru",
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
                        $('#btn_edit').val('SUBMIT');
                        $('#btn_edit').attr('disabled', false);
                        toastr.success(response.message);
                        swal({
                            title: "SUCCESS!",
                            text: response.message,
                            type: "success",
                            timer: 2000,
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "/admin-daftar-guru";
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