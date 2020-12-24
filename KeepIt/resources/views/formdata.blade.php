@extends('layout.main')

@section('container')
<div class="table-responsive">
  <table class="table table-striped table-hover table-condensed">
    <thead>
      <tr>
        <th><strong>No</strong></th>
        <th><strong>Nama File</strong></th>
        <th><strong>Action</strong></th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $k)
        <tr>
          <th>{{$k -> id}}</th>
          <th>{{$k -> nama_file}}</th>
          <th>
            
          </th>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
