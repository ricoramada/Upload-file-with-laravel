@extends('layout.index')

@section('container')
<div class="table-responsive">
  <table class="table table-striped table-hover table-condensed">
    <thead>
      <tr>
        <th><strong>No</strong></th>
        <th><strong>Nama File</strong></th>
        <th><strong>Type</strong></th>
        <th><strong>Tanggal Data</strong></th>
        <th><strong>Action</strong></th>
      </tr>
    </thead>
    <tbody>
      @foreach($file as $k)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <th>{{$k -> nama_file}}</th>
          <th>{{$k -> type}}</th>
          <th>{{$k -> date_data}}</th>
          <th>
            <button type="button" class="btn btn-success">Download</button>
            <a href="hapus/{{ $k->id }}"><button type="button" class="btn btn-danger">Hapus</button></a>
          </th>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
