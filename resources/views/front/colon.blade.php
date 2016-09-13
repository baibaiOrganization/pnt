@extends('layout.front')

@section('content')

    <div class="Register-header Colon">
        <h1>FORMULARIO DE INSCRIPCIÓN PARA POSTULACIONES AL PREMIO TEATRO COlÓN</h1>
    </div>
    <form action="{{ route('register') }}" enctype="multipart/form-data" method="post"
          class=" Register-form Colon-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="group_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="group_name" id="group_name">
            </label>

            <label for="city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="city" id="city">
                        <option value="">Selecciona una ciudad</option>
                        <option value="">Bógota</option>
                        <option value="">Medellín</option>
                    </select>
                </div>
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Dirección física</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Teléfono fijo</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Teléfono Celular</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Correo principal</span>
                <input type="email" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Sitio Web</span>
                <input type="text" name="group_name" id="group_name">
            </label>


            <label class="col-12 small-10 row Colon-social" for="group_name">
                <span  class="col-12 ">Redes sociales (facebook, instagram, twitter)</span>
                <input class="col-4" type="text" name="group_name" id="group_name">
                <input  class="col-4" type="text" name="group_name" id="group_name">
                <input class="col-4"  type="text" name="group_name" id="group_name">
            </label>

        </div>
        <h2 class="col-12">DATOS DE LA PRODUCCIÓN ARTÍSTICA</h2>
        <div class=" row Register-contentLabel">

            <label class="col-10 small-10" for="group_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Fecha de estreno</span>
                <input type="date" name="group_name" id="group_name">
            </label>
            <label for="city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Género:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="city" id="city">
                        <option value="">Selecciona el género</option>
                        <option value="Teatro">Teatro</option>
                        <option value="">Circo - Teatro</option>
                        <option value="">Danza - Teatro</option>
                        <option value="">Teatro Musical</option>
                    </select>
                </div>
            </label>

            <label class="col-5 small-10" for="group_name">
                <span>Sinópsis (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Máximo 20 lineas</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Texto o libreto (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Los textos dramáticos presentados deben ser en español. Para teatro musical, incluir las respectivas partituras y autorizaciones de los autores.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Certificado de registro de Derechos de Autor</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Autorización de uso de la obra (.pdf)</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Certificación de música original en caso de tenerla</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">autorización de uso de las piezas musicales</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Dossier del espectáculo (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip"></span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Soporte de 5 presentaciones realizadas hasta el 30 de Sept</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Afiches, certificaciones, prensa, programas de mano, etc.) (.pdf)</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>

            <label class="col-5 small-10" for="group_name">
                <span>Hoja de Vida de c/u de los integrantes</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" >del equipo artístico y creativo (.pdf)</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Registro audiovisual (vínculo a video del espectáculo)</span>
                <textarea class="col-12 " name="" id="" placeholder="Grabación completa del espectáculo en buena calidad de imagen (mínimo 1280x720 ) y audio. Deberá ser en plano general y sin edición."  ></textarea>
            </label>
           
        </div>

        <h2 class="col-12">DATOS DEL REPRESENTANTE LEGAL</h2>

        <div class="row Register-contentLabel">
            <label class="col-5 small-10" for="group_name">
                <span>Nombres</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Apellidos</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label for="city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Tipo de Documento de Identidad:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="city" id="city">
                        <option value="">Selecciona Documento</option>
                        <option value="">Cédula</option>
                        <option value="">Cédula de Extranjería</option>
                    </select>
                </div>
            </label>

            <label class="col-5 small-10" for="group_name">
                <span>Número de documento</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Teléfono celular</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <div class="col-5"></div>
            <label class=" col-5 small-10" for="group_name">
                <span>Correo electrónico</span>
                <input type="email" name="group_name" id="group_name">
            </label>
            <label class=" col-5 small-10" for="group_name">
                <span>Correo electrónico 2</span>
                <input type="email" name="group_name" id="group_name">
            </label>
            <h2 class="col-12">CATEGORIA(S) DE POSTULACIÓN</h2>

        </div>

        <div class="center row"><button> ENVIAR</button></div>

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