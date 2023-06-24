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
            <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_mainmenu">New Menu</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Page Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Menu Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Type</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($mainmenu as $item)
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <h6 class="mb-0 text-sm">{{$item->menu_name}}</h6>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->pagetype->type_name}}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->menu_stat}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        @if ($item->menu_type == 'mainmenu')
                            <span class="badge badge-sm bg-gradient-success">
                                {{$item->menu_type}}
                            </span>
                        @else
                            <span class="badge badge-sm bg-gradient-primary">
                                {{$item->menu_type}}
                            </span>        
                        @endif
                    </td>
                    <td class="align-middle text-center">
                        <a href="javascript:;" class="btn-xs btn-warning btn text-white text-secondary font-weight-bold text-xs" data-toggle="modal">
                            Edit
                        </a>
                        <button class="btn-dell btn-xs btn-danger btn text-secondary font-weight-bold text-xs text-white" data-id="{{$item->id}}" data-menu_name="{{$item->menu_name}}" data-toggle="modal" data-target="#modal-delete">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination" style="margin-top: 50px">
                {{ $mainmenu->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_mainmenu" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close bg-transparent text-white" style="border: none" data-dismiss="modal">&times;</button>
          <h5 class="modal-title text-white">New Menu</h5>
        </div>
        <form id="form_add_mainmenu">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="menu_name">Nama Menu</label>
                    <input type="text" id="menu_name" name="menu_name" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="menu_name">Page Type</label>
                    <select name="pagetype_id" class="form-control" id="pagetype_id" required>
                        <option value="">-- Please Choose Page Type--</option>
                        @foreach ($pagetype as $item)
                            <option value="{{$item->id}}">{{$item->type_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="stat">
                        <input type="radio" value="on" name="menu_stat" required>
                        <label for="menu_stat" style="margin-left: 10px">Aktif</label>
                    </div>
                    <div class="stat">
                        <input type="radio" value="off" name="menu_stat" required checked>
                        <label for="menu_stat" style="margin-left: 10px">Non Aktif</label>
                    </div>
                    <small style="font-size: 10px; color: red">Status aktif untuk menu yang dapat diakses (sesuai page type yang akan diberikan)</small>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" id="btn_add_mainmenu">
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
          <h5 class="modal-title text-white">Remove Main Menu</h5>
        </div>
        <form id="form_dell_mainmenu">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="mainmenu_name">Nama Menu</label>
                    <input type="hidden" id="menu_id_delete" name="id" required>
                    <input type="text" readonly id="mainmenu_name_delete" name="menu_name" class="form-control" placeholder="..." required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" value="Delete" id="btn_dell_mainmenu">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('script')
    <script>

    var menu_id_delete, mainmenu_name_delete;

    $(document).on("click", ".btn-dell", function () {
        menu_id_delete = $(this).data('id');
        mainmenu_name_delete = $(this).data('menu_name')
        
        $('#mainmenu_name_delete').val(mainmenu_name_delete);
        $('#menu_id_delete').val(menu_id_delete);

        console.log(mainmenu_name_delete);
    });

    $('#form_add_mainmenu').submit(function(e) {
        e.preventDefault();
        var text;
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/store-main-menu",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btn_add_mainmenu').attr('disabled', 'disabled');
                $('#btn_add_mainmenu').val('Process...');
            },
            success: function(response) {
                if (response.status == 200) {
                    $("#form_add_mainmenu")[0].reset();
                    $('#btn_add_mainmenu').val('Submit');
                    $('#btn_add_mainmenu').attr('disabled', false);
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
                    $('#btn_add_mainmenu').val('Submit');
                    $('#btn_add_mainmenu').attr('disabled', false);
                    $.each(response.message, function(key, index){
                        text = index;
                    })
                    swal({
                        title: "Sorry!",
                        text: text,
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

    $('#form_dell_mainmenu').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "/remove-main-menu",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btn_dell_mainmenu').attr('disabled', 'disabled');
                $('#btn_dell_mainmenu').val('Process...');
            },
            success: function(response) {
                if (response.status == 200) {
                    $("#form_dell_mainmenu")[0].reset();
                    $('#btn_dell_mainmenu').val('Delete');
                    $('#btn_dell_mainmenu').attr('disabled', false);
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
                    $('#btn_dell_mainmenu').val('Delete');
                    $('#btn_dell_mainmenu').attr('disabled', false);
                    swal({
                        title: "Sorry!",
                        text: response.message,
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

    
    </script>
@endsection