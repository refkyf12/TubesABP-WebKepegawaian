@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Edit Karyawan</h4>
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
                    action="/update/{{ $data->id }}"
                >
                    @csrf
                    <input type="hidden"/>
                    <div class="form-group">
                        <label>Nama</label>
                        <input
                            type="string"
                            name="name"
                            class="form-control"
                            value="{{ $data->name}}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Gaji</label>
                        <input
                            type="number"
                            name="gaji_total"
                            class="form-control"
                            value="{{ $data->gaji_total}}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Lama Cuti</label>
                        <input
                            type="number"
                            name="lama_cuti"
                            class="form-control"
                            value="{{ $data->lama_cuti}}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Cuti</label>
                        <input
                            type="date"
                            name="tanggal_cuti"
                            class="form-control"
                            value="{{ $data->tanggal_cuti}}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Lama Lembur</label>
                        <input
                            type="number"
                            name="lama_lembur"
                            class="form-control"
                            value="{{ $data->lama_lembur}}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lembur</label>
                        <input
                            type="date"
                            name="tanggal_lembur"
                            class="form-control"
                            value="{{ $data->tanggal_lembur}}"
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
