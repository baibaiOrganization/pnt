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
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Error</span> {{$errors->first('email')}} <span class="close">X</span>
            </div>
        </section>
    @endif

    <div class="row around">
        <form method="POST" action="{{route('postEmail')}}" class=" col-5 small-12 Form-home Register-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2>RESTAURAR CONTRASEÑA</h2>
            <label style=" margin-top: 2rem "  class="col-10 small-10" for="group_name">
                <span>Correo electrónico</span>
                <input type="email" name="email" id="email">
            </label>
            <div class="center row">
                <button style="margin: 20px auto 40px"> ENVIAR</button>
            </div>
            <a style="color:#df2826; display: block; text-align: center; padding-bottom: 30px" href="/">Ingresar o registrarse</a>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection
