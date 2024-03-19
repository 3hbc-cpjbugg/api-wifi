<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Actions\UserResourceAction;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
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

        $query = QueryBuilder::for(User::class)
            ->defaultSort('id')
            ->allowedFilters([
                AllowedFilter::scope('search')
            ])
            ->allowedSorts(config('api.users.sorts'))
            ->allowedFields(config('api.users.fields'))
            ->allowedIncludes(config('api.users.includes'));

        $users = $paginate
            ? $query->paginate($perPage)->appends($request->query())
            : $query->get();


        //Bug #1 el data no viene correctamente

        return response()->json($users);
    
                
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $validated = $request->validated();
        $user = new UserResourceAction($validated);
        $user = $user->store();


        return $this->sendResponse(new UserResource($user), 'Usuario guardado correctamente', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        if ($request->filled('include')) {
            $relations = explode(',', $request->input('include', ''));
            $user->load($relations);
        }

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->fill($validated);       
        $user->save();

        $user->roles()->detach(); 
        $user->assignRole($request->roles);
        return $this->sendResponse($user, 'Usuario actualizado correctamente', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->sendResponse(null, 'Row deleted successfully.', 204);
    }
}
