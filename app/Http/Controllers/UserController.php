<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        if ($request->image->isValid()) {
            $image = $request->image->store('user', 'public');
            $data['image'] = $image;
        }
        $user->update($data);
        // DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()
            ->route('user.show', $id)
            ->with('message', 'Usuario atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$user = User::find($id)) {
            return redirect()->back();
        }
        $user->delete();
        return redirect()
            ->route("user.index")
            ->with('message', 'Usuario deletado com sucesso!');
    }

    /**
     * Funcao de alteracao de senha do usuário
     */
    public function updatePassword(Request $request, $user)
    {
        if (!$user = User::find($user)) {
            return redirect()->back();
        }
        if ($request->password == $request->password_confirmation) {
            $use[] = $user['password'] =  Hash::make($request->password);
            $user->update($use);
            return redirect()->back()->with('message', 'Senha alterada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Senhas não alteradas por serem diferentes');
        };
    }
}
