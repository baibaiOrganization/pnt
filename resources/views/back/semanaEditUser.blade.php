@extends('layout.front')

@section('content')

    <div class="Register-header Semana">
        <h1>USUARIO INSCRITO AL PREMIO SEMANA</h1>
    </div>
    <form action="{{ url('admin/usuarios/semana/') }}" enctype="multipart/form-data" method="GET" class=" Register-form Semana-form"> <!--route('semanaUpdate', $award->id) -> ruta : {{ url('admin/usuarios/semana/') }} -->
        <!--<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="url" id="url" value="{{ url('ajaxTempFiles') }}">-->

        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="org_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="org_name" id="org_name" value="{{$award->organization->name}}">
            </label>

            <label class="col-5 small-10" for="type8">
                <span>Logo, foto o imagen identificativa</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(8))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(8)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>

                    <span class="Register-tooltip">
                        @if((session('Error') && old('type8')) || (isset($award) && $award->file(8)))
                            @if(session('Error'))
                                {{old('type8')}}
                            @else
                                {{$award->file(8)->name}}
                            @endif
                        @else
                            '(.jpg, .jpeg, .png)
                        @endif
                    </span>

                    <input type="hidden" name="type8"
                           @if(session('Error'))
                           value="{{old('org_name')}}"
                           @elseif(isset($award) && $award->file(8))
                           value="{{$award->file(8)->name}}"
                            @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type8')}}</span>
                @endif
            </label>

            <label class="col-5  small-10" for="type9">
                <span>Certificado cámara de comercio (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(9))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(9)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type9')) || (isset($award) && $award->file(9)))
                            @if(session('Error'))
                                {{old('type9')}}
                            @elseif($award->file(9))
                                {{$award->file(9)->name}}
                            @endif
                        @else
                            Solo para grupos constituídos
                        @endif
                    </span>

                    <input type="hidden" name="type9"
                           @if(session('Error'))
                           value="{{old('type9')}}"
                           @elseif(isset($award) && $award->file(9))
                           value="{{$award->file(9)->name}}"
                            @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type9')}}</span>
                @endif
            </label>
            <label class="col-10 small-10" for="type5">
                <span>Portafolio del grupo(.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(5))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(5)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type5')) || (isset($award) && $award->file(5)))
                            @if(session('Error'))
                                {{old('type5')}}
                            @else
                                {{$award->file(5)->name}}
                            @endif
                        @else
                            Trayectoria de la compañía, mínimo 3 años de experiencia verificable
                        @endif
                    </span>

                    <input type="hidden" name="type5"
                           @if(session('Error'))
                           value="{{old('type5')}}"
                           @elseif(isset($award) && $award->file(5))
                           value="{{$award->file(5)->name}}"
                            @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type5')}}</span>
                @endif
            </label>

            <label for="org_region" class="col-5 small-10">
                <div class="Register-contentSelect">
                    <span>Región</span>
                    <input type="text" value="{{$award->organization->region->name}}">
                </div>
            </label>

            <label for="org_city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <input type="text" name="org_city" id="org_city" value="{{$award->organization->city}}">
                    {{--<span class="Register-arrowSelect">▼</span>
                    <select name="org_city" id="org_city">
                        <option data-region="0" value="">Selecciona una ciudad</option>
                        @foreach($cities as $city)
                            <option class="hidden" data-region="{{$city->region->id}}" value="{{$city->id}}" @if((session('Error') && old('org_city') == $city->id) || ($organization && $organization->city_id == $city->id)) selected @endif >{{$city->name}}</option>
                        @endforeach
                    </select>--}}
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_city')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="org_address">
                <span>Dirección física</span>
                <input type="text" name="org_address" id="org_address" value="{{$award->organization->address}}" >
            </label>

            <label class="col-5 small-10" for="org_phone">
                <span>Teléfono fijo de contacto</span>
                <input type="text" name="org_phone" id="org_phone" value="{{$award->organization->phone}}">
            </label>
            <label class="col-5 small-10" for="org_mobile">
                <span>Teléfono celular de contacto</span>
                <input type="text" name="org_mobile" id="org_mobile" value="{{$award->organization->mobile}}">
            </label>

            <label class="col-5 small-10" for="org_email">
                <span>correo electrónico de contacto</span>
                <input type="email" name="org_email" id="org_email" value="{{$award->organization->email}}">

            </label>

            <label class="col-5 small-10" for="org_website">
                <span>Sitio Web</span>
                <input type="text" name="org_website" id="org_website" value="{{$award->organization->website}}">

            </label>

            <label class="col-12 small-10 row Colon-social" for="group_name">
                <span  class="col-12 ">Redes sociales (facebook, instagram, twitter)</span>
                <input class="col-4" type="text" name="facebook" id="facebook" value="{{explode(',', $award->organization->socials)[0]}}" >
                <input  class="col-4" type="text" name="instagram" id="instagram" value="{{explode(',', $award->organization->socials)[1]}}" >
                <input class="col-4"  type="text" name="twitter" id="twitter" value="{{explode(',', $award->organization->socials)[2]}}" >
            </label>
            {{--<label class="col-10 small-10" for="type16">
                <span>Hoja de vida de la agrupación, grupo constituido o de los integrantes de la unión temporal (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a target="_blank" href="{{url('uploads/semana/' . $award->file(16)->name)}}" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type16')) || (isset($award) && $award->file(16)))
                            @if(session('Error'))
                                {{old('type16')}}
                            @else
                                {{$award->file(16)->name}}
                            @endif
                        @else
                            Mínimo 3 años de experiencia verificable.
                        @endif
                    </span>

                    <input type="hidden" name="type16"
                           @if(session('Error'))
                           value="{{old('type16')}}"
                           @elseif(isset($award) && $award->file(16))
                           value="{{$award->file(16)->name}}"
                            @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type16')}}</span>
                @endif
            </label>--}}
        </div>

        <h2 class="col-12">DATOS DE LA PRODUCCIÓN ARTÍSTICA</h2>
        <div class=" row Register-contentLabel">

            <label class="col-10 small-10" for="prd_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="prd_name" id="prd_name" value="{{$award->production->name}}" >

            </label>
            <label class="col-5 small-10" for="prd_date">
                <span>Fecha de estreno</span>
                <input type="date" name="prd_date" id="prd_date" value="{{$award->production->release_date }}" >
            </label>

            {{--<label for="prd_genre" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Género:</span>
                    <input type="text" value="{{$award->production->genre}}" >
                </div>
            </label> --}}

            <label class="col-5 small-10" for="type1">
                <span>Sinópsis (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(1))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(1)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type1')) || (isset($award) && $award->file(1)))
                            @if(session('Error'))
                                {{old('type1')}}
                            @else
                                {{$award->file(1)->name}}
                            @endif
                        @else
                            Máximo 20 lineas
                        @endif
                    </span>
                </div>

            </label>

            <label class="col-5 small-10" for="type2">
                <span>Texto o libreto (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(2))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(2)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type2')) || (isset($award) && $award->file(2)))
                            @if(session('Error'))
                                {{old('type2')}}
                            @else
                                {{$award->file(2)->name}}
                            @endif
                        @else
                            Los textos dramáticos presentados deben ser en español. Para teatro musical, incluir las respectivas partituras y autorizaciones de los autores.
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-5 small-10" for="type3">
                <span>Certificado de registro de Derechos de Autor</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(3))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(3)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type3')) || (isset($award) && $award->file(3)))
                            @if(session('Error'))
                                {{old('type3')}}
                            @else
                                {{$award->file(3)->name}}
                            @endif
                        @else
                            Autorización de uso de la obra (.pdf)
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-5 small-10" for="type4">
                <span>Certificación de música original en caso de tenerla</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(4))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(4)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type4')) || (isset($award) && $award->file(4)))
                            @if(session('Error'))
                                {{old('type4')}}
                            @else
                                {{$award->file(4)->name}}
                            @endif
                        @else
                            Autorización de uso de las piezas musicales (pdf,png,jpeg)
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-5 small-10" for="type28">
                <span>Dossier del espectáculo (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(28))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(28)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type28')) || (isset($award) && $award->file(28)))
                            @if(session('Error'))
                                {{old('type28')}}
                            @else
                                {{$award->file(28)->name}}
                            @endif
                        @endif
                    </span>

                </div>

            </label>

            <label class="col-5 small-10" for="type6">
                <!--<span>Soporte de 5 presentaciones realizadas hasta el 30 de Sept</span>-->
                <span>Soporte de 5 presentaciones realizadas del 1 de Abril de 2015 al 30 de Noviembre de 2016</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(6))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(6)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type6')) || (isset($award) && $award->file(6)))
                            @if(session('Error'))
                                {{old('type6')}}
                            @else
                                {{$award->file(6)->name}}
                            @endif
                        @else
                            Afiches, certificaciones, prensa, programas de mano, etc.) (.pdf)
                        @endif
                    </span>

                </div>

            </label>

            <label class="col-5 small-10" for="type7">
                <span>Para uniones temporales, hoja de Vida de c/u de los integrantes</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        @if(isset($award) && $award->file(7))
                            <a target="_blank" href="{{url('uploads/semana/' . $award->file(7)->name)}}" class="Register-openFile">Abrir</a>
                        @endif
                    </span>
                    <span class="Register-tooltip" >
                        @if((session('Error') && old('type7')) || (isset($award) && $award->file(7)))
                            @if(session('Error'))
                                {{old('type7')}}
                            @else
                                {{$award->file(7)->name}}
                            @endif
                        @else
                            Hoja de vida del equipo artístico y creativo (.pdf)
                        @endif
                    </span>

                </div>

            </label>

            <label class="col-10 small-10" for="prd_video">
                <span>Registro audiovisual (vínculo a video del espectáculo)</span>
                <textarea class="col-12" name="prd_video" id="prd_video" placeholder="Grabación completa del espectáculo en buena calidad de imagen (mínimo 1280x720 ) y audio. Deberá ser en plano general y sin edición.">@if(session('Error')){{old('prd_video')}}@elseif($award->production){{$award->production->link_video}}@endif</textarea>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_video')}}</span>
                @endif
            </label>

        </div>

            <h2 class="col-12">DATOS DEL REPRESENTANTE LEGAL</h2>
            <div class="row Register-contentLabel">
                <label class="col-5 small-10" for="rep_name">
                    <span>Nombres</span>
                    <input type="text" name="rep_name" id="rep_name" value="{{$award->propietor->name}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_name')}}</span>
                    @endif
                </label>
                <label class="col-5 small-10" for="rep_last_name">
                    <span>Apellidos</span>
                    <input type="text" name="rep_last_name" id="rep_last_name" value="{{$award->propietor->last_name}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_last_name')}}</span>
                    @endif
                </label>
                <label for="city" class="col-5  small-10">
                    <div class="Register-contentSelect">
                        <span>Tipo de Documento de Identidad:</span>
                        <span class="Register-arrowSelect">▼</span>
                        <select name="rep_doc_typ" id="rep_doc_typ">
                            <option value="2" @if($award->propietor->document_type_id == 1) selected @endif >Cédula</option>
                            <option value="3" @if($award->propietor->document_type_id == 2) selected @endif >Cédula de Extranjería</option>
                            <option value="4" @if($award->propietor->document_type_id == 3) selected @endif >Pasaporte</option>
                        </select>
                    </div>
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_typ')}}</span>
                    @endif
                </label>
                <label class="col-5 small-10" for="rep_doc_number">
                    <span>Número de documento</span>
                    <input type="text" name="rep_doc_number" id="rep_doc_number" value="{{$award->propietor->document_number}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_number')}}</span>
                    @endif
                </label>
                <label class="col-5 small-10" for="rep_mobile">
                    <span>Teléfono celular de contacto</span>
                    <input type="text" name="rep_mobile" id="rep_mobile" value="{{$award->propietor->mobile}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_mobile')}}</span>
                    @endif
                </label>
                <div class="col-5"></div>
                <label class=" col-5 small-10" for="rep_email">
                    <span>Correo electrónico de contacto</span>
                    <input type="email" name="rep_email" id="rep_email" value="{{$award->propietor->email1}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email')}}</span>
                    @endif
                </label>
                <label class=" col-5 small-10" for="rep_email2">
                    <span>Correo electrónico de contacto 2</span>
                    <input type="email" name="rep_email2" id="rep_email2" value="{{$award->propietor->email2}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email2')}}</span>
                    @endif
                </label>

                <!--<h2 class="small-12">CATEGORIA(S) DE POSTULACIÓN</h2>-->
                <h2 class="small-12">DOCUMENTOS NECESARIOS</h2>
                <section class="row between small-12" id="Categories">
                    <!--
                    *************************************
                    ************* CHECKBOX 1 ************
                    *************************************
                    -->
                    <label class="small-12 CheckboxContainer @if(old('check1') || (isset($award) && $award->awardCategory(1))) col-4 active @endif" for="check1">
                    <span class="Checkbox">
                        <span>OBRA</span>
                        <input type="checkbox" name="check1" id="check1" value="1" @if(old('check1') || (isset($award) && $award->awardCategory(1))) checked="checked" @endif >
                    </span>
                    </label>
                    <label class=" @if(!(old('check1') || (isset($award) && $award->awardCategory(1)))) hidden @endif col-8 small-12" for="type29">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(29))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(29)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                        @if((session('Error') && old('type29')) || (isset($award) && $award->file(29)))
                                    @if(session('Error'))
                                        {{old('type29')}}
                                    @else
                                        {{$award->file(29)->name}}
                                    @endif
                                @else
                                    Fotos (min 5, max 10), textos o libreto (.zip .rar)
                                @endif
                            </span>
                            <input type="hidden" name="type29"
                                   @if(session('Error'))
                                   value="{{old('type29')}}"
                                   @elseif(isset($award) && $award->file(29))
                                   value="{{$award->file(29)->name}}"
                                    @endif >
                        </div>
                    </label>
                    <label for="" style="display:none"><span class="Empty"></span></label>

                    <!--
                    *************************************
                    ************* CHECKBOX 2 ************
                    *************************************
                    -->

                    <label class="small-12 CheckboxContainer @if(old('check2') || (isset($award) && $award->awardCategory(2))) col-4 active @endif" for="check2">
                    <span class="Checkbox">
                        <span>DIRECTOR</span>
                        <input type="checkbox" name="check2" id="check2" value="2" @if(old('check2') || (isset($award) && $award->awardCategory(2))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check2') || (isset($award) && $award->awardCategory(2)))) hidden @endif col-8 small-12" for="type30">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(30))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(30)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>

                            <span class="Register-tooltip">
                                @if((session('Error') && old('type30')) || (isset($award) && $award->file(30)))
                                    @if(session('Error'))
                                        {{old('type30')}}
                                    @else
                                        {{$award->file(30)->name}}
                                    @endif
                                @else
                                    Fotos ilustrativas (.zip .rar) 5 - 10
                                @endif
                            </span>
                        </div>
                    </label>
                    <label for="" style="display:none"><span class="Empty"></span></label>

                    <!--
                    *************************************
                    ************* CHECKBOX 3 ************
                    *************************************
                    -->

                    {{--<label class="small-12 CheckboxContainer @if(old('check3') || (isset($award) && $award->awardCategory(3))) col-4 active @endif" for="check3">
                    <span class="Checkbox">
                        <span>DRAMATURGIA</span>
                        <input type="checkbox" name="check3" id="check3" value="3" @if(old('check3') || (isset($award) && $award->awardCategory(3))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check3') || (isset($award) && $award->awardCategory(3)))) hidden @endif col-8 small-12" for="type31">
                        <div class="Register-file">
                            <span class="Register-actions">
                                <span class="Register-addFile">Añadir archivo</span>
                            </span>
                            <span class="Register-tooltip">
                        @if((session('Error') && old('type31')) || (isset($award) && $award->file(31)))
                                    @if(session('Error'))
                                        {{old('type31')}}
                                    @else
                                        {{$award->file(31)->name}}
                                    @endif
                                @else
                                    Fotos ilustrativas (.zip .rar) 5 - 10
                                @endif
                            </span>
                            <input type="file" id="type31"  types="zip,rar">
                            <input type="hidden" name="type31"
                                   @if(session('Error'))
                                   value="{{old('type31')}}"
                                   @elseif(isset($award) && $award->file(31))
                                   value="{{$award->file(31)->name}}"
                                    @endif >
                        </div>
                    </label>
                    <label for="" style="display:none"><span class="Empty"></span></label>
                      --}}
                    <!--
                    *************************************
                    ************* CHECKBOX 4 ************
                    *************************************
                    -->

                    <label class="small-12 CheckboxContainer @if(old('check4') || (isset($award) && $award->awardCategory(4))) col-4 active @endif" for="check4">
                    <span class="Checkbox">
                        <span>DISEÑO DE ESCENOGRAFÍA</span>
                        <input type="checkbox" name="check4" id="check4" value="4" @if(old('check4') || (isset($award) && $award->awardCategory(4))) checked="checked" @endif>
                    </span>
                    </label>

                    <label class="small-12 col-4 @if(!(old('check4') || (isset($award) && $award->awardCategory(4)))) hidden @endif" for="type20">
                        <div class="Register-file">
                        <span class="Register-actions">
                            @if(isset($award) && $award->file(20))
                                <a target="_blank" href="{{url('uploads/semana/' . $award->file(20)->name)}}" class="Register-openFile">Abrir</a>
                            @endif
                        </span>
                            <span class="Register-tooltip">
                            @if((session('Error') && old('type20')) || (isset($award) && $award->file(20)))
                                    @if(session('Error'))
                                        {{old('type20')}}
                                    @else
                                        {{$award->file(20)->name}}
                                    @endif
                                @else
                                    Fotografía ilustrativa - min 5, max 10 (.zip .rar)
                                @endif
                            </span>
                        </div>
                    </label>
                    <label class="col-4 small-12 @if(!(old('check4') || (isset($award) && $award->awardCategory(4)))) hidden @endif" for="type21">
                        <div class="Register-file">
                        <span class="Register-actions">
                            @if(isset($award) && $award->file(21))
                                <a target="_blank" href="{{url('uploads/semana/' . $award->file(21)->name)}}" class="Register-openFile">Abrir</a>
                            @endif
                        </span>
                            <span class="Register-tooltip">
                            @if((session('Error') && old('type21')) || (isset($award) && $award->file(21)))
                                    @if(session('Error'))
                                        {{old('type21')}}
                                    @else
                                        {{$award->file(21)->name}}
                                    @endif
                                @else
                                    Bocetos de diseños (.pdf)
                                @endif
                        </span>

                        </div>
                    </label>

                    <!--
                    *************************************
                    ************* CHECKBOX 5 ************
                    *************************************
                    -->

                    <label class="CheckboxContainer @if(old('check5') || (isset($award) && $award->awardCategory(5))) col-4 active @endif small-12" for="check5">
                    <span class="Checkbox">
                        <span>DISEÑO DE MAQUILLAJE</span>
                        <input type="checkbox" name="check5" id="check5" value="5" @if(old('check5') || (isset($award) && $award->awardCategory(5))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check5') || (isset($award) && $award->awardCategory(5)))) hidden @endif col-4 small-12" for="type22">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(22))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(22)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                                @if((session('Error') && old('type22')) || (isset($award) && $award->file(22)))
                                    @if(session('Error'))
                                        {{old('type22')}}
                                    @else
                                        {{$award->file(22)->name}}
                                    @endif
                                @else
                                    Fotografía ilustrativa - min 5, max 10 (.zip .rar)
                                @endif
                            </span>
                        </div>
                    </label>
                    <label class=" @if(!(old('check5') || (isset($award) && $award->awardCategory(5)))) hidden @endif col-4 small-12" for="type23">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(23))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(23)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                                @if((session('Error') && old('type23')) || (isset($award) && $award->file(23)))
                                    @if(session('Error'))
                                        {{old('type23')}}
                                    @else
                                        {{$award->file(23)->name}}
                                    @endif
                                @else
                                    Bocetos de diseños (.pdf)
                                @endif
                            </span>
                        </div>
                    </label>

                    <!--
                    *************************************
                    ************* CHECKBOX 6 ************
                    *************************************
                    -->

                    <label class="CheckboxContainer @if(old('check6') || (isset($award) && $award->awardCategory(6))) col-4 active @endif small-12" for="check6">
                    <span class="Checkbox">
                        <span>DISEÑO DE VESTUARIO</span>
                        <input type="checkbox" name="check6" id="check6" value="6" @if(old('check6') || (isset($award) && $award->awardCategory(6))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check6') || (isset($award) && $award->awardCategory(6)))) hidden @endif col-4  small-12" for="type24">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(24))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(24)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                                @if((session('Error') && old('type24')) || (isset($award) && $award->file(24)))
                                    @if(session('Error'))
                                        {{old('type24')}}
                                    @else
                                        {{$award->file(24)->name}}
                                    @endif
                                @else
                                    Fotografía ilustrativa - min 5, max 10 (.zip .rar)
                                @endif
                            </span>

                        </div>
                    </label>
                    <label class=" @if(!(old('check6') || (isset($award) && $award->awardCategory(6)))) hidden @endif col-4 small-12" for="type25">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(25))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(25)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>

                            <span class="Register-tooltip">
                                @if((session('Error') && old('type25')) || (isset($award) && $award->file(25)))
                                    @if(session('Error'))
                                        {{old('type25')}}
                                    @else
                                        {{$award->file(25)->name}}
                                    @endif
                                @else
                                    Bocetos de diseños (.pdf)
                                @endif
                            </span>
                        </div>
                    </label>

                    <!--
                    *************************************
                    ************* CHECKBOX 7 ************
                    *************************************
                    -->

                    <label class="CheckboxContainer @if(old('check7') || (isset($award) && (isset($award) && $award->awardCategory(7)))) col-4 active @endif small-12" for="check7">
                    <span class="Checkbox">
                        <span>DISEÑO DE ILUMINACIÓN</span>
                        <input type="checkbox" name="check7" id="check7" value="7" @if(old('check7') || (isset($award) && $award->awardCategory(7))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check7') || (isset($award) && $award->awardCategory(7)))) hidden @endif col-4  small-12" for="type26">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(26))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(26)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                                @if((session('Error') && old('type26')) || (isset($award) && $award->file(26)))
                                    @if(session('Error'))
                                        {{old('type26')}}
                                    @else
                                        {{$award->file(26)->name}}
                                    @endif
                                @else
                                    Fotografía ilustrativa - min 5, max 10 (.zip .rar)
                                @endif
                            </span>

                        </div>
                    </label>
                    <label class=" @if(!(old('check7') || (isset($award) && $award->awardCategory(7)))) hidden @endif col-4 small-12" for="type27">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(27))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(27)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                                @if((session('Error') && old('type27')) || (isset($award) && $award->file(27)))
                                    @if(session('Error'))
                                        {{old('type27')}}
                                    @else
                                        {{$award->file(27)->name}}
                                    @endif
                                @else
                                    Plano de luces (.pdf)
                                @endif
                            </span>
                        </div>
                    </label>

                    <!--
                    *************************************
                    ************* CHECKBOX 8 ************
                    *************************************
                    -->

                    <label class="CheckboxContainer @if(old('check8') || (isset($award) && $award->awardCategory(8))) col-4 active @endif small-12" for="check8">
                    <span class="Checkbox">
                        <span>DISEÑO DE SONIDO</span>
                        <input type="checkbox" name="check8" id="check8" value="8" @if(old('check8') || (isset($award) && $award->awardCategory(8))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class="col-8 small-12 @if(!(old('check8') || (isset($award) && $award->awardCategory(8)))) hidden @endif " for="cat_sound">
                        <input placeholder="Vinculo audio (Banda sonora espectáculo)" type="text" name="cat_sound" id="cat_sound"
                               @if(session('Error'))
                               value="{{old('cat_sound')}}"
                               @elseif(isset($award))
                               value="{{$award->sound}}"
                                @endif >

                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('cat_sound')}}</span>
                        @endif
                    </label>
                    <label for="" style="display:none"><span class="Empty"></span></label>

                    <!--
                    *************************************
                    ************* CHECKBOX 9 ************
                    *************************************
                    -->

                    <label class="CheckboxContainer @if(old('check9') || (isset($award) && $award->awardCategory(9))) col-4 active @endif small-12" for="check9">
                    <span class="Checkbox">
                        <span>ACTOR</span>
                        <input type="checkbox" name="check9" id="check9" value="9" @if(old('check9') || (isset($award) && $award->awardCategory(9))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check9') || (isset($award) && $award->awardCategory(9)))) hidden @endif col-8 small-12" for="type32">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(32))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(32)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                        @if((session('Error') && old('type32')) || (isset($award) && $award->file(32)))
                                    @if(session('Error'))
                                        {{old('type32')}}
                                    @else
                                        {{$award->file(32)->name}}
                                    @endif
                                @else
                                    Fotos ilustrativas (.zip .rar) 5 - 10
                                @endif
                            </span>
                        </div>
                    </label>
                    <label for="" style="display:none"><span class="Empty"></span></label>

                    <!--
                    *************************************
                    ************* CHECKBOX 10 ***********
                    *************************************
                    -->

                    <label class="CheckboxContainer @if(old('check10') || (isset($award) && $award->awardCategory(10))) col-4 active @endif small-12" for="check10">
                    <span class="Checkbox">
                        <span>ACTRÍZ</span>
                        <input type="checkbox" name="check10" id="check10" value="10" @if(old('check10') || (isset($award) && $award->awardCategory(10))) checked="checked" @endif>
                    </span>
                    </label>
                    <label class=" @if(!(old('check10') || (isset($award) && $award->awardCategory(10)))) hidden @endif col-8 small-12" for="type33">
                        <div class="Register-file">
                            <span class="Register-actions">
                                @if(isset($award) && $award->file(33))
                                    <a target="_blank" href="{{url('uploads/semana/' . $award->file(33)->name)}}" class="Register-openFile">Abrir</a>
                                @endif
                            </span>
                            <span class="Register-tooltip">
                        @if((session('Error') && old('type33')) || (isset($award) && $award->file(33)))
                                    @if(session('Error'))
                                        {{old('type33')}}
                                    @else
                                        {{$award->file(33)->name}}
                                    @endif
                                @else
                                    Fotos ilustrativas (.zip .rar) 5 - 10
                                @endif
                            </span>
                        </div>
                    </label>
                    <label for="" style="display:none"><span class="Empty"></span></label>

                </section>
            </div>
        <!--<div class="center row"><button style="color:black">IR ATRÁS</button></div>-->
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

        if($('#org_region').val()){
            var city = $('#org_city');
            var data = city.find("[data-region='" + $('#org_region').val() + "']");
            city.children('option').addClass('hidden').eq(0).removeClass('hidden');
            data.removeClass('hidden');
        }

        $('#org_region').on('change', function(){
            var city = $('#org_city');
            var data = city.find("[data-region='" + $(this).val() + "']");
            city.children('option').addClass('hidden').eq(0).removeClass('hidden').prop('selected', true);
            data.removeClass('hidden');
        });

        $('#sector').select2({
            closeOnSelect: false
        });
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection