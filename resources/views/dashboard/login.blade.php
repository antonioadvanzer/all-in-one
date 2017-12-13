@extends('layout.auth')

@section('content')
  
  <div id="login-button">
    <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
    </img>
  </div>

  <div id="container">
    <h1>All in One</h1>
    <span class="close-btn">
      <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
    </span>

    <form id="logout-form" role="form" action="{{ route('start_session') }}" method="POST">
      
      {{ csrf_field() }}
      
      <input type="email" name="aio_email" placeholder="E-mail">
      <input type="password" name="aio_pass" placeholder="Contraseña">

      @if (session('status'))
        <div class="alert alert-danger">
        {{ session('status') }}
        </div>
      @endif
      
      <!--<a href="#">Log in</a>-->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default btn-auth">Iniciar Sesión</button>
        </div>
      </div>
      
      <div id="remember-container">
        <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
        <span id="remember">Remember me</span>
        <span id="forgotten">Forgotten password</span>
      </div>
    </form>
  </div>

  <!-- Forgotten Password Container -->
  <div id="forgotten-container">
     <h1>Forgotten</h1>
    <span class="close-btn">
      <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
    </span>

    <form>
      <input type="email" name="email" placeholder="E-mail">
      <a href="#" class="orange-btn">Get new password</a>
  </form>
</div>

@endsection