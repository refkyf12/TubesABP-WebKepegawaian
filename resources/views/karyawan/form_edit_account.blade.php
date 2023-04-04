<!DOCTYPE html>
<html>
    <head>
        <title>Form Edit Akun </title>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
            crossorigin="anonymous"
        />
        <script src="{{ asset('assets/jquery.js') }}"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"
        ></script>
    </head>
    <body style="width: 95%">
        <div class="row justify-content-center" style="margin-top: 13%">
            <div class="col-6">
                <h4>Form Edit Akun </h4>
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
                            type="string"
                            name="password"
                            class="form-control"
                            value="{{ $data->password}}"
                        />
                    </div>
                    <div>
                    <label>Role</label>
                    <br/>
                    <select required name="role">
                        <option value="">--pilih--</option>
                        <option value="{{ isset($data)?$data->role:1 }}">Admin</option>
                        <option value="{{ isset($data)?$data->role:2 }}">HRD</option>
                        <option value="{{ isset($data)?$data->role:3 }}">Karyawan</option>
                        </select>
                    </div>
                    <div style="text-align: center">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>