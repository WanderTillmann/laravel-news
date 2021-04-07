<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;
    public static  function defaultPermissions()
    {
        return [
            array('name' => 'user-list', 'description' => 'vizualiza os usuarios'),
            array('name' => 'user-create', 'description' => 'cria os '),
            array('name' => 'user-edit', 'description' => 'edita os '),
            array('name' => 'user-delete', 'description' => 'deleta os '),
            array('name' => 'role-list', 'description' => 'vizualiza os cargos'),
            array('name' => 'role-create', 'description' => 'cria os cargos'),
            array('name' => 'role-edit', 'description' => 'edita os cargos'),
            array('name' => 'role-delete', 'description' => 'deleta os cargos'),
            array('name' => 'post-list', 'description' => 'vizualiza os posts'),
            array('name' => 'post-create', 'description' => 'cria os posts'),
            array('name' => 'post-edit', 'description' => 'edita os posts'),
            array('name' => 'post-delete', 'description' => 'deleta os posts'),
            array('name' => 'permission-list', 'description' => 'vizualiza os permicoes'),
            array('name' => 'permission-create', 'description' => 'cria os permicoes'),
            array('name' => 'permission-edit', 'description' => 'edita os permicoes'),
            array('name' => 'permission-delete', 'description' => 'deleta os permicoes'),
        ];
    }
}
