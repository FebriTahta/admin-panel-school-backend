@extends('layouts.raw')

@section('header-name')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages Type</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Main & Sub Menu</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Control</h6>
    </nav>
@endsection

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add_submenu">Tentukan Page Type Untuk Menu</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
            </div>
            <div class="pagination" style="margin-top: 50px">
               
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
          <h5 class="modal-title text-white">Page Type Untuk Menu</h5>
        </div>
        <form id="form_add_submenu">@csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="mainmenu">Choose Menu</label>
                    <div class="stat">
                        <input type="radio" id="jenis_menu_main" value="mainmenu" name="jenis_menu" disabled>
                        <label for="submenu_stat" style="margin-left: 10px">Tentukan Page Type Main Menu</label>
                    </div>
                    <div class="stat">
                        <input type="radio" id="jenis_menu_sub" value="submenu" name="jenis_menu" disabled>
                        <label for="submenu_stat" style="margin-left: 10px">Tentukan Page Type Sub Menu</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mainmenu">Choose Main Menu</label>
                    <select name="mainmenu_id" class="form-control" id="mainmenu_id" required>
                        <option value="">-- PILIH PARENT MAIN MENU--</option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="submenu">Choose Sub Menu</label>
                    <select name="submenu_id" class="form-control" id="submenu_id" required>
                        <option value="">-- PILIH PARENT SUB MENU--</option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="submenu_name">New Sub Menu</label>
                    <input type="text" id="submenu_name" name="submenu_name" class="form-control" placeholder="..." required>
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
    
    
    </script>
@endsection