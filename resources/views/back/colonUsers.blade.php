@extends('layout.front')

@section('content')

    <div class="Register-header Colon">
        <h1>USUARIOS INSCRITOS AL PREMIO COLON</h1>
    </div>

    @if(session('Success'))
        <section class="Message">
            <div class="notification success">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Exitoso</span> {{session('Success')}}<span class="close">X</span>
            </div>
        </section>
    @endif

    <section class="ToolBar">
        <div id="SendExcel" class="Download-Excel" style="width: 50px; cursor:pointer">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" width="100%" height="auto">
                <g fill="#FFED00">
                    <path d="M25.162,3H16v2.984h3.031v2.031H16V10h3v2h-3v2h3v2h-3v2h3v2h-3v3h9.162   C25.623,23,26,22.609,26,22.13V3.87C26,3.391,25.623,3,25.162,3z M24,20h-4v-2h4V20z M24,16h-4v-2h4V16z M24,12h-4v-2h4V12z M24,8   h-4V6h4V8z"/>
                    <path d="M0,2.889v20.223L15,26V0L0,2.889z M9.488,18.08l-1.745-3.299c-0.066-0.123-0.134-0.349-0.205-0.678   H7.511C7.478,14.258,7.4,14.494,7.277,14.81l-1.751,3.27H2.807l3.228-5.064L3.082,7.951h2.776l1.448,3.037   c0.113,0.24,0.214,0.525,0.304,0.854h0.028c0.057-0.198,0.163-0.492,0.318-0.883l1.61-3.009h2.542l-3.037,5.022l3.122,5.107   L9.488,18.08L9.488,18.08z"/>
                </g>
            </svg>
        </div>
        <form class="search" method="get" action="{{route('searchUser', 1)}}">
            <button class="icon yellow">
                <svg width="50%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250.313 250.313">
                    <g fill="#fff">
                        <path d="M244.186,214.604l-54.379-54.378c-0.289-0.289-0.628-0.491-0.93-0.76 c10.7-16.231,16.945-35.66,16.945-56.554C205.822,46.075,159.747,0,102.911,0S0,46.075,0,102.911 c0,56.835,46.074,102.911,102.91,102.911c20.895,0,40.323-6.245,56.554-16.945c0.269,0.301,0.47,0.64,0.759,0.929l54.38,54.38 c8.169,8.168,21.413,8.168,29.583,0C252.354,236.017,252.354,222.773,244.186,214.604z M102.911,170.146 c-37.134,0-67.236-30.102-67.236-67.235c0-37.134,30.103-67.236,67.236-67.236c37.132,0,67.235,30.103,67.235,67.236 C170.146,140.044,140.043,170.146,102.911,170.146z"/>
                    </g>
                </svg>
            </button>
            <input type="text" name="search" id="search">
        </form>
    </section>

    <table class="Table yellow">
        <thead>
            <tr>
                <td>NOMBRE</td>
                <td>EMAIL</td>
                <td>CIUDAD</td>
                <td>VER/EDITAR</td>
            </tr>
        </thead>
        <tbody>
            @foreach($awards as $award)
            <tr>
                <td>{{$award->organization->name}}</td>
                <td>{{$award->user->email}}</td>
                <td>{{$award->organization->city}}</td>
                <td>
                    <a href="{{route('colonEditUser', $award->id)}}" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 90">
                            <g fill="#e4bf08" fill-rule="evenodd">
                                <path d="M70.364 26.497L83.3 39.434 43.49 79.248 30.55 66.31l39.814-39.813zm-42.6 43.087L40.7 82.52l-14.94 2.003 2.003-14.94zm51.972-52.432c.98-.98 2.436-1.102 3.572.034l9.42 9.42c1.123 1.123.957 2.47-.054 3.483-1.012 1.01-6.846 6.845-6.846 6.845L72.89 23.998l6.846-6.846zM65.668 23.13c-6.52-4.278-15.046-8.278-25.004-8.47h-.088c-14.204.274-25.512 8.3-32.22 13.824-.32.263-2.518 1.968-2.555 4.147-.026 1.535.682 2.67 1.7 3.618 5.14 5.03 15.977 13.728 30.2 14.85l27.968-27.97zM54.45 34.346c.045-.464.068-.935.068-1.41 0-7.787-6.193-14.105-13.898-14.154-7.686.05-13.9 6.367-13.9 14.153 0 7.786 6.214 14.103 13.9 14.155.384-.002.764-.02 1.14-.053l12.69-12.69zm-13.786-6.913c-.015-.002-.03-.002-.044-.002h-.044v.002c-2.94.074-5.306 2.51-5.306 5.502s2.363 5.43 5.306 5.5v.006c.015 0 .03-.005.044-.005.012 0 .027.005.044.005v-.005c2.963-.07 5.306-2.51 5.306-5.5 0-2.994-2.343-5.43-5.306-5.503z"></path>
                            </g>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $awards->render() !!}
    <section class="Popup-Container" id="Popup" style="display:none">
        <article class="Popup yellow">
            <div class="close">X</div>
            <p>Escribe el email al que deseas enviar la lista de usuarios</p>
            <form action="{{route('generateExcel', 1)}}" method="POST">
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