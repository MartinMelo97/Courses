<div>
    <img src="{{$imagenes[0]->ruta}}" alt="">
    <h3>{{$curso->nombre}}</h3>
    @for($i = 1; $i < count($imagenes); $i++)
        <img src="{{$imagenes[$i]->ruta}}" alt="" style="width:100px; height: 100px; display:inline;">
    @endfor
    <h4>DESCRIPCIÓN: {{$curso->descripcion}}</h4>   
    <br>
    <h4>Ventajas laborales de tomar este curso</h4>
    <ul>
        @foreach($ventajas as $ventaja)
            <li>{{$ventaja->ventaja}}</li>
        @endforeach
    </ul>
    <br>
    <p>Lenguaje: {{$curso->lenguaje}}</p>
    <p>Nivel: {{$curso->nivel}}</p>

    <div class="oculto">
        <p>Duración: {{$curso->duracion}}</p>
        <p>Fecha de inicio: {{$curso->fecha_inicio}}</p>
        <h3>Temario / Contenido del curso</h3>
        <ul>
            @foreach($temario as $tema)
                <li>{{$tema->tema}}</li>
            @endforeach
        </ul>
    </div>

    
</div>