@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>INSCRIPCIÓN PARA POSTULACIONES AL PREMIO</h1>
    </div>

    <div class="row around  ">
        <form action="" class=" col-5 small-12 Form-home Register-form">
            <h2>FORMULARIO DE INICIO DE SESIÓN</h2>
            <label style=" margin-top: 2rem "  class="col-10 small-10" for="group_name">
                <span>Correo electrónico</span>
                <input type="email" name="email" id="email">
            </label>
            <label class="col-10 small-10" for="password">
                <span>Contraseña</span>
                <input type="password" name="password" id="password">
            </label>
            <div class="center row"><button> INGRESAR</button></div>
        </form>
        <form action="" class="col-5 small-12  Form-home Register-form">
            <h2>FORMULARIO DE REGISTRO</h2>
            <label style=" margin-top: 2rem "  class="col-10 small-10" for="group_name">
                <span>Correo electrónico</span>
                <input type="email" name="email" id="email">
            </label>
            <label class="col-10 small-10" for="password">
                <span>Contraseña</span>
                <input type="password" name="password" id="password">
            </label>

            <label class="col-10 small-10" for="password">
                <span>Repetir contraseña</span>
                <input type="password" name="password" id="password">
            </label>
            <div class="center row"><button> REGISTRARSE</button></div>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('js/form.js')}}"></script>
    <script type="text/javascript">
        $('#sector').select2({
            closeOnSelect: false
        });

    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection