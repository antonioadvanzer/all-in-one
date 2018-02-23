@extends('layout.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Nuevo Usuario</h4>
                    </div>
                    <div class="content">
                        <div id="nus" class="alert alert-success hide"><span>¡Guardado con Exito!</span></div>
                        <div id="nuf" class="alert alert-danger hide"><span>¡Falla al Guardar!</span></div>
                        <form id="newUser" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <!--<label>Icono</label>-->
                                        <div id="upload-photo" class="lfloat" onclick="openImageUploadBox(event)">
                                            <div class="upload-txt">
                                                Foto
                                            </div>
                                            <img id="profilePic" src="" alt="" class="profile-image"/>
                                        </div>
                                        <div id="pp" style="visibility:hidden"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input id="nu-name" name="nu-name" type="text" class="form-control" placeholder="Nombre" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input id="nu-email" name="nu-email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input id="nu-password" name="nu-password" type="password" class="form-control" placeholder="Contraseña" value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Perfil</label>
                                        <!--<input type="text" class="form-control" placeholder="City" value="Mike">-->
                                        <select id="nu-typeUser" name="nu-typeUser" class="form-control" required>
                                            @foreach($type_users as $tu)
                                                <option value="{{$tu->id}}">{{$tu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="elements" class="invisible">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de Usuario</label>
                                        <!--<input type="text" class="form-control" placeholder="Country" value="Andrew">-->
                                        <select id="nu-isEmployed" name="nu-isEmployed" class="form-control">
                                            <option value="1">Empleado</option>
                                            <option value="0">Cliente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <!--<input type="number" class="form-control" placeholder="ZIP Code">-->
                                        <select id="nu-rol" name="nu-rol" class="form-control">
                                            @foreach($roles as $r)
                                                <option value="{{$r->id}}">{{$r->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                             <a href="#">
                            <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                              <h4 class="title">Mike Andrew<br />
                                 <small>michael24</small>
                              </h4>
                            </a>
                        </div>
                        <p class="description text-center"> "Lamborghini Mercy <br>
                                            Your chick she so thirsty <br>
                                            I'm in that two seat Lambo"
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                    </div>
                </div>
            </div>-->

        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">
        
        $(document).ready(function(){

            $("#new_user").addClass("active");

        });
        
        $("#nu-typeUser").change(function () {
            
            if($( this ).val() == 1){
                $("#elements").addClass("invisible");
            }else if($( this ).val() == 2){
                $("#elements").removeClass("invisible");
            }
            
        }).change();
        
        $("#newUser").on('submit',(function(e){
            
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            
            e.preventDefault();
            
            $.ajax({
                url: "{{ URL::to('user/nuevo_usuario') }}",
                type: "POST",
                data: new FormData(this),
                dataType: "html",
                processData: false,
                contentType: false
            }).done(function(data) {
                console.log(data);
                window.location.href = "#nus";
                $("#nus").removeClass("hide");
                //location.reload();
                document.getElementById("newUser").reset();
                document.getElementById('profilePic').src = "";

            }).fail(function(data) {
                console.log(data);
                $("#nuf").removeClass("hide");
                window.location.href = "#nuf";              
            });
            
        }));
        
        function openImageUploadBox(event) {
          event.preventDefault();
          event.stopPropagation();
          
          var input = document.createElement('input');
          input.setAttribute('type', 'file');
          input.setAttribute('accept', 'image/*');
          input.setAttribute('id', 'nu-photo');
          input.setAttribute('name', 'nu-photo');
          input.addEventListener('change', handleUpload);
            
            $('#pp').append(input);
            
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
              formData.append( 'file', file ),
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
        
    </script>

@endsection