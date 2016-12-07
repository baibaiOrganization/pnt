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
            @if($event[1])
                <a style="color: black; background: #FFED00;" href="#" class="disabled"> Ya está inscrito al <br> Premio Semana </a>
            @else
                <a style="color: black; background: #FFED00;" href="{{route('semana')}}"> Inscripción <br> Premio Semana </a>
            @endif
        </article>
        <article class="col-4 small-12">
            @if($event[0])
                <a href="#" class="disabled"> Ya está inscrito al <br> Premio Teatro Colón</a>
            @else
                <a href="{{route('colon')}}"> Inscripción <br> Premio Teatro Colón</a>
            @endif
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