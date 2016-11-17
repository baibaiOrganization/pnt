@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>EDITAR USUARIO - {{$user->name}}</h1>
    </div>
    <form action="" enctype="multipart/form-data" method="POST" class=" Register-form">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class=" row Register-contentLabel">
            <label class="small-10 col-5" for="name">
                <span>Nombres y apellidos</span>
                <input type="text" name="name" id="name" value="{{$user->name}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('name')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="email">
                <span>Email</span>
                <input type="email" name="email" id="email" value="{{$user->email}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('email')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="org_region">
                <span>Región</span>
                <input type="text" name="region" id="region" value="{{$user->region}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('region')}}</span>
                @endif
            </label>

            <label for="city" class="col-5 small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="city" id="city">
                        <option value="Bogotá">Bógota</option>
                        <option value="Medellín" @if($user->city == "Medellín") selected @endif>Medellín</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('city')}}</span>
                @endif
            </label>
        </div>
        <div class="center row"><button> ACTUALIZAR</button></div>
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