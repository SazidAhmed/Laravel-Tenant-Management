<?php 
namespace App\Traits;

trait permissionTrait{

    public function hasPermission(){

         //Role Permissions

         if(!isset(auth()->user()->role->permissions['role']['can-add']) && \Route::is('roles.store')){
            return abort(401);
        }

        if(!isset(auth()->user()->role->permissions['role']['can-view']) && \Route::is('roles.index')){
            return abort(401);
        }

        if(!isset(auth()->user()->role->permissions['role']['can-edit']) && \Route::is('roles.update')){
            return abort(401);
        }

        if(!isset(auth()->user()->role->permissions['role']['can-delete']) && \Route::is('roles.destroy')){
            return abort(401);
        }

        //Users

        if(!isset(auth()->user()->role->permissions['user']['can-add']) && \Route::is('users.store')){
            return abort(401);
        }

        if(!isset(auth()->user()->role->permissions['user']['can-view']) && \Route::is('list-user')){
            return abort(401);
        }

        if(!isset(auth()->user()->role->permissions['user']['can-edit']) && \Route::is('users.update')){
            return abort(401);
        }

        if(!isset(auth()->user()->role->permissions['user']['can-delete']) && \Route::is('users.destroy')){
            return abort(401);
        }
    }
}
?>