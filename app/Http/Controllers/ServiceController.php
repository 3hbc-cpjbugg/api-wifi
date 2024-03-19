<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ServiceController extends BaseController
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
        $query = QueryBuilder::for(Service::class)
            ->defaultSort('id')
            ->allowedFilters([
                ...config('api.service.fields'),
                AllowedFilter::scope('search')
            ])
            ->allowedSorts(config('api.service.sorts'))
            ->allowedFields(config('api.service.fields'))
            ->allowedIncludes(config('api.service.includes'));
        $affiliates = $paginate
            ? $query->paginate($perPage)->appends($request->query())
            : $query->get();

        return response()->json($affiliates);
    }


    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();
        $service = new Service();
        $service->fill($validated);
        $service->save();

        return $this->sendResponse($service, 'Servicio creado correctamente', 201);
    }



    public function show(Request $request, Service $service)
    {
        if ($request->filled('include')) {
            $relations = explode(',', $request->input('include', ''));
            $service->load($relations);
        }

        return response()->json($service);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {

        $validated = $request->validated();
        $service->fill($validated);
        $service->save();
        return $this->sendResponse($service, 'Servicio actualizado correctamente', 201);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return $this->sendResponse(null, 'Servicio eliminado correctamente', 204);
    }


}
