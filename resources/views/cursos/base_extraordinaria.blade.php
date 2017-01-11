<div>
    <img src="{{$curso->media}}" alt="" width="500px" height="300px">
    <h3>{{$curso->nombre}}</h3>
    <h4>DESCRIPCIÓN: {{$curso->descripcion}}</h4>
    <p>Duración: {{$curso->duracion}}</p>
    <p>Lenguaje: {{$curso->lenguaje}}</p>
    <p>Nivel: {{$curso->nivel}}</p>
    <br>
    <h4>Ventajas de tomar este curso</h4>
    <ul>
        @foreach($ventajas as $ventaja)
            <li>{{$ventaja->ventaja}}</li>
        @endforeach
    </ul>
    <h3>Temario / Contenido del curso</h5>
    <ul>
        @foreach($temario as $tema)
            <li>{{$tema->tema}}</li>
        @endforeach
    </ul>
    
</div>