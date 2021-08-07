<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Your Post</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Your Post') }}
        </h2>
    </x-slot>
       <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate" align="center">
     Welcome {{session('user')}}
    </h2>
        @if(session()->has('status'))
             <h2 class="text-2xl font-bold leading-7 text-red-900 sm:text-3xl sm:truncate" align="center">
            {{session('status')}}
            </h2>
        @endif
<form action="/update/{{$post->id}}" method="post">
  @csrf
  @method('PUT')  
  <div class="container col-md-6 mt-4">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
      @error('title')
      <div class="alert alert-danger" role="alert">
          *{{$message}}*
    </div>
      @enderror
  </div>
  <div class="form-group">
  <label for="post">Post</label>
  <textarea class="form-control rounded-0" id="post" name="body" rows="10">
    {{$post->body}}
  </textarea>
  @error('body')
        <div class="alert alert-danger" role="alert">
          *{{$message}}*
    </div>
      @enderror
</div>
  <div class="form-group">
    <br>
    <input type="submit" class="btn btn-primary" id="update" value="update">
  </div>
</form>
</div>
</x-app-layout>
</body>
</html>


