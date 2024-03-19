<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\UpdateConfigSiteRequest;
use App\Models\ConfigSite;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ConfigSiteController extends BaseController
{

    /**
     * Config site api
     *
     * @return \Illuminate\Http\Response
     */

     public function show(Request $request, ConfigSite $configSite)
     {
         return $this->sendResponse($configSite, 'Configuración obtenida correctamente');
     }


    public function update(UpdateConfigSiteRequest $request, $id)
    {

        $validated = $request->validated();
        $configSite = ConfigSite::find($id);
        $configSite->fill($validated);
        $configSite->save();

        return $this->sendResponse($configSite, 'Configuración actualizada correctamente', 201);
    }

    public function updatePhotoConfiguration(Request $request){

            $configSite = ConfigSite::find($request->id);
            $logo = $request->file('file');

             //Verify if It has an image created before to delete it.
             if ($configSite->logo) {

                    File::delete(public_path($configSite->logo));
            }

            $path = Storage::disk('public')->put("logos", $logo);

            $configSite->logo = "storage/$path";
            $configSite->save();
            return $this->sendResponse($configSite, 'Logo actualizado correctamente', 201);

    }
}
