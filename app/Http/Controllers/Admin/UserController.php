<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR USER
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH USER
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.users.create');
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN USER BARU
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username',
            ],

            'role' => [
                'required',
                'in:siswa,operator,admin',
            ],

            'status' => [
                'required',
                'in:aktif,nonaktif',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

        ]);


        User::create([

            'name' => $validated['name'],

            'username' => $validated['username'],

            'role' => $validated['role'],

            'status' => $validated['status'],

            'password' => Hash::make(
                $validated['password']
            ),

        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL USER
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        return view(
            'admin.users.show',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM EDIT USER
    |--------------------------------------------------------------------------
    */

    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE USER
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        User $user
    ) {

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username,' . $user->id,
            ],

            'role' => [
                'required',
                'in:siswa,operator,admin',
            ],

            'status' => [
                'required',
                'in:aktif,nonaktif',
            ],

        ]);


        $user->update([

            'name' => $validated['name'],

            'username' => $validated['username'],

            'role' => $validated['role'],

            'status' => $validated['status'],

        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Data user berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS USER
    |--------------------------------------------------------------------------
    */

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User berhasil dihapus.'
            );
    }
}
