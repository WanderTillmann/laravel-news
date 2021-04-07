<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission as Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRoleRequest $request)
    {
        $role  = Role::create($request->all());
        $role->syncPermissions($request->input('permission'));
        if ($role) {
            return redirect()->route('role.index')->with('message', "Role cadastrado com sucesso");
        } else {
            return redirect()->back()->with('error', 'Atribuicao nao cadastrada, verifique os campos')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Role::find($role->id);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = Role::find($role->id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRoleRequest $request, Role $role)
    {
        // $role = Role::find($role->id);
        $role->guard_name = "web";
        $role->update($request->all());
        $role->syncPermissions($request->input('permission'));
        if ($role) {
            return redirect()->route('role.index')->with('message', "Role cadastrado com sucesso");
        } else {
            return redirect()->back()->with('error', 'Atribuicao nao cadastrada, verifique os campos')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role = Role::find($role->id);
        $role->delete();
        if ($role) {
            return redirect()->route('role.index')->with('message', "Role deletado com sucesso");
        } else {
            return redirect()->back()->with('error', 'Atribuicao nao deletado, verifique os campos')->withInput();
        }
    }

    /**
     * Funcao que realiza a busca por atribuicoes
     */
    public function search(Request $request)
    {
        $filters = $request->except('_toker');
        $roles = Role::where('name', '=', $request->search)
            ->orWhere('description', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('news.index', compact('roles', 'filters'));
    }
}
