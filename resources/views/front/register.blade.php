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
            <label class="col-10 small-10" for="group_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Logo, foto o imagen identificativa</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">(.jpg, .jpeg, .png)</span>
                    <input type="file" name="group_name" id="group_name">
                </div>

            </label>
            <label class="col-5  small-10" for="group_name">
                <span>Cámara de comercio (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Solo para grupos constituídos</span>
                    <input type="file" name="group_name" id="group_name">
                </div>

            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Dossier del grupo o compañía (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Trayectoria de la compañía, reseña de su director, integrantes y repertorio</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
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

            <label class="col-10 small-10" for="group_name">
                <span>Hoja de vida de la agrupación, grupo constituido o de los integrantes de la unión temporal (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Mínimo 3 años de experiencia verificable.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
        </div>
        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">

            <label class="col-10 small-10" for="group_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="group_name" id="group_name">
            </label>
            <label class="col-5 small-10" for="group_name">
                <span>Reseña Corta en Español (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">400 caracteres máx</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
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

            <label class="col-10 small-10" for="group_name">
                <span>Certificado de Registro de derechos de Autor o Autorización de uso de la obra (pdf.)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Si la obra contiene piezas musicales deben ser originales para la producción.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>

            <h3 class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>
            <p> La obra producto del premio deberá tener una duración mínima de cuarenta y cinco (45) minutos. </p>
            <label class="col-10 small-10" for="group_name">
                <span>Sinópsis (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Máximo 20 lineas</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Texto o libreto (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Los textos dramáticos presentados deben ser en español. Para teatro musical, incluir las respectivas partituras y autorizaciones de los autores.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Propuesta de dirección (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Puesta en escena, metodología de trabajo y proceso de creación. 2 pag. Máx.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Propuesta Estética (.pdf) <em>Enlace a condiciones y equipamiento técnico del Teatro Colón</em></span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" style="font-size: 11px">Bocetos de escenografía, maquillaje, utilería, vestuario, iluminación, material sonoro o musical, requerimientos de tramoya, iluminación, recursos técnicos</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Cronograma (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip">Fases de desarrollo de la propuesta, los tiempos estimados para cada una de ellas y sus responsables.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Presupuesto (.pdf) <em>Honorarios, servicios a contratar y actividades a realizar.</em></span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" style="font-size: 10px">Para montajes de compañías o uniones que vivan por fuera de Bogotá, incluir los costos de estadía, transporte y viáticos necesarios para montaje de la obra en el Teatro Colón</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>

            <label class="col-10 small-10" for="group_name">
                <span>Propuesta de Financiación (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" >Si el valor total excede el monto de la cofinanciación explique las otras fuentes de financiación.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Hoja de Vida de c/u de los integrantes (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" >Actores, diseñadores, escenógrafos, etc.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
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
                <span>Correo institucional</span>
                <input type="email" name="group_name" id="group_name">
            </label>
            <label class=" col-5 small-10" for="group_name">
                <span>Correo personal</span>
                <input type="email" name="group_name" id="group_name">
            </label>
            <h3 class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>
            <label class="col-10 small-10" for="group_name">
                <span>Documento de delegación de representación (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" >Firmado por todos los miembros de la unión temporal, en el que delegan su representación a un integrante del grupo.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Carta de Compromiso</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <span class="Register-tooltip" >Aceptación de las reglas del contrato de coproducción con El Teatro Colón.</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
            <label class="col-10 small-10" for="group_name">
                <span>Fotocopia de la Cédula Representante Legal (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-addFile">Añadir archivo</span>
                    <input type="file" name="group_name" id="group_name">
                </div>
            </label>
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