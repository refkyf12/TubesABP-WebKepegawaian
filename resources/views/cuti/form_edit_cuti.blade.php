@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Edit Cuti</h4>
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
                    method="post"
                    action="{{ url('cuti/'.$data->id) }}"
                >
                <!--action="/cuti/{{ $data->id }}"-->
                    @csrf
                    <input type="hidden"/>
                    <div class="form-group">
                        <label for="users_id">User ID</label>
                        <input type="text" class="form-control" id="users_id" name="users_id" value="{{ $data->users_id }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lama_cuti">Lama Cuti</label>
                        <input type="text" class="form-control" id="lama_cuti" name="lama_cuti" value="{{ $data->lama_cuti }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_cuti">Tanggal Cuti</label>
                        <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti" value="{{ $data->tanggal_cuti }}" readonly>
                    </div>

                    

                    <div class="form-group">
                        <label for="disetujui">Disetujui</label>
                        
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="disetujui" id="disetujui" value="{{ $data->disetujui ? '1' : 1 }}"></input>
                                <label class="form-check-label" for="disetujui">
                                    Ya
                                </label> 
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="disetujui" id="disetujui" value="{{ !$data->disetujui ? '2' : 2 }}" ></input>
                                <label class="form-check-label" for="disetujui">
                                    Tidak
                                </label>
                            </div>
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
