@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>ELIGE FORMULARIO DE INSCRIPCIÓN</h1>
    </div>

    @if(session('Success'))
        <section class="Message">
            <div class="notification success">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Exitoso</span> {{session('Success')}}<span class="close">X</span>
            </div>
        </section>
    @endif

    <section class="row around Choose">
        <article class="col-4 small-12">
            <a href="{{route('semana')}}"> Inscripción <br> Premio Semana </a>
        </article>
        <article class="col-4 small-12">
            <a style="background: #FFED00;color: black;" href="{{route('colon')}}"> Inscripción <br> Premio Teatro Colón</a>
           {{-- <p>Ya te has registrado al premio Semana </p>--}}
        </article>
    </section>

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