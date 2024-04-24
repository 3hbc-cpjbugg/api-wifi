<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\UpdateSiteRequest;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Cp;

class SiteController extends BaseController
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
        $query = QueryBuilder::for(Site::class)
            ->defaultSort('id')
            ->allowedFilters([
                AllowedFilter::scope('search'),
                AllowedFilter::exact('migrado_portalcautivo'),
            ])
            ->allowedSorts(config('api.site.sorts'))
            ->allowedFields(config('api.site.fields'))
            ->allowedIncludes(config('api.site.includes'));
        $rows = $paginate
            ? $query->paginate($perPage)->appends($request->query())
            : $query->get();

        return response()->json($rows);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteRequest $request)
    {
        $model = (new Site())->fill($request->validated())->save();
        return response()->json($model, 201);
    }


    public function show(Request $request, $clave_sitio)
     {
        $site = Site::where('clave_sitio', $clave_sitio)->first();
        
        return $this->sendResponse($site, 'Configuración obtenida correctamente');
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteRequest  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        $model = $site->update($request->validated());
        return response()->json($model, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return response()->json('', 200);
    }

    public function cp(Request $request){

        $query = Cp::where('d_codigo', 'LIKE', "%{$request->input('cp')}%")
            ->limit(100)
            ->get();

        return response()->json($query, 200);
    }
}
