@extends('template.layout')
@section('title', 'change-permission')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h4><li class="fas fa-align-left"></li> Role : {{$role->name}}</h4>
    </div>
    <div class="card-body">
        <div class="text-center">
            <input type="checkbox" onchange="checkAll(this)" name="permissionAll[]">
            <label for="">pilih semua</label>
        </div><br>
        <form action="{{$action}}" method="post">
            @csrf
            <div class="row">
                @foreach ($permissions as $idx => $permission)
                    <div class="col-md-3 col-sm-6" style="margin-bottom: 10px">
                        @foreach($permission as $singlePermission)
                            <div class="form-check d-block">
                                <input type="checkbox" class="uid mr-1 form-check-input" id="uid-{{$idx . '-' . $loop->iteration }}" name="permission[]" value="{{ $singlePermission }}" {{ $role->hasPermissionTo($singlePermission) ? "checked" : "" }} /><label for="uid-{{ $idx . '-' . $loop->iteration }}" class="mb-0"> {{ $singlePermission }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                {{-- <a href="/admin/karyawan" class="btn btn-sm btn-">Kembali</a> --}}
            </div>
        </form>
    </div>
</div>




<script type="text/javascript">
    function checkAll(ele) {
         var checkboxes = document.getElementsByTagName('input');
         if (ele.checked) {
             for (var i = 0; i < checkboxes.length; i++) {
                 if (checkboxes[i].type == 'checkbox' ) {
                     checkboxes[i].checked = true;
                 }
             }
         } else {
             for (var i = 0; i < checkboxes.length; i++) {
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = false;
                 }
             }
         }
     }
</script>

@endsection
