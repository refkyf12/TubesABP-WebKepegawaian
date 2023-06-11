@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Cuti</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <!--<button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(\Auth::user()->role == 2)
                    <a href="/announcement/create" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    @endif-->
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lama Cuti</th>
                                <th>Tanggal Cuti</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>
                                    @if ($dt->id)
                                        {{$dt->users->name}}
                                    @endif
                                </td>
                                <td>{{ $dt->lama_cuti }}</td>
                                <td>{{ $dt->tanggal_cuti }}</td>
                                
                                
                                @if ($dt->disetujui == 1)
                                    <td>DISETUJUI</td>
                                @endif

                                @if  ($dt->disetujui == 2)
                                    <td>DITOLAK</td>
                                @endif

                                @if ($dt->disetujui == NULL)
                                    <td>BELUM DI PROSES</td>
                                @endif
                                <td>
                                    <div style="width:60px">
                                        <a href="{{url('cuti/'.$dt->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <!--<a href="/update_lembur/{{$dt->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>-->
                                        <!--<button href="/delete/{{ $dt->id }} "class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>-->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
