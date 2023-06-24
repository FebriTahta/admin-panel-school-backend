 @extends('layouts.new_layouts.master')
 
@section('hero-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Payment</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Type</h6>
</nav>
@endsection

 @section('content')
 <div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-9 col-md-6 mb-md-0 mb-4">
          <div class="col-md-12 mt-4">
            <a href="/admin-new-payment-type" class="btn btn-xs btn-primary">New Payment Type</a>
        </div>
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Pembayaran</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{$payment_aktif->count()}} dari {{$paymenttype->count()}}</span>  Tipe Pembayaran Aktif 
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Pembayaran</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Besar Pembayaran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($paymenttype as $key => $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                @if ($key % 2 == 0)
                                  <img src="{{asset('assets/img/small-logos/logo-jira.svg')}}" class="avatar avatar-sm me-3" alt="jira">
                                @else
                                  <img src="{{asset('assets/img/small-logos/logo-slack.svg')}}" class="avatar avatar-sm me-3" alt="team7">
                                @endif
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <a data-toggle="modal" data-target="#modal-edit" href="##" onclick="opsi('/admin-edit-payment-type/{{Crypt::encrypt($item->id)}}','/form-payment/{{Crypt::encrypt($item->id)}}')">
                                  <h6 class="mb-0 text-sm">{{$item->payment_name}}</h6>
                                </a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group">
                              <span class="text-xs font-weight-bold">Rp. {{number_format($item->payment_value,2,',','.')}}</span>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if ($item->payment_status == 'aktif')
                              <span class="text-xs font-weight-bold text-primary"> Aktif </span>
                            @else
                              <span class="text-xs font-weight-bold text-danger">Non Aktif </span>
                            @endif
                          </td>
                          <td class="align-middle">
                            <div class="progress-wrapper w-75 mx-auto">
                              <div class="progress-info">
                                <div class="progress-percentage">
                                  <span class="text-xs font-weight-bold">100%</span>
                                </div>
                              </div>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <a href="#x" class="text-xs font-weight-bold text-danger" data-toggle="modal" data-target="#modal-delete" id="btn-dell" onclick="tes('{{$item->payment_name}}', {{$item->id}})" btn-id="{{$item->id}}" btn-payment_name="{{$item->payment_name}}"> Hapus </a>
                          </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Last Transaction</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">12 Transaksi </span> Baru
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                  </div>
                </div>
                
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 </div>

<div class="modal fade" id="modal-delete" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
        <h5 class="modal-title text-white">Remove Payment Type</h5>
      </div>
      <form id="form_dell">@csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="mainmenu_name">Payment Type Name</label>
                  <input type="hidden" id="payment_id_delete" name="id" required>
                  <input type="text" readonly id="payment_name_delete" name="payment_name" class="form-control" placeholder="..." required>
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

<div class="modal fade" id="modal-edit" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
        <h5 class="modal-title text-white">OPSI PAYMENT</h5>
      </div>
        <div class="modal-body">
            <div class="form-group row">
              <div class="col-md-6 col-6">
                <a href="" id="edit-payment" class="btn btn-sm btn-primary" style="width: 100%">EDIT PAYMENT TYPE</a>
              </div>
              <div class="col-md-6 col-6">
                <a href="" id="form-payment" target="_blank" class="btn btn-sm bg-gradient-info" style="width: 100%">FORM PAYMENT</a>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

 @endsection

 @section('script')
     <script>
      var payment_id_delete, payment_name_delete,edit_payment,form_payment;

      function tes(name,id) {
        $('#payment_name_delete').val(name);
        $('#payment_id_delete').val(id);
      }

      function opsi(href,href2) {
        edit_payment = document.getElementById('edit-payment');
        edit_payment.href = href;

        form_payment = document.getElementById('form-payment');
        form_payment.href = href2;
        console.log(href2);
      }

      $('#form_dell').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/admin-remove-payment-type",
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
                            window.location.href = "/admin-payment-type";
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