@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>LISTADO DE USUARIOS</h1>
    </div>

    @if(session('Success'))
        <section class="Message">
            <div class="notification success">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Exitoso</span> {{session('Success')}}<span class="close">X</span>
            </div>
        </section>
    @endif

    <section class="ToolBar">
        <div style="visibility: hidden;"></div>
        <form class="search" method="get" action="{{route('searchUser', 2)}}">
            <button class="icon red">
                <svg width="50%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250.313 250.313">
                    <g fill="#fff">
                        <path d="M244.186,214.604l-54.379-54.378c-0.289-0.289-0.628-0.491-0.93-0.76 c10.7-16.231,16.945-35.66,16.945-56.554C205.822,46.075,159.747,0,102.911,0S0,46.075,0,102.911 c0,56.835,46.074,102.911,102.91,102.911c20.895,0,40.323-6.245,56.554-16.945c0.269,0.301,0.47,0.64,0.759,0.929l54.38,54.38 c8.169,8.168,21.413,8.168,29.583,0C252.354,236.017,252.354,222.773,244.186,214.604z M102.911,170.146 c-37.134,0-67.236-30.102-67.236-67.235c0-37.134,30.103-67.236,67.236-67.236c37.132,0,67.235,30.103,67.235,67.236 C170.146,140.044,140.043,170.146,102.911,170.146z"/>
                    </g>
                </svg>
            </button>
            <input type="text" name="search" id="search">
        </form>
    </section>

    <table class="Table red">
        <thead>
            <tr>
                <td>NOMBRE</td>
                <td>EMAIL</td>
                <td>ESTADO</td>
                <td>ACCIONES</td>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>Activo</td>
                <td><a href="{{route('admin.userEdit', $user->id)}}">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <span class="red">{!! $users->render() !!}</span>

    <section class="Popup-Container" id="Popup" style="display:none">
        <article class="Popup red">
            <div class="close">X</div>
            <p>Escribe el email al que deseas enviar la lista de usuarios</p>
            <form action="{{route('generateExcel', 2)}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="email">
                    <input type="text"name="email">
                    <button>Enviar</button>
                </label>
            </form>
        </article>
    </section>
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

        $('#SendExcel').on('click', function(){
            $('#Popup').show();
        });

        $('#Popup .close').on('click', function(){
            $('#Popup').hide();
        });
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection