<?php
namespace App\Controllers;

use App\Model\User;

class UsersController
{
    public function all()
    {
        $users = User::all('users');
        return view('users/index', ['users' => $users]);
    }

    public function store()
    {
        $name = validateData($_POST['name']);
        User::create([
            'name' => $name
        ]);

        redirect('/users/all');
    }

    public function edit()
    {
        $id = validateData($_GET['id']);
        $user = User::find($id);
        return view('users/edit', ['user' => $user]);
    }

    public function update()
    {
        $name = validateData($_POST['name']);
        $id = validateData($_POST['id']);
        User::update($id, ['name' => $name]);
        redirect('/users/all');
    }

    public function delete()
    {
        $id = validateData($_GET['id']);
        User::delete($id);
        redirect('/users/all');
    }
}
