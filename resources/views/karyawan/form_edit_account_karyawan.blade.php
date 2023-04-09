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
                    action="{{url('update/hrd/'.$data->id)}}"
                >
                    @csrf
                    <!-- {{ method_field('PUT') }} -->
                    <input type="hidden"/>
                    <div class="form-group">
                        <label>NIP</label>
                        <input
                            type="number"
                            name="nip"
                            class="form-control"
                            value="{{ $data->nip}}"
                        />
                    </div>
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
                        <label>No. Telp</label>
                        <input
                            type="string"
                            name="telp"
                            class="form-control"
                            value="{{ $data->telp}}"
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
                        <label>Departement</label>
                        <input
                            type="string"
                            name="departement"
                            class="form-control"
                            value="{{ $data->departement}}"
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