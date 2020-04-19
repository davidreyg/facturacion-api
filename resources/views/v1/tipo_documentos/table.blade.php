<div class="table-responsive-sm">
    <table class="table table-striped" id="tipoDocumentos-table">
        <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoDocumentos as $tipoDocumento)
            <tr>
                
                <td>
                    {!! Form::open(['route' => ['v1.tipoDocumentos.destroy', $tipoDocumento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('v1.tipoDocumentos.show', [$tipoDocumento->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('v1.tipoDocumentos.edit', [$tipoDocumento->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>