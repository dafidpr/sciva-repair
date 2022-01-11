@extends('template.layout')
@section('title', 'Backup Data')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <span>Menu ini berguna untuk mem back-up data keseluruhan dari aplikasi Point Of Sales yang berformat <b>.sql</b></span>
                <div class="d-grid gap-2 mt-3">
                    <a href="/admin/backupdata/mydatabase" class="btn btn-primary">Backup</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <form action="/admin/backupdata/restore_db" enctype="multipart/form-data" method="post">
                    @csrf
                    <div>
                        <label for="">Pilih File .sql</label>
                        <input type="file" name="restore_db" class="form-control">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
