@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h4>Restore Servis</h4>
    </div>
    <div class="card-body">
        <div>
            <a href="#" onclick="restoreall()" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Restore all</a>
            <a href="#" onclick="deletepermanent()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete permanent all</a>
            <a href="/admin/servis" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> Back</a>
        </div><br>
        <table class="table table-bordered" id="stoklimit" style="font-size: 13px;">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Tanggal</th>
                    <th>No Nota</th>
                    <th>Pelanggan</th>
                    <th>Unit</th>
                    <th>No seri</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($service as $item)
                <tr class="">
                    <td class="text-primary">
                        <a href="#" onclick="forceDelete({{$item->id}})"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" onclick="restoreallid({{$item->id}})"><i class="fas fa-undo-alt"></i></a>
                    </td>
                    <td>{{$item->service_date}}</td>
                    <td>{{$item->transaction_code}}</td>
                    <td>{{$item->_customer->name}}</td>
                    <td>{{$item->unit}}</td>
                    <td>{{$item->serial_number}}</td>
                    <td>
                        @if ($item->status == 'proses')

                        <span class="bg-primary badge">Dalam Proses</span>
                        @elseif ($item->status == 'waiting sparepart')

                        <span class="bg-warning badge">Menunggu Sparepat</span>
                        @elseif($item->status == 'finished')

                        <span class="bg-success badge">Selesai</span>
                        @elseif($item->status == 'cancelled')

                        <span class="bg-danger badge">Batal</span>
                        @elseif($item->status == 'take')

                        <span class="bg-secondary badge">Sudah diambil</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
@endsection
