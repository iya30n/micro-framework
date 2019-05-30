<?php
namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function all()
    {
        $users = App::get('database')->selectAll('users');
        return view('users', ['users' => $users]);
    }

    public function store()
    {
        $name = htmlspecialchars($_POST['name']);
        if ($name == null) {
            redirect('/');
        }
        App::get('database')->insert('users', [
            'name' => $name
        ]);

        redirect('/users/all');
    }
}
