@extends('admin.partials.base')

    @section('content')

      <div>
          <h1 style="text-align: center;">Sistema de Identificación de Averias para CANTV</h1>

          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <ul class="list--unstyled">
                          <li style="font-size: 14;">{{ $error }}</li>
                      </ul>
                  @endforeach
              </div>
          @endif
      </div>

      <div class="cssToolTip">
             <div id="login-button">

                <img src="{{ asset('/img/Logo_Siac.png') }}" >
             </div>
            <span>Haga click para iniciar seccion </span>
      </div>

            <div id="container">
            <h1>Acceso</h1>
            <span class="close-btn" >
                <img src="{{ asset('image/circle_close_delete_-128.png')}}">
            </span>

            <form  class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                
                    <input type="email" name="email" placeholder="Usuario" value="{{ old('email') }}" required autofocus/>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                <input type="password" name="password" placeholder="Contraseña" required/>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div style="text-align:center; margin: 0 auto;">

                    <button type="submit" class="btnlogin">
                                    Accesar
                                </button>
                </div>




            </form>

  </div>
