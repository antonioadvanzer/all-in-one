@extends('layout.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Nuevo Rol</h4>
                    </div>
                    <div class="content">
                        <form id="newRol" role="form" method="post" action="{{ URL::to('rol/guardar_nuevo_rol') }}">

                            <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input id="rol-name" name="rol-name" type="text" class="form-control" placeholder="Nombre" value="">
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
            $("#new_rol").addClass("active");
        });
        
        $("#newRepository").on('submit',(function(e){ 

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            e.preventDefault();

            formData = new FormData();
            formData.append('rol-name', $('#rol-name').attr('value'));

            $.ajax({
                
                url: "{{ URL::to('rol/guardar_nuevo_rol') }}",
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