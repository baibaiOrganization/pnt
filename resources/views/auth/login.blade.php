    @extends('layout.front')

@section('content')

    <form class="row Form-register" method="POST" action="{{ route('login') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1 class="col-8 small-12  bottom-element">
            DIRECTORIO
            <b>INDUSTRIAS CREATIVAS Y CULTURALES</b>
        </h1>
        <div class="col-8 offset-4 offset-small-0 small-12">
            <hr class="Form-hr">
            <label for="email" class="row middle">
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5">email:</span>
                <input class="col-7" id="email" type="email" name="email" value="{{ old('email') }}">
            </label>
            <label for="email" class="row middle">
                {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                <span class="col-5">Contraseña:</span>
                <input class="col-7" id="password" type="password" name="password">
            </label>
            <div class="row end">
                <a style="color: #67b9e5; font-size: 14px" class="login-restartPassword" href="{{route('getEmail')}}">
                    Olvido su contraseña?
                </a>
            </div>
        </div>
        <div class="row col-12 end ">
            <button>INICIO DE SESIÓN...</button>
        </div>
    </form>

@endsection