@extends('layouts.raw')

@section('header-name')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Menu</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Control</h6>
    </nav>
@endsection

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add_submenu">New Sub Menu</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Menu</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Main Menu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($submenu as $item)
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <h6 class="mb-0 text-sm">{{$item->submenu_name}}</h6>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->mainmenu->mainmenu_name}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">
                            Sub menu aktif
                        </span>
                    </td>
                    <td class="align-middle text-center">
                        <button class="btn-dell btn-xs btn-danger btn text-secondary font-weight-bold text-xs text-white" data-id="{{$item->id}}" data-submenu_name="{{$item->submenu_name}}" data-toggle="modal" data-target="#modal-delete">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination" style="margin-top: 50px">
                {{ $submenu->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_submenu" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
          <h5 class="modal-title text-white">New Sub Menu</h5>
        </div>
        <form id="form_add_submenu">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="mainmenu">Choose Main Menu</label>
                    <select name="mainmenu_id" class="form-control" id="mainmenu_id" required>
                        <option value="">-- PILIH PARENT MAIN MENU--</option>
                        @foreach ($mainmenu as $item)
                            <option value="{{$item->id}}">{{$item->mainmenu_name}}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="submenu_name">New Sub Menu</label>
                    <input type="text" id="submenu_name" name="submenu_name" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <div class="stat">
                        <input type="radio" id="stat_on" value="on" name="submenu_stat" disabled>
                        <label for="submenu_stat" style="margin-left: 10px">Aktif</label>
                    </div>
                    <div class="stat">
                        <input type="radio" id="stat_off" value="off" name="submenu_stat" disabled>
                        <label for="submenu_stat" style="margin-left: 10px">Non Aktif</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="status" name="status" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" id="btn_add_submenu">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          <h5 class="modal-title text-white">Remove Sub Menu</h5>
        </div>
        <form id="form_dell_submenu">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="mainmenu_name">Nama Main Menu</label>
                    <input type="hidden" id="menu_id_delete" name="id" required>
                    <input type="text" readonly id="submenu_name_delete" name="submenu_name" class="form-control" placeholder="..." required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" value="Delete" id="btn_dell_submenu">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('script')
    <script>
    
    var menu_id_delete, submenu_name_delete;

    $(document).on("click", ".btn-dell", function () {
        menu_id_delete = $(this).data('id');
        submenu_name_delete = $(this).data('submenu_name')
        
        $('#submenu_name_delete').val(submenu_name_delete);
        $('#menu_id_delete').val(menu_id_delete);
    });

    $('#form_add_submenu').submit(function(e) {
        e.preventDefault();
        var text;
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/store-sub-menu",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btn_add_submenu').attr('disabled', 'disabled');
                $('#btn_add_bubmenu').val('Processs...');
            },
            success: function(response) {
                if (response.status == 200) {
                    $("#form_add_submenu")[0].reset();
                    $('#btn_add_submenu').val('Submit');
                    $('#btn_add_submenu').attr('disabled', false);
                    swal({
                        title: "Ok!",
                        text: response.message,
                        type: "success",
                        timer: 2000,
                    }).then(okay => {
                        if (okay) {
                            window.location.href = response.link;
                        }else{
                            window.location.href = response.link;
                        }
                    });
                } else {
                    $('#btn_add_submenu').val('Submit');
                    $('#btn_add_submenu').attr('disabled', false);
                    $.each(response.message, function( index, value ) {
                        text = value;
                    });
                    swal({
                        title: "Sorry!",
                        text:  text,
                        type: "error",
                        timer: 2000
                    });
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    $('#mainmenu_id').on('change', function () {
        $.ajax({
            type:'GET',
            url:'/check-status-menu/'+this.value,
            success:function(response) {
                if (response.mainmenu_stat == 'on') {
                    document.getElementById("stat_on").checked = false;
                    document.getElementById("stat_off").checked = true;   
                    $('#status').val('off');
                }else{
                    document.getElementById("stat_on").checked = true;
                    document.getElementById("stat_off").checked = false;   
                    $('#status').val('on');
                }
            }
        });
    })
    </script>
@endsection