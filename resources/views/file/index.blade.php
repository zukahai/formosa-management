<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Formosa | Files</title>
  <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'><link rel="stylesheet" href="{{asset('assets/upload/style-index.css')}}">

</head>
<body>

    <div class="button-box"><a href="{{route('file.upload')}}" class=""> Upload </a></div>
<!-- partial:index.partial.html -->
<div class="ag-format-container">
  <div class="ag-courses_box">
   

    @foreach($files as $file)
    <div class="ag-courses_item">
      <a href="{{asset("storage/files/".$file['name'])}}" download="{{$file['name']}}" class="ag-courses-item_link">
        <div class="ag-courses-item_bg"></div>

        <div class="ag-courses-item_title">
          {{ $file['name'] }}
        </div>

        <div class="ag-courses-item_date-box">
          Upload Date:
          <span class="ag-courses-item_date">
            {{ $file['created_at'] }}
          </span>
        </div>
      </a>
    </div>
    @endforeach


  </div>
</div>
<!-- partial -->
  
</body>
</html>
