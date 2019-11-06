# micro-framework

 micro-framework is a php mvc practice something like laravel.
 <br>
 You can practice with that and develop that to become better.
 <br>
 **framework branch is base framework and project branch is sample of using this.**
 <br>
 if you want to test or run this project go <a href="#running"> here </a>. 
<br><br>


## feautures:
  * <a href="#routing">Routing</a>
  * <a href="#request-handling">Request Handling</a>
  * <a href="#query-builder">Query Bulider</a>
  * <a href="#models">Models</a>
  * <a href="#views">Views</a>
  * <a href="#helpers">Helpers</a>
  * <a href="#running">running</a>
  
  
  <hr>
  
### Routing
  
you can define your routes in: 
` app/routes.php `
It supports GET and POST requests for now.
<br><br>
**for example** `$router->get('users/all', 'UsersController@all');` **is a get route.**
<br><br>
`app/core/Router.php` handles the routes and controllers

<br><br><br>

### Request Handling
All of requests handled by `app/core/Request.php`.
<br><br>
**Request class contains three methods :**
  * **uri method**: gives you current URL
  * **method method**: gives you the method of current URL
  * **get method**: gives you data of current request
  
<br>

**how can I use it?**
<br>
we can use `request($key)` <a href="#helpers"> helper function </a>. this function gets a key and returns data that assigned to key using `Request::get($key)`. <br> when we use `all` key it returns all data of request.


<br><br><br>


### Query Builder
in this project I used `PDO` for connect to database and config file is in base path. we connect to the database using `app/core/database/Connection.php` `Connection` class.
<br>
the project connect to database when `app/core/bootstrap.php` is run.
<br><br>

`app/core/database/QueryBuilder.php` contains many methods for run useful queries that you need (find, selectAll, where, insert, etc). you can access them with <a href="#models"> Models </a> and App binding like this: ` App::get('database')->find(static::$table, $id);`

<br><br><br>

### Models
for models we have a base model in `app/core/Model.php` that contains many static methods using <a href="#query-builder"> Query Builder </a>.
<br>
also you can define new model in `app/models` and use it in controllers.
<br>
new model must extends base model and you have to define your table name in `$table` static property like this:
```
<?php
namespace App\Model;

use App\Core\Model;

class User extends Model
{
    protected static $table = 'users';
}

```

<br><br><br>

### Views
your views are in `app/views` folder and every view must have `.view.php` extension.

<br><br><br>

### Helpers
the helper functions are in `app/core/functoins.php`:
  * **dd :** is a helper for dump data every where.
  * **view :** the view is a helper for loading a view using a name with your data. you can use it in controllers:
   ```
   public function index()
    {
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }
   ```

  * **redirect :** is a helper for redirect user to a route: `redirect('/home')`
  * **validateData :** is a helper for protecting input data from XSS attacks
  * **request :** is a helper for get data from <a href="#request-handling"> Request </a>


<br><br><br>

### Running
for a run this project first you have to create a database and set your config on `config.php` then run `php -S localhost:8000` in project terminal path
