@extends('layouts.master')

@section('judul','Tabel Pemusnahan Data Barang')
@section('content')

<button type="button" class="btn btn-outline-danger mb-2" id="deleteAllSelectedRecords" onClick="window.location.reload();"><i class="fa fa-trash"></i>&nbsp;Delete Selected</button>

    @if (session('status'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th><input type="checkbox" id="chkCheckAll"></th>
            <th>Kode-barang</th>
            <th>Nama-Barang</th>
            <th>Sumber-Dana</th>
            <th>Kondisi</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $dt)
        <tr id="sid" value="{{$dt->id}}">
            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$dt->id}}"></td>
            <td>{{$dt->kode_barang}}</td>
            <td>{{$dt->nama_barang}}</td>
            <td>{{$dt->sumber_dana}}</td>
            <td>
                @if( $dt->kondisi == 'Baik')
                    <button class="btn btn-info">{{$dt->kondisi}}</button>
                @elseif( $dt->kondisi == 'Sedang')
                    <button class="btn btn-warning">{{$dt->kondisi}}</button>
                @elseif( $dt->kondisi == 'Berat')
                    <button class="btn btn-danger">{{$dt->kondisi}}</button>
                @endif
            </td>
            <td>
                <a href="/detail-lastdata/{{$dt->kode_barang}}/{{$dt->id}}" class="badge badge-success">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{ asset('js/jquery.min.js')}}"></script>

<script>
    $(function(e){

        $("#chkCheckAll").click(function(){
            $(".checkBoxClass").prop('checked',$(this).prop('checked'));
        });

        $('#deleteAllSelectedRecords').click(function(e){
            e.preventDefault();
            var allids = [];
            $("input:checkbox[name=ids]:checked").each(function(){
                allids.push($(this).val());
            });

            $.ajax({
                url: "{{Route('barang.deleteSelected')}}",
                type:'DELETE',
                data:{
                    ids:allids,
                    _token:$("input[name=_token]").val()
                },
                success:function(response)
                {
                    $.each(allids,function(key,val){
                        $('#sid'+val).remove();
                    });
                }
            });
        });
    });
</script>

@endsection
