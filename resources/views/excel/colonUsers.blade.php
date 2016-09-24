<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>
<body>

<table>
    <thead>
    <tr>
        <th colspan="7" style="vertical-align: middle ;height: 40px; text-align: center">DATOS BÁSICOS DE LA ORGANIZACIÓN</th>
        <th colspan="4" style="vertical-align: middle ;height: 40px; text-align: center">DATOS DE LA PRODUCCIÓN ARTÍSTICA</th>
        <th colspan="7" style="vertical-align: middle ;height: 40px; text-align: center">DATOS REPRESENTANTE LEGAL</th>
    </tr>
    <tr style="height: 20px; text-align: center">
        <th>ORGANIZACIÓN</th>
        <th>EMAIL</th>
        <th>CIUDAD</th>
        <th>DIRECCIÓN</th>
        <th>TELÉFONO</th>
        <th>CELULAR</th>
        <th>WEB</th>

        <th>PRODUCCIÓN</th>
        <th>FECHA DE ESTRENO</th>
        <th>GÉNERO</th>
        <th>LINK VIDEO</th>

        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>TIPO DE DOCUMENTO</th>
        <th>NÚMERO DE DOCUMENTO</th>
        <th>CELULAR</th>
        <th>EMAIL 1</th>
        <th>EMAIL 2</th>
    </tr>
    </thead>
    <tbody>
    @foreach($awards as $award)
        <tr>
            <td>{{$award->organization->name}}</td>
            <td>{{$award->organization->email}}</td>
            <td>{{$award->organization->city}}</td>
            <td>{{$award->organization->address}}</td>
            <td>{{$award->organization->phone}}</td>
            <td>{{$award->organization->mobile}}</td>
            <td>{{$award->organization->website}}</td>

            <td>{{$award->production->name}}</td>
            <td>{{$award->production->release_date}}</td>
            <td>{{$award->production->genre}}</td>
            <td>{{$award->production->link_video}}</td>

            <td>{{$award->propietor->name}}</td>
            <td>{{$award->propietor->last_name}}</td>
            @if($award->propietor->document_type == 1)
            <td>Cédula</td>
            @elseif($award->propietor->document_type == 2)
            <td>Cédula de extranjería</td>
            @else
            <td>Pasaporte</td>
            @endif
            <td>{{$award->propietor->document_number}}</td>
            <td>{{$award->propietor->mobile}}</td>
            <td>{{$award->propietor->email1}}</td>
            <td>{{$award->propietor->email2}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>