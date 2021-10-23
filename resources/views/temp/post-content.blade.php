<!DOCTYPE html>
<html>
<head>
    <title>Upload content</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
</head>
  
<body>
<div class="container">
   
    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Upload post on Instagram</h2></div>
      <div class="panel-body">
   
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="uploads/{{ Session::get('file') }}" width="20%" height="auto">
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    
                </ul>
            </div>
        @endif
  
        <form action="{{ route('uploadFile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

            <div class="custom-file">
                <label for="exampleFormControlInput1">Caption</label>
                </br></br>
                <div class="col-md-6"> <input type="text" class="form-control" id="caption_txt" placeholder="Describe your post.." name="caption_txt"></br></br></div>
                <div class="col-md-6"> <input type="file" class="custom-file-input" id="customFile"  name="file"></br></br></div>
                <input type = "submit" name="upload" value="Upload">
            </div>     


            </div>
        </form>
  
      </div>
    </div>
</div>
</body>
  
</html>