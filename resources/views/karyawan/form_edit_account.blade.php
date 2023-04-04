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
                        <label>Email</label>
                        <input
                            type="string"
                            name="email"
                            class="form-control"
                            value="{{ $data->email }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            value=""
                        />
                    </div>
                    @if($errors->any())
                    <b style="color:red" >{{$errors->first()}}</b>
                    @endif
                    <br>
                    <div class="form-group">
                        <label>Role</label>
                        <br>
                        <select required name="role">
                        <option value="">--pilih--</option>
                        <option value="{{ isset($data)?$data->role:'1' }}">Admin</option>
                        <option value="{{ isset($data)?$data->role:'2' }}">HRD</option>
                        <option value="{{ isset($data)?$data->role:'3' }}">Karyawan</option>
                        </select>
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
