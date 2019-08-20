<?php
namespace App\Controllers;

use App\Model\User;

class UsersController
{
    public function all()
    {
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }

    public function store()
    {
        User::create([
            'name' => request('name')
        ]);

        redirect('/users/all');
    }

    public function edit()
    {
        $user = User::find(request('id'));
        return view('users/edit', ['user' => $user]);
    }

    public function update()
    {
        User::update(request('id'), ['name' => request('name')]);
        redirect('/users/all');
    }

    public function delete()
    {
        User::delete(request('id'));
        redirect('/users/all');
    }
}
