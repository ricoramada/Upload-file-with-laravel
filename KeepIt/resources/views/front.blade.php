@extends('layout.index')

@section('container')
<div class="column">
  <div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      {{ $error }} <br/>
      @endforeach
    </div>
    @endif

    @if ($message = Session::get('success'))
     <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
             <strong>{{ $message }}</strong>
     </div>
     @endif

     <form action="kirim" method="post" enctype="multipart/form-data">
     @csrf

         <div class="form-group">
           <label class="form-label" for="nama_file">File Name </label>

           <div class="control">
             <input type="text" class="form-control" name="nama_file" placeholder="Title" value="" required>
           </div>
         </div>
         <div class="form-group">
           <div class="control">
             <input type="file" class="form-control" name="file" aria-describedby="fileHelp" required>
           </div>
         </div>
         <div class="form-group">
           <div class="control">
             <button type="submit" class="btn btn-primary">Upload File</button>
           </div>
         </div>
     </form>
  </div>
</div>
@endsection
