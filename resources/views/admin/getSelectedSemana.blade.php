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

    <ul class="Categories">
        @foreach($categories as $category)
            <li class="Category row" style="padding: 10px;">
                <span class="title col-11 row">
                    <span class="closer red"></span>
                    <span>{{$category->name}}</span>
                </span>
                <section class="users row small-12" style="display:none">
                    <table style="width: 100%; text-align: center; margin: 20px 0 10px;">
                        <thead style="background: #df2826; color: white">
                            <tr>
                                <th>NOMBRE</th>
                                <th>REGIÓN</th>
                                <th>JUEZ 1</th>
                                <th>JUEZ 2</th>
                                <th>JUEZ 3</th>
                                <th>TOTAL</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($awards as $award)
                                <tr style="padding: 5px">
                                    <td>{{$award->organization->name}}</td>
                                    <td>{{$award->organization->region->name}}</td>
                                    <td>
                                        <?php $sum1 = 0 ?>
                                        @foreach($award->scores as $score)
                                            @if($score->user_id == $judges[0]->id && $category->id == $score->category_id)
                                                <?php $sum1 += intval($score->score); ?>
                                            @endif
                                        @endforeach
                                        {{$sum1}}
                                    </td>
                                    <td>
                                        <?php $sum2 = 0 ?>
                                        @foreach($award->scores as $score)
                                            @if($score->user_id == $judges[1]->id && $category->id == $score->category_id)
                                                <?php $sum2 += intval($score->score); ?>
                                            @endif
                                        @endforeach
                                        {{$sum2}}
                                    </td>
                                    <td>
                                        <?php $sum3 = 0 ?>
                                        @foreach($award->scores as $score)
                                            @if($score->user_id == $judges[2]->id && $category->id == $score->category_id)
                                                <?php $sum3 += intval($score->score); ?>
                                            @endif
                                        @endforeach
                                        {{$sum3}}
                                    </td>
                                    <td>
                                        {{round( ( ($sum3 + $sum2 + $sum1) / 3), 2 ) }}
                                    </td>
                                    <td class="row between">
                                        <a target="_blank" href="{{route('semanaEditUser', $award->id)}}" class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 90">
                                                <g fill="#df2826" fill-rule="evenodd">
                                                    <path d="M70.364 26.497L83.3 39.434 43.49 79.248 30.55 66.31l39.814-39.813zm-42.6 43.087L40.7 82.52l-14.94 2.003 2.003-14.94zm51.972-52.432c.98-.98 2.436-1.102 3.572.034l9.42 9.42c1.123 1.123.957 2.47-.054 3.483-1.012 1.01-6.846 6.845-6.846 6.845L72.89 23.998l6.846-6.846zM65.668 23.13c-6.52-4.278-15.046-8.278-25.004-8.47h-.088c-14.204.274-25.512 8.3-32.22 13.824-.32.263-2.518 1.968-2.555 4.147-.026 1.535.682 2.67 1.7 3.618 5.14 5.03 15.977 13.728 30.2 14.85l27.968-27.97zM54.45 34.346c.045-.464.068-.935.068-1.41 0-7.787-6.193-14.105-13.898-14.154-7.686.05-13.9 6.367-13.9 14.153 0 7.786 6.214 14.103 13.9 14.155.384-.002.764-.02 1.14-.053l12.69-12.69zm-13.786-6.913c-.015-.002-.03-.002-.044-.002h-.044v.002c-2.94.074-5.306 2.51-5.306 5.502s2.363 5.43 5.306 5.5v.006c.015 0 .03-.005.044-.005.012 0 .027.005.044.005v-.005c2.963-.07 5.306-2.51 5.306-5.5 0-2.994-2.343-5.43-5.306-5.503z"></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </li>
        @endforeach
    </ul>

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

        $('.saveScore').on('click', function(){
            var url = $(this).data('url'),
                token = $('#token').val(),
                award = $(this).data('award'),
                category = $(this).data('category');

            $.post(url, {
                '_token' : token,
                'award' : award,
                'category' : category
            }, function(response){
                console.log(response);
            });

            return false;
        });

        $('#sendToJudge').on('click', function(){
            var r = confirm('Una vez enviado al juez, no podrá volver a hacer modificaciones. ¿Desea finalizar el proceso de preselección?');
            if(r){
                var url = $(this).data('url'),
                        token = $('#token').val();


                $.post(url, { '_token' : token }, function(response){
                    console.log(response);
                    if(response.error){
                        alert(response.message);
                    } else {
                        window.location.reload();
                    }
                });
            }
            return false;
        });

        $('label.CheckboxContainer .Checkbox').on('change', function(){
            var element = $(this),
                    award_id = element.children('input.award_id').val(),
                    url = $('#preselected_url').val(),
                    token = $('#token').val(),
                    flag = element.children('input').is(':checked');

            $.post(url, {
                '_token' : token,
                'award_id' : award_id,
                'isSelected' : flag
            }, function(response){
                console.log(response);
                if(response.error){
                    alert(response.message);
                }else {
                    flag ? element.parent().addClass('active') : element.parent().removeClass('active');
                }
            });
        });

        $('.Category .title').on('click', function(){
            $(this).children('.closer').toggleClass('open');
            $(this).siblings('section').slideToggle();
            /*if((this).hasClass('open')){
                $(this).pa
            } else {

            }*/
        });

    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection