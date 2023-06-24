@extends('layouts.new_layouts.master')

@section('hero-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Payment</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Setting</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Control</h6>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-xl-6 mb-xl-0 mb-4">
            <div class="card bg-transparent shadow-xl">
              <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 p-3">
                  <i class="fas fa-wifi text-white p-2"></i>
                  <h5 class="text-white mt-4 mb-5 pb-2">
                    {{-- 4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852 --}}
                    {{$paymentcontrol->paymentcontrol_merchant_id}}
                  </h5>
                  <div class="d-flex">
                    <div class="d-flex">
                      <div class="me-4">
                        <p class="text-white text-sm opacity-8 mb-0">Payment Gateway {{$paymentcontrol->paymentcontrol_name}}</p>
                        <h6 class="text-white mb-0">SMK KRIAN 1</h6>
                      </div>
                    </div>
                    <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                      <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fas fa-landmark opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Revenue</h6>
                    <span class="text-xs">Total Pendapatan Pembayaran</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">+$2000</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-md-0 mt-4">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fab fa-paypal opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Status</h6>
                    <span class="text-xs">Status Pembayaran</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0 text-uppercase">{{$paymentcontrol->paymentcontrol_status}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Credential</h6>
                  </div>
                  <div class="col-6 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-edit"
                    onclick="edit('{{$paymentcontrol->id}}','{{$paymentcontrol->paymentcontrol_name}}',
                    '{{$paymentcontrol->paymentcontrol_merchant_id}}','{{$paymentcontrol->paymentcontrol_client_key}}',
                    '{{$paymentcontrol->paymentcontrol_server_key}}','{{$paymentcontrol->paymentcontrol_status}}')"
                    ><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Update</a>
                  </div>
                </div>
              </div>
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-md-6 mb-md-0 mb-4">
                    <span class="text-xs">Server Key</span>
                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img src="{{asset('assets/img/small-logos/logo-slack.svg')}}" class="avatar avatar-sm me-3" alt="team7">
                      <h6 class="mb-0">
                        {{-- ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852 --}}
                        {{$paymentcontrol->paymentcontrol_server_key}}
                      </h6>
                      <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <span class="text-xs">Client Key</span>
                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      <img src="{{asset('assets/img/small-logos/logo-jira.svg')}}" class="avatar avatar-sm me-3" alt="jira">
                      <h6 class="mb-0">
                        {{-- ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248 --}}
                        {{$paymentcontrol->paymentcontrol_client_key}}
                      </h6>
                      <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>


<div class="modal fade" id="modal-edit" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-gradient-dark">
          <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
          <h5 class="modal-title text-white">Update Payment Control</h5>
        </div>
        <form id="form_dell">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="paymentcontrol_name">Payment Control Name</label>
                    <input type="hidden" id="paymentcontrol_id" name="id" required>
                    <input type="text" readonly id="paymentcontrol_name" name="paymentcontrol_name" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="paymentcontrol_merchant_id">Payment Control Merchant Id</label>
                    <input type="text" readonly id="paymentcontrol_merchant_id" name="paymentcontrol_merchant_id" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="paymentcontrol_client_key">Payment Control Client Key</label>
                    <input type="text" readonly id="paymentcontrol_client_key" name="paymentcontrol_client_key" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="paymentcontrol_server_key">Payment Control Server Key</label>
                    <input type="text" readonly id="paymentcontrol_server_key" name="paymentcontrol_server_key" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="paymentcontrol_status">Payment Control Status</label>
                    <select name="paymentcontrol_status" id="paymentcontrol_status" class="form-control">
                        <option value="aktif">AKTIF</option>
                        <option value="non_aktif">NON AKTIF</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn bg-gradient-dark" value="Delete" id="btndel">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
        function edit(id,name,merchant,client,server,status) {
            $('#paymentcontrol_id').val(id);
            $('#paymentcontrol_name').val(name);
            $('#paymentcontrol_client_key').val(client);
            $('#paymentcontrol_server_key').val(server);
            $('#paymentcontrol_status').val(status);
            $('#paymentcontrol_merchant_id').val(merchant);

            console.log(id+'-'+merchant+'-'+client+'-'+server+'-'+name+'-'+status);
        }
    </script>
@endsection

