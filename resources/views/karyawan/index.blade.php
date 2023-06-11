@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Karyawan</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(\Auth::user()->role == 1)
                    <a href="/karyawan/create" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    @endif
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Gaji Total</th>
                                <th>Lembur</th>
                                <th>Cuti</th>
                                <th>Nama Departement</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                                <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->nip }}</td>
                                <td>{{ $dt->name }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->telp }}</td>
                                <td>{{ $dt->gaji_total }}</td>
                                <td>
                                    <ul>
                                        @foreach ($dt->lembur as $a)
                                        @if ($a->disetujui == 1)
                                            <li> Lama Lembur : {{ $a->lama_lembur }}<br/>Tanggal Lembur : {{ $a->tanggal_lembur }}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($dt->cuti as $c)
                                        @if ($c->disetujui == 1)
                                            <li> Lama Cuti : {{ $c->lama_cuti }}<br/>Tanggal Cuti : {{ $c->tanggal_cuti }}</li>
                                            
                                        @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                {{ $dt->departement }}
                                </td>
                                <td>
                                    <div style="width:60px">
                                        @if(\Auth::user()->role == 1)
                                        <a href="/karyawan/{{$dt->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href="/delete/{{ $dt->id }} "class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        @endif
                                        @if(\Auth::user()->role == 2)
                                        <a href="/karyawan/hrd/{{$dt->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href="/delete/{{ $dt->id }} "class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        @endif
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