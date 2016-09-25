@extends('layout.front')
@section('content')

    <div class="Register-header"></div>

    @if(session('Success'))
        <section class="Message">
            <div class="notification success">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Exitoso!</span> {{session('Success')}}<span class="close">X</span>
            </div>
        </section>
    @endif

    @if(count($errors))
        <section class="Message">
            <div class="notification error">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Error</span> {{$errors->first()}} <span class="close">X</span>
            </div>
        </section>
    @endif

    <div class="row around">
        <form method="POST" action="{{route('postReset')}}" class=" col-5 small-12 Form-home Register-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">

            <h2>NUEVA CONTRASEÑA</h2>
            <label style=" margin-top: 2rem "  class="col-10 small-10" for="group_name">
                <span>Correo electrónico</span>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Contraseña</span>
                <input type="password" name="password" id="password">
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Confirmar contraseña</span>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </label>
            <div class="center row">
                <button style="margin: 20px auto 40px"> RESTAURAR</button>
            </div>
        </form>
    </div>

    <!--

            {!! csrf_field() !!}


            <label for="email" class="row middle">
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5">email:</span>
                <input class="col-7" id="email" type="email" name="email" value="{{ old('email') }}">
            </label>
            <label for="password" class="row middle">
                {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                <span class="col-5">Contraseña:</span>
                <input class="col-7" name="password" id="password" type="password">
            </label>
            <label for="password_confirmation" class="row middle">
                <span class="col-5">Confirmar contraseña:</span>
                <input class="col-7" name="password_confirmation" id="password_confirmation" type="password">
            </label>
            <div class="row col-12 end ">
                <button>RESTAURAR</button>
            </div>
        </div>
    </form>
-->

@endsection

@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/password.js')}}"></script>
@endsection



