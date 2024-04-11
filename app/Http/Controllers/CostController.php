<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\StoreCostRequest;
use App\Http\Requests\UpdateCostRequest;
use App\Models\Cost;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CostController extends BaseController
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


        $query = QueryBuilder::for(Cost::class)
            ->defaultSort('id')
            ->allowedFilters([
                ...config('api.cost.fields'),
                AllowedFilter::scope('search')
            ])
            ->allowedSorts(config('api.cost.sorts'))
            ->allowedFields(config('api.cost.fields'))
            ->allowedIncludes(config('api.cost.includes'));

            $costs = $paginate
            ? $query->paginate($perPage)->appends($request->query())
            : $query->get();

        return response()->json($costs);

    }


    public function store(StoreCostRequest $request)
    {
        $validated = $request->validated();
        $cost = new Cost();
        $cost->fill($validated);
        $cost->save();

        return $this->sendResponse($cost, 'Costo creado correctamente', 201);
    }



    public function show(Request $request, Cost $cost)
    {
        if ($request->filled('include')) {
            $relations = explode(',', $request->input('include', ''));
            $cost->load($relations);
        }

        return response()->json($cost);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateCostRequest $request, Cost $cost)
    {

        $validated = $request->validated();
        $cost->fill($validated);
        $cost->save();
        return $this->sendResponse($cost, 'Costo actualizado correctamente', 201);
    }

    public function destroy(Cost $cost)
    {
        $cost->delete();
        return $this->sendResponse(null, 'Costo eliminado correctamente', 204);
    }

    public function getAllCosts(){

        $costs = Cost::all();
        return response()->json($costs);
    }

}
