@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>MI PERFIL</h1>
    </div>
    <form action="{{route('postProfile')}}" enctype="multipart/form-data" method="POST" class=" Register-form">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class=" row Register-contentLabel">
            <label class="small-10" for="name">
                <span>Nombres y apellidos</span>
                <input type="text" name="name" id="name" value="{{auth()->user()->name}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('name')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="email">
                <span>Email</span>
                <input type="email" name="email" id="email" value="{{auth()->user()->email}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('email')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="password">
                <span>Contraseña</span>
                <input type="password" name="password" id="password" placeholder="***************">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('password')}}</span>
                @endif
            </label>
        </div>
        <div class="center row"><button>ACTUALIZAR PERFIL</button></div>
    </form>
    <div class="preload red hidden">
        <div class="loader">
            <div class="circle-outer"></div>
            <div class="circle-inner"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/tempFiles.js')}}"></script>
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