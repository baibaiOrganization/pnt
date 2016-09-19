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
        <th colspan="2" style="vertical-align: middle ;height: 40px; text-align: center">DATOS BÁSICOS DEL ESPECTÁCULO</th>
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

        <th>ESPECTÁCULO</th>
        <th>GÉNERO</th>

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
    @foreach($organizations as $organization)
        <?php $award = $organization->awardSemana()?>
        <tr>
            <td>{{$organization->name}}</td>
            <td>{{$organization->email}}</td>
            <td>{{$organization->city}}</td>
            <td>{{$organization->address}}</td>
            <td>{{$organization->phone}}</td>
            <td>{{$organization->mobile}}</td>
            <td>{{$organization->website}}</td>

            <td>{{$award->production->name}}</td>
            <td>{{$award->production->genre}}</td>

            <td>{{$organization->propietor->name}}</td>
            <td>{{$organization->propietor->last_name}}</td>
            @if($organization->propietor->document_type == 1)
            <td>Cédula</td>
            @elseif($organization->propietor->document_type == 2)
            <td>Cédula de extranjería</td>
            @else
            <td>Pasaporte</td>
            @endif
            <td>{{$organization->propietor->document_number}}</td>
            <td>{{$organization->propietor->mobile}}</td>
            <td>{{$organization->propietor->email1}}</td>
            <td>{{$organization->propietor->email2}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>