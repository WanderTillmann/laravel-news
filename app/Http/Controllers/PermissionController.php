<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission as Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:permission-list', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        if ($permission) {
            return redirect()->route('permission.index')->with('message', 'Permissao criada com sucesso')->withInput();
        } else {
            return redirect()->back()->with('error', 'Erro ao criar a permissao!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $permission = Permission::find($permission);
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission = Permission::find($permission->id);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermissionRequest $request, Permission $permission)
    {
        $permission = Permission::find($permission->id);
        // $permission->name = $request->input('name');
        // $permission->save();
        $permission->update($request->all());

        if ($permission) {
            return redirect()->route('permission.index')->with('message', 'Permission Atualizada com sucesso')->withInput();
        } else {
            return redirect()->back()->with('error', 'Permission nao foi atualizada, verifique os campos!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission = Permission::find($permission->id);
        $permission->delete();
        if ($permission) {
            return redirect()->back()->with('message', 'Permission Atualizada com sucesso')->withInput();
        } else {
            return redirect()->route('permission.index')->with('error', 'Permission nao foi atualizada, verifique os campos!');
        }
    }
    /**
     * Funcao que realiza a busca por permissoes
     */
    public function search(Request $request)
    {
        $filters = $request->except('_toker');
        $permissions = Permission::where('name', '=', $request->search)
            ->orWhere('description', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('news.index', compact('permissions', 'filters'));
    }
}
