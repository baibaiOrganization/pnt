@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>FORMULARIO DE INSCRIPCIÓN PARA POSTULACIONES AL PREMIO</h1>
    </div>
    <form action="{{ route('register') }}" enctype="multipart/form-data" method="post"
          class=" Register-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10" for="group_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5" for="group_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <input type="file" name="group_name" id="group_name">
                </div>

            </label>
            <label class="col-5" for="group_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <input type="file" name="group_name" id="group_name">
                </div>

            </label>
        </div>
        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>

    </form>

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