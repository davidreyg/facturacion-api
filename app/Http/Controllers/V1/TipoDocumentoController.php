<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\CreateTipoDocumentoRequest;
use App\Http\Requests\V1\UpdateTipoDocumentoRequest;
use App\Repositories\V1\TipoDocumentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoDocumentoController extends AppBaseController
{
    /** @var  TipoDocumentoRepository */
    private $tipoDocumentoRepository;

    public function __construct(TipoDocumentoRepository $tipoDocumentoRepo)
    {
        $this->tipoDocumentoRepository = $tipoDocumentoRepo;
    }

    /**
     * Display a listing of the TipoDocumento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoDocumentos = $this->tipoDocumentoRepository->paginate(10);

        return view('v1.tipo_documentos.index')
            ->with('tipoDocumentos', $tipoDocumentos);
    }

    /**
     * Show the form for creating a new TipoDocumento.
     *
     * @return Response
     */
    public function create()
    {
        return view('v1.tipo_documentos.create');
    }

    /**
     * Store a newly created TipoDocumento in storage.
     *
     * @param CreateTipoDocumentoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDocumentoRequest $request)
    {
        $input = $request->all();

        $tipoDocumento = $this->tipoDocumentoRepository->create($input);

        Flash::success('Tipo Documento saved successfully.');

        return redirect(route('v1.tipoDocumentos.index'));
    }

    /**
     * Display the specified TipoDocumento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error('Tipo Documento not found');

            return redirect(route('v1.tipoDocumentos.index'));
        }

        return view('v1.tipo_documentos.show')->with('tipoDocumento', $tipoDocumento);
    }

    /**
     * Show the form for editing the specified TipoDocumento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error('Tipo Documento not found');

            return redirect(route('v1.tipoDocumentos.index'));
        }

        return view('v1.tipo_documentos.edit')->with('tipoDocumento', $tipoDocumento);
    }

    /**
     * Update the specified TipoDocumento in storage.
     *
     * @param int $id
     * @param UpdateTipoDocumentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDocumentoRequest $request)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error('Tipo Documento not found');

            return redirect(route('v1.tipoDocumentos.index'));
        }

        $tipoDocumento = $this->tipoDocumentoRepository->update($request->all(), $id);

        Flash::success('Tipo Documento updated successfully.');

        return redirect(route('v1.tipoDocumentos.index'));
    }

    /**
     * Remove the specified TipoDocumento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error('Tipo Documento not found');

            return redirect(route('v1.tipoDocumentos.index'));
        }

        $this->tipoDocumentoRepository->delete($id);

        Flash::success('Tipo Documento deleted successfully.');

        return redirect(route('v1.tipoDocumentos.index'));
    }
}
