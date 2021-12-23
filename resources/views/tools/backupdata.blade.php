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
</div>

@endsection
