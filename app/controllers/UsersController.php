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
        $name = htmlspecialchars(trim($_POST['name']));
        if ($name == null) {
            redirect('/');
        }
        App::get('database')->insert('users', [
            'name' => $name
        ]);

        redirect('/users/all');
    }

    public function edit()
    {
        $id = htmlspecialchars(trim($_GET['id']));
        if ($id == null) {
            dd('id can not be null');
        }
        $user = App::get('database')->find('users', $id);
        return view('users/edit', ['user' => $user]);
    }

    public function update()
    {
        $name = htmlspecialchars(trim($_POST['name']));
        $id = htmlspecialchars(trim($_POST['id']));
        if ($name == null || $id == null) {
            redirect('/');
        }
        App::get('database')->update('users', $id, ['name' => $name]);
        redirect('/users/all');
    }

    public function delete()
    {
        $id = htmlspecialchars(trim($_GET['id']));
        if ($id == null) {
            dd('id can not be null');
        }
        App::get('database')->delete('users', $id);
        redirect('/users/all');
    }
}
