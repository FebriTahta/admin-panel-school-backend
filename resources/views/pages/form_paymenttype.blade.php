@extends('layouts.new_layouts.master')

@section('hero-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Payment</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Form</h6>
</nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12">
            <a href="/admin-payment-type" class="btn btn-sm btn-warning">Back</a>
              <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Form Type Payment</h5>
                    <p class="text-white">Buat jenis pembayaran anda dan tampilkan pada halaman website dengan mengubah status menjadi aktif</p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-12 mt-4" style="min-height: 350px">
                <div class="card p-3">
                    <small>Update Payment Type <br> Pastikan payment setting sudah dikonfigurasi sebelum menerbitkan pembayaran ini</small>
                    <hr>
                    <form id="formadd" enctype="multipart/form-data">
                        @csrf

                        @if ($edit == 'no')
                            <div class="row" style="text-transform: capitalize">
                                <div class="col-md-4 mb-4">
                                    <input type="text" name="payment_name" class="form-control" placeholder="Nama Pembayaran">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <input name="payment_value" id="rupiah" type="text" class="form-control" placeholder="Besar Pembayaran">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <select name="payment_status" class="form-control" id="" style="color: gray">
                                        <option value="aktif">Status : Aktif</option>
                                        <option value="non_aktif">Status : Non Aktif</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <textarea name="payment_desc"  class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" name="payment_image" onchange="showPreview(event);">
                                    <small style="font-size: 12px" style="color: gray">Image pendukung ( berupa informasi pembayaran "800x800px" )</small>
                                    <div class="preview" style="max-width: 100%; margin-top: 20px">
                                        <img style="max-width: 300px" id="inputGroupFile01-preview">
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-4">
                                    <input type="submit" id="btnadd" class="btn btn-xs btn-primary" value="Submit">
                                </div>
                            </div>
                        @else
                            <div class="row" style="text-transform: capitalize">
                                <div class="col-md-4 mb-4">
                                    <input type="hidden" name="id" id="id" value="{{$paymenttype->id}}" class="form-control">
                                    <input type="text" name="payment_name" value="{{$paymenttype->payment_name}}" class="form-control" placeholder="Nama Pembayaran">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <input name="payment_value" id="rupiah" value="{{$paymenttype->payment_value}}" type="text" class="form-control" placeholder="Besar Pembayaran">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <select name="payment_status" class="form-control" id="" style="color: gray">
                                        <option value="aktif" 
                                        @if ($paymenttype->payment_status == 'aktif')
                                            selected
                                        @endif>Status : Aktif</option>
                                        <option value="non_aktif"
                                        @if ($paymenttype->payment_status == 'non_aktif')
                                            selected
                                        @endif>Status : Non Aktif</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <textarea name="payment_desc"  class="form-control" cols="30" rows="10">{!!$paymenttype->payment_desc!!}</textarea>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" name="payment_image" onchange="showPreview(event);">
                                    <small style="font-size: 12px" style="color: gray">Image pendukung ( berupa informasi pembayaran "800x800px" )</small>
                                    <div class="preview" style="max-width: 100%; margin-top: 20px">
                                        <img style="max-width: 300px" src="{{asset('pmnt_image/'.$paymenttype->payment_thumbnail)}}" id="inputGroupFile01-preview">
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-4">
                                    <input type="submit" id="btnadd" class="btn btn-xs btn-primary" value="Submit">
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("inputGroupFile01-preview");
            preview.src = src;
            preview.style.display = "block";
            $('#label_img').html(src.substr(0, 30));
        }
    }

    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    $('#formadd').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/admin-store-payment-type",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btnadd').attr('disabled', 'disabled');
                $('#btnadd').val('Process...');
            },
            success: function(response) {
                if (response.status == 200) {
                    $("#formadd")[0].reset();
                    $('#btnadd').val('Submit');
                    $('#btnadd').attr('disabled', false);
                    toastr.success(response.message);
                    swal({
                        title: "SUCCESS!",
                        text: response.message,
                        type: "success",
                        timer: 2000,
                    }).then(okay => {
                        if (okay) {
                            window.location.href = "/admin-payment-type";
                        }
                    });
                } else {
                    $('#btnadd').val('SUBMIT!');
                    $('#btnadd').attr('disabled', false);
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