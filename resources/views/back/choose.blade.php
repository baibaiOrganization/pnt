@extends('layout.back')

@section('content')

    <div class="Register-header">
        <h1>ELIGE EL LISTADO DE USUARIOS</h1>
    </div>

    <section class="row around Choose">
        @if(auth()->user()->role_id != 5)
            <article class="col-4 small-12">
                <a href="{{route('semanaUsers')}}" style="color: black;background: #FFED00 "> Usuarios registrados <br> al Premio Semana </a>
            </article>
            @if(auth()->user()->role_id == 1)
                <article class="col-4 small-12">
                    <a style="background: #df2826;" href="{{route('colonUsers')}}"> Usuarios registrados <br> al Premio Teatro Colón</a>
                </article>
            @endif
        @else
            <article class="col-4 small-12">
                <a href="{{route('semanaSelectedUsers')}}" style="color: black;background: #FFED00 "> Usuarios seleccionados <br> al Premio Semana </a>
            </article>
            <article class="col-4 small-12">
                <a style="background: #df2826;" href="{{route('colonSelectedUsers')}}"> Usuarios seleccionados <br> al Premio Teatro Colón</a>
            </article>
        @endif
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