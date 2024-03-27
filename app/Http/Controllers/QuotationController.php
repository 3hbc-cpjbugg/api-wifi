<?php

namespace App\Http\Controllers;

use App\Actions\QuotationResourceAction;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\StoreQuotationRequest;
use App\Http\Resources\QuotationResource;
use App\Models\Quotation;
use App\Models\QuotationCost;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class QuotationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $paginate = $request->input('paginate', 'true') === 'true';
        $perPage = $request->input('per_page', config('pagination.per_page'));


        $query = QueryBuilder::for(Quotation::class)
            ->defaultSort('id')
            ->allowedFilters([
                ...config('api.quotation.fields'),
                AllowedFilter::scope('search')
            ])
            ->allowedSorts(config('api.quotation.sorts'))
            ->allowedFields(config('api.quotation.fields'))
            ->allowedIncludes(config('api.quotation.includes'));


        $quotations = $paginate
            ? $query->paginate($perPage)->appends($request->query())
            : $query->get();

        return response()->json($quotations);
    }


    public function store(StoreQuotationRequest $request)
    {
        $validated = $request->validated();

        $quotationAction = new QuotationResourceAction($validated);
        $quotationAction = $quotationAction->store();
        return response()->json($quotationAction);
    }



    public function show(Request $request, Quotation $quotation)
    {
        if ($request->filled('include')) {
            $relations = explode(',', $request->input('include', ''));
            $quotation->load($relations);
        }

        return response()->json($quotation);
    }

    public function edit($id)
    {
        //
    }



    public function destroy(Quotation $quotation)
    {
        QuotationCost::where('quotation_id', $quotation->id)->delete();
        $quotation->delete();

        return $this->sendResponse(null, 'Cotización eliminada correctamente', 204);
    }

    public function generatePdfQuotation($id){


        $quotation = Quotation::with('quotations_costs')->find($id);

        $pdf = \PDF::loadView('pdf_quotation.pdf_quotation',compact('quotation'));
        return $pdf->download('cotizacion.pdf');
    }
}
