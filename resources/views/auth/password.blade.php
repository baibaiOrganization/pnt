@extends('layout.front')

@section('content')

    <form class="row Form-register" role="form" method="POST" action="{{route('postEmail')}}">
        <h1 class="col-8 small-12  bottom-element">
            DIRECTORIO
            <b>INDUSTRIAS CREATIVAS Y CULTURALES</b>
        </h1>
        <div class="col-8 offset-4 offset-small-0 small-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="email" class="row middle">

                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5">email:</span>
                <input class="col-7" id="email" type="email" name="email" value="{{ old('email') }}">

            </label>
            <div class="row col-12 end ">
                <button>RESTAURAR</button>
            </div>
        </div>
    </form>


@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection
