<?php
namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function all()
    {
        $users = App::get('database')->selectAll('users');
        return view('users/index', ['users' => $users]);
    }

    public function store()
    {
        $name = validateData($_POST['name']);
        App::get('database')->insert('users', [
            'name' => $name
        ]);

        redirect('/users/all');
    }

    public function edit()
    {
        $id = validateData($_GET['id']);
        $user = App::get('database')->find('users', $id);
        return view('users/edit', ['user' => $user]);
    }

    public function update()
    {
        $name = validateData($_POST['name']);
        $id = validateData($_POST['id']);
        App::get('database')->update('users', $id, ['name' => $name]);
        redirect('/users/all');
    }

    public function delete()
    {
        $id = validateData($_GET['id']);
        App::get('database')->delete('users', $id);
        redirect('/users/all');
    }
}
