@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                
                </p>
            </div>
            <div class="box-body">
               
            <form
                    class="border"
                    style="padding: 20px"
                    method="POST"
                    action="{{url('absen/create')}}"
                >
                    @csrf
                    <input type="hidden" name="_method" value="{{ $method }}" />
                    <div class="form-group">
                        <label>users_id</label>
                        <input
                            type="integer"
                            name="users_id"
                            class="form-control"
                            value="{{ isset($data)?$data->users_id:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>waktu_absen</label>
                        <input
                            type="string"
                            name="waktu_absen"
                            class="form-control"
                            value="{{ isset($data)?$data->waktu_absen:'' }}"
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
