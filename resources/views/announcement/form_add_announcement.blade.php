@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               
            <form
                    class="border"
                    style="padding: 20px"
                    method="POST"
                    action="{{url('announcement/create')}}"
                >
                    @csrf
                    <input type="hidden" name="_method" value="{{ $method }}" />
                    <div class="form-group">
                        <label>judul</label>
                        <input
                            type="string"
                            name="judul"
                            class="form-control"
                            value="{{ isset($data)?$data->judul:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input
                            type="date"
                            name="tanggal_awal"
                            class="form-control"
                            value="{{ isset($data)?$data->tanggal_awal:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input
                            type="date"
                            name="tanggal_akhir"
                            class="form-control"
                            value="{{ isset($data)?$data->tanggal_akhir:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <input
                            type="string"
                            name="pesan"
                            class="form-control"
                            value="{{ isset($data)?$data->pesan:'' }}"
                        />
                    </div>
                    <div style="text-align: center">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>

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
