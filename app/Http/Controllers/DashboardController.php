<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Device;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function data(Request $request)
    {
        $device = Device::get();

        $site = Site::get();

        $now =  Carbon::now();

        $wifiWithEmployee = DB::select(DB::raw("SELECT COUNT(*) AS total_usuariosint FROM (
SELECT COUNT(*) AS tot_usuarios_dif FROM survey WHERE ip IN (
SELECT ip FROM device WHERE conectado=1 AND comparte_internet_publico=0)
AND create_ts>='".$now->format('Y-m-d')."' GROUP BY client_mac) AS xx;"));

        $wifiFree = DB::select(DB::raw("SELECT COUNT(*) AS total_usuariospub FROM (
SELECT COUNT(*) AS tot_usuarios_dif FROM survey WHERE ip IN (
SELECT ip FROM device WHERE conectado=1 AND comparte_internet_publico=1)
AND create_ts>='".$now->format('Y-m-d')."' GROUP BY client_mac) AS xx;"));



        return response()->json([
            'site' => $site->count(),
            'siteMigrated' => $site->where('migrado_portalcautivo', 1)->count(),
            'apsTotal' => $device->count(),
            'apsConnected' => $device->where('conectado', 1)->count(),
            'apsDisconnected' => $device->where('conectado', 0)->count(),
            'wifiWithEmployee' => $wifiWithEmployee[0]->total_usuariosint,
            'wifiFree' => $wifiFree[0]->total_usuariospub
        ], 201);

    }
}
