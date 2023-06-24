@extends('layouts.raw')

@section('header-name')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Page</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Type</h6>
    </nav>
@endsection

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Page Type</h6>
            <small style="font-size: 12px">Berikut merupakan daftar jenis halaman yang dimuat</small>
            {{-- <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_mainmenu">New Main Menu</button>
            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add_submenu">New Sub Menu</button> --}}
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Main Menu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Menu</th>
                </tr>
                </thead>
                <tbody style="text-transform: capitalize">
                    @foreach ($pagetype as $item)
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <h6 class="mb-0 text-sm">{{$item->type_name}}</h6>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <p class="badge badge-sm bg-gradient-primary">{{$item->mainmenu_count}} Main-menu</p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="badge badge-sm bg-gradient-success">{{$item->submenu_count}} Sub-menu</p>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination" style="margin-top: 50px">
                {{ $pagetype->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script>
    
    </script>
@endsection