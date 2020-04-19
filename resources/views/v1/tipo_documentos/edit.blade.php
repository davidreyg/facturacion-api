@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('v1.tipoDocumentos.index') !!}">Tipo Documento</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Tipo Documento</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($tipoDocumento, ['route' => ['v1.tipoDocumentos.update', $tipoDocumento->id], 'method' => 'patch']) !!}

                              @include('v1.tipo_documentos.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection