@extends('layout.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Nuevo Repositorio</h4>
                    </div>
                    <div class="content">
                        <form id="newRepository" role="form" method="post" action="{{ URL::to('repository/guardar_nuevo_repositorio') }}" enctype="multipart/form-data">
                            
                            <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input id="re-name" name="re-name" type="text" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Icono</label>
                                        <input id="re-icon" name="re-icon" type="file" src="">
                                        <!--<div id="upload-photo" class="lfloat" onclick="openImageUploadBox(event)">
                                            <div class="upload-txt">
                                                Icono
                                            </div>
                                            <img id="profilePic" src="" alt="" class="profile-image"/>
                                        </div>-->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <!--<input type="number" class="form-control" placeholder="ZIP Code">-->
                                        <select id="re-rol" name="re-rol" class="form-control">
                                            @foreach($roles as $r)
                                                <option value="{{$r->id}}">{{$r->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function(){

            $("#new_repository").addClass("active");

        });

        function openImageUploadBox(event) {
          event.preventDefault();
          event.stopPropagation();
          
          var input = document.createElement('input');
          input.setAttribute('type', 'file');
          input.setAttribute('accept', 'image/*');
          input.addEventListener('change', handleUpload);
          input.click();
        }

        function handleUpload(event) {
          var files = event.target.files,
            fileAPISupported = window.File && window.FileReader && window.FileList && window.Blob;
            
          if (files && files.length && fileAPISupported) {
            var file = files[0],
              reader = new FileReader();

            reader.onload = function(e) {
              var imageSource = e.target.result,
              formData = new FormData();
              formData.append('file', file );
              img = document.getElementById('profilePic');
              console.log(img);
              img.src = imageSource;
              img.classList.add('hasImg');
              selectedMedia = {
                assetType: 'PHOTO',
                mediaUrl: ''
              };
              // $.ajax({
              //   url: XB_SERVER_URL + 'public/authenticated/upload?assetType=PHOTO&uploadTrackerId='+guid()+'&file='+encodeURIComponent( file.name ),
              //   data: formData,
              //   processData: false,
              //   contentType: false,
              //   type: 'POST',
              //   success: function(){
              //     loadImageBox(imageSource);
              //   },
              //   error: function() {
              //     alert('There was an error selecting the photo');
              //   }
              // });
            }
            reader.readAsDataURL(file);
          }
        }

        $("#newRepository").on('submit',(function(e){ 
                
                //document.getElementById("content").value = document.getElementById('content_ifr').contentWindow.document.body.innerHTML;
                
                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                });
                e.preventDefault();
                
                /*var files = e.target.files,
                fileAPISupported = window.File && window.FileReader && window.FileList && window.Blob;
                
                if (files && files.length && fileAPISupported) {
                  var file = files[0],
                  reader = new FileReader();
                  
                }*/
//alert($('#profilePic').attr('src'));
                formData = new FormData();
                formData.append('re-icon', $('#profilePic').attr('src'));
                formData.append('re-name', $('#re-name').attr('value'));

                $.ajax({
                  
                    url: "{{ URL::to('repository/guardar_nuevo_repositorio') }}",
                    type: "POST",
                    data: new FormData(this),
                    //data: formData,
                    dataType: "html",
                    processData: false,
                    contentType: false
                    
                }).done(function(data) {
                    console.log(data);
                }).fail(function(data) {
                    console.log(data);
                });
                     
            }));
    </script>

@endsection