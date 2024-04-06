<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;



class AdminPermission
{
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->user_name != 'System Admin'){
            if(Auth::check() && Auth::user()->role == 1){
           
                $currentRouteName = $request->route()->getName();
                $menu = Permission::where('name', $currentRouteName)->first();
    
                if(!is_null($menu)){
                    $currentRoutePermission = Permission::findById($menu->id);
                } else {
                    $menuAction =Permission::where('route', $currentRouteName)->first();
                    if($menuAction){
                        $currentRoutePermission = Permission::findById($menuAction->id);
                    } else {
                        $currentRoutePermission = NULL;
                    }
                }
    
                if (!is_null($currentRoutePermission)) {
                    if (auth()->user()->can($currentRoutePermission->name)) {
                        return $next($request);
                    } else {
                       
                        abort(403, 'Unauthorized access');
                    }
                }
    
                return $next($request);
            } else {
                return redirect()->route('admin.login.index');
            }
        }      
        return $next($request);
    }

    
}
