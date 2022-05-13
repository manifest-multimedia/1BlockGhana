<!DOCTYPE html>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Image Upload in Laravel using Dropzone</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
{{--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" /> --}}
   {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 </head>
 <body>
  <div class="container-fluid">
      <br />
      <div class="col-md-2 col-6 pr-md-2">
        <div class="form-group">
            <input type="text" class="form-control location" placeholder="Location">
        </div>
    </div>
    <br/>
    <h3 align="center">Image Upload in Laravel using Dropzone</h3>
    <br />

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Select Image</h3>
        </div>
        <div class="panel-body">
          <form id="dropzoneForm" class="dropzone" action="{{ route('agent.logo.upload',3) }}">
            @csrf
          </form>
          <div align="center">
            <button type="button" class="btn btn-info" id="submit-all">Upload</button>
          </div>
        </div>
      </div>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Uploaded Image</h3>
        </div>
        <div class="panel-body" id="uploaded_image">

        </div>
      </div>


    </div>


    <script type="text/javascript">

        Dropzone.options.dropzoneForm = {
          autoProcessQueue : false,
          acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

          init:function(){
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener('click', function(){
              myDropzone.processQueue();
            });

            this.on("complete", function(){
              if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
              {
                var _this = this;
                _this.removeAllFiles();
              }
              load_images();
            });

          }

        };

        load_images();

        function load_images()
        {
          $.ajax({
            url:"{{ url('/profile/logo') }}",
            success:function(data)
            {
              $('#uploaded_image').html(data);
            }
          })
        }

        $(document).on('click', '.remove_image', function(){
          var name = $(this).attr('id');
          $.ajax({
            url:"{{ route('agent.logo.delete') }}",
            data:{name : name},
            success:function(data){
              load_images();
            }
          })
        });

      </script>


      <script>
          var path = "{{ route('autocomplete.location')}}";
          $('.location').typeahead({
              source: function(location, process){
                  return $.get(path, {location:location}, function(data){
                      return process(data);
                  });
              }
          });
      </script>

 </body>
</html>
