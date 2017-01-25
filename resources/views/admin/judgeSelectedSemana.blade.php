@extends('layout.front')

@section('content')

    <div class="Register-header Semana">
        <h1>USUARIOS INSCRITOS AL PREMIO SEMANA</h1>
    </div>

    @if(session('Success'))
        <section class="Message">
            <div class="notification success">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Exitoso</span> {{session('Success')}}<span class="close">X</span>
            </div>
        </section>
    @endif

    <input type="hidden" id="token" value="{{csrf_token()}}">
    <table style="width: 100%; text-align: center; margin: 20px 0 10px;">
        <thead style="background: #df2826; color:white; font-size: .7rem">
        <tr>
            <th style="padding:10px 5px">ARTISTA</th>
            @foreach($categories as $category)
                <th>{{$category->name}}</th>
            @endforeach
            <th style="padding:10px 5px">ACCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($awards as $award)
            <tr style="padding: 5px">
                <td>{{$award->organization->name}}</td>
                @foreach($categories as $category)
                        <td>
                            <select data-award="{{$award->id}}" data-category="{{$category->id}}" style="background: white">
                                <option value=""></option>
                                <option value="0" @if(count($award->score($category->id)) && $award->score($category->id)->score == 0) selected="selected" @endif >N/A</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{$i}}" @if(count($award->score($category->id)) && $award->score($category->id)->score == $i) selected="selected" @endif >{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                @endforeach

                <td class="row between">
                    <a target="_blank" href="{{route('semanaEditUser', $award->id)}}" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 90">
                            <g fill="#df2826" fill-rule="evenodd">
                                <path d="M70.364 26.497L83.3 39.434 43.49 79.248 30.55 66.31l39.814-39.813zm-42.6 43.087L40.7 82.52l-14.94 2.003 2.003-14.94zm51.972-52.432c.98-.98 2.436-1.102 3.572.034l9.42 9.42c1.123 1.123.957 2.47-.054 3.483-1.012 1.01-6.846 6.845-6.846 6.845L72.89 23.998l6.846-6.846zM65.668 23.13c-6.52-4.278-15.046-8.278-25.004-8.47h-.088c-14.204.274-25.512 8.3-32.22 13.824-.32.263-2.518 1.968-2.555 4.147-.026 1.535.682 2.67 1.7 3.618 5.14 5.03 15.977 13.728 30.2 14.85l27.968-27.97zM54.45 34.346c.045-.464.068-.935.068-1.41 0-7.787-6.193-14.105-13.898-14.154-7.686.05-13.9 6.367-13.9 14.153 0 7.786 6.214 14.103 13.9 14.155.384-.002.764-.02 1.14-.053l12.69-12.69zm-13.786-6.913c-.015-.002-.03-.002-.044-.002h-.044v.002c-2.94.074-5.306 2.51-5.306 5.502s2.363 5.43 5.306 5.5v.006c.015 0 .03-.005.044-.005.012 0 .027.005.044.005v-.005c2.963-.07 5.306-2.51 5.306-5.5 0-2.994-2.343-5.43-5.306-5.503z"></path>
                            </g>
                        </svg>
                    </a>
                    <a style="padding:5px" href="#" class="icon saveScore" data-url="{{route('semanaSaveScore')}}" data-award="{{$award->id}}">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.533 438.533" style="enable-background:new 0 0 438.533 438.533;" xml:space="preserve">
                            <g fill="#df2826">
                                <path d="M432.823,121.049c-3.806-9.132-8.377-16.367-13.709-21.695l-79.941-79.942c-5.325-5.325-12.56-9.895-21.696-13.704 C308.346,1.903,299.969,0,292.357,0H27.409C19.798,0,13.325,2.663,7.995,7.993c-5.33,5.327-7.992,11.799-7.992,19.414v383.719 c0,7.617,2.662,14.089,7.992,19.417c5.33,5.325,11.803,7.991,19.414,7.991h383.718c7.618,0,14.089-2.666,19.417-7.991 c5.325-5.328,7.987-11.8,7.987-19.417V146.178C438.531,138.562,436.629,130.188,432.823,121.049z M182.725,45.677 c0-2.474,0.905-4.611,2.714-6.423c1.807-1.804,3.949-2.708,6.423-2.708h54.819c2.468,0,4.609,0.902,6.417,2.708 c1.813,1.812,2.717,3.949,2.717,6.423v91.362c0,2.478-0.91,4.618-2.717,6.427c-1.808,1.803-3.949,2.708-6.417,2.708h-54.819 c-2.474,0-4.617-0.902-6.423-2.708c-1.809-1.812-2.714-3.949-2.714-6.427V45.677z M328.906,401.991H109.633V292.355h219.273 V401.991z M402,401.991h-36.552h-0.007V283.218c0-7.617-2.663-14.085-7.991-19.417c-5.328-5.328-11.8-7.994-19.41-7.994H100.498 c-7.614,0-14.087,2.666-19.417,7.994c-5.327,5.328-7.992,11.8-7.992,19.417v118.773H36.544V36.542h36.544v118.771 c0,7.615,2.662,14.084,7.992,19.414c5.33,5.327,11.803,7.993,19.417,7.993h164.456c7.61,0,14.089-2.666,19.41-7.993 c5.325-5.327,7.994-11.799,7.994-19.414V36.542c2.854,0,6.563,0.95,11.136,2.853c4.572,1.902,7.806,3.805,9.709,5.708l80.232,80.23  c1.902,1.903,3.806,5.19,5.708,9.851c1.909,4.665,2.857,8.33,2.857,10.994V401.991z"/>
                            </g>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--
    @foreach($categories as $caregory)

    @endforeach


    @foreach($regions as $region)
        <section class="ToolBar">
            <h2 style="text-transform: uppercase">REGIÓN {{$region->name}}</h2>
        </section>

        <table class="Table yellow">
            <thead>
            <tr>
                <td>NOMBRE</td>
                <td>EMAIL</td>
                <td>CIUDAD</td>
                <td>ACCIONES</td>
            </tr>
            </thead>
            <tbody>
            @foreach($awards as $award)
                @if($award->region_id == $region->id)
                    <tr>
                        <td>{{$award->organization->name}}</td>
                        <td>{{$award->user->email}}</td>
                        <td>{{$award->organization->city->name}}</td>

                        <td>
                            <a target="_blank" href="{{route('semanaEditUser', $award->id)}}" class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 90">
                                    <g fill="#FFED00" fill-rule="evenodd">
                                        <path d="M70.364 26.497L83.3 39.434 43.49 79.248 30.55 66.31l39.814-39.813zm-42.6 43.087L40.7 82.52l-14.94 2.003 2.003-14.94zm51.972-52.432c.98-.98 2.436-1.102 3.572.034l9.42 9.42c1.123 1.123.957 2.47-.054 3.483-1.012 1.01-6.846 6.845-6.846 6.845L72.89 23.998l6.846-6.846zM65.668 23.13c-6.52-4.278-15.046-8.278-25.004-8.47h-.088c-14.204.274-25.512 8.3-32.22 13.824-.32.263-2.518 1.968-2.555 4.147-.026 1.535.682 2.67 1.7 3.618 5.14 5.03 15.977 13.728 30.2 14.85l27.968-27.97zM54.45 34.346c.045-.464.068-.935.068-1.41 0-7.787-6.193-14.105-13.898-14.154-7.686.05-13.9 6.367-13.9 14.153 0 7.786 6.214 14.103 13.9 14.155.384-.002.764-.02 1.14-.053l12.69-12.69zm-13.786-6.913c-.015-.002-.03-.002-.044-.002h-.044v.002c-2.94.074-5.306 2.51-5.306 5.502s2.363 5.43 5.306 5.5v.006c.015 0 .03-.005.044-.005.012 0 .027.005.044.005v-.005c2.963-.07 5.306-2.51 5.306-5.5 0-2.994-2.343-5.43-5.306-5.503z"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
            {{--@if($isEditable)
                <tr>
                    <td colspan="6">
                        <a href="#" id="sendToJudge" data-url="{{route('sendToJudge')}}" class="Button" style="width:auto;margin:20px 0;padding: 0 10px;background: #FFED00;">FINALIZAR CALIFICACIÓN</a>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    @endforeach--}}

@endsection
@section('scripts')
    <script type="text/javascript">

        $('.saveScore').on('click', function(){
            var url = $(this).data('url'),
                token = $('#token').val(),
                award = $(this).data('award'),
                selectGroup = $('select[data-award="' + award + '"]'),
                categories = {};

            $.each(selectGroup, function(index, category){
                categories[selectGroup.eq(index).data('category')] = selectGroup.eq(index).val();
            });

            $.post(url, {
                '_token' : token,
                'award' : award,
                'categories' : categories
            }, function(response){
                if(response.error){
                    alert(response.error);
                } else {
                    alert('Se han guardado los cambios');
                }
            });

            return false;
        });

    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection