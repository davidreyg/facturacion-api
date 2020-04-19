<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $tipoDocumento->id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $tipoDocumento->nombre }}</p>
</div>

<!-- Tabla Field -->
<div class="form-group">
    {!! Form::label('tabla', 'Tabla:') !!}
    <p>{{ $tipoDocumento->tabla }}</p>
</div>

<!-- Tamaño Field -->
<div class="form-group">
    {!! Form::label('tamaño', 'Tamaño:') !!}
    <p>{{ $tipoDocumento->tamaño }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tipoDocumento->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tipoDocumento->updated_at }}</p>
</div>

