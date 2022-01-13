<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inputPermission(Request $request, $id)
    {
        //
        // dd($request->all());
        $role = Role::find($id);
        $role->syncPermissions($request->permission);

        return redirect('/admin/karyawan')->with('berhasil', 'Anda telah mengubah permission!!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePermission($id)
    {
        //
        $remappedPermission = [];
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $explodePermissions = \explode('-', $permission->name);
            $slicePermissions = array_slice($explodePermissions, 1);
            $implodePermissions = \implode('-', $slicePermissions);
            $remappedPermission[$implodePermissions][] = ['name' => $permission->name, 'label' => $permission->label];
        }

        $data = [
            'role' => Role::findOrFail($id[0]),
            'permissions' => $remappedPermission,
            'action' => '/admin/karyawan/' . $id . '/input-change-permissions'
        ];
        return view('masterdata.change', $data);
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

        Role::create([
            'name' => $request->role,
            'guard_name' => 'web'
        ]);

        return redirect('/admin/karyawan')->with('berhasil', 'Anda telah berhasil menambah role!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Role::find($id);

        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // dd($request->all());
        Role::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect()->back()->with('berhasil', 'Anda telah berhasil mengubah data!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Role::where('id', $id)->delete();

        return redirect()->back()->with('berhasil', 'Data Role telah anda hapus!!');
    }
}
