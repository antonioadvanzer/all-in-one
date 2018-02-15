@extends('layout.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Roles</h4>
                            <p class="category"></p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Repositorios</th>
                                    <th>Usuarios</th>
                                </thead>
                                <tbody>
                                    @foreach($rol as $r)
                                    <tr>
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

            $("#list_rol").addClass("active");

        });
    </script>

@endsection