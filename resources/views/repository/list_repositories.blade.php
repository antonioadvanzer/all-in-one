@extends('layout.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Repositorios</h4>
                            <p class="category"></p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Icono</th>
                                    <th>Nombre</th>
                                    <th>Cantidad de Carpetas</th>
                                    <th>Cantidad de Archivos</th>
                                </thead>
                                <tbody>
                                    @foreach($repositories as $r)
                                    <tr>
                                        <td>
                                            <img class="avatar border-gray" src="{{url('img/repositories_icons/'.$r->icon)}}" alt="..."/>
                                        </td>
                                        <td>{{$r->name}}</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

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

            $("#list_repositories").addClass("active");

        });
    </script>

@endsection