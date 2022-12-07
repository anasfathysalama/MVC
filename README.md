### PHP MVC Framework From Scratch

---

Using PHP To Build Full Web Application By Applying MVC Structure.
inside the `core` directory you will find the core classes for the project like `` Application.php | Request.php | Router.php ``.
#### Routing

You will find routes in ``routes/web.php `` in the root , currently support `` GET | POST `` Https request methods,
can pass controllers and methods as an action in the second array parameter of ``get`` or  ``post`` methods

```
$app->route->get('/register', [RegisterController::class, 'index']);
$app->route->post('/register', [RegisterController::class, 'store']);
```

also can pass it as a closure function

```
$app->route->get('/', function (){
    echo View::make('home');
});
```

------------
#### Controllers

Controllers define in the `app\Controllers` directory, inside it, you can define any method you want.

```
public function index()
{
    echo View::make('auth/register');
}
```

---
#### Requests

`` Request `` class exist in the `core` directory, it contains some methods which used to handle the coming request to our application.

- ``getPath()`` return the url without any query strings.
- ``getMethod()`` return request http method.
- ``all()`` return array of all request body parameters with values.
- ``get($key , $default)`` return value for specific parameter and can pass default value.
- ``filled($key)`` check if parameter exist and it`s value not empty .

you can inject request to any controller method to get request parameters.

``` 
public function store(Request $request)
{
  dump($request->all());

}
```
---
#### Validation

validation exist in the `app\Validation` directory, can define any rule inside `Rules` directory
and insure your rule extend abstract class inside `Rule\Contracts\Rule.php` and then you need to map your rule class inside  
`` $this->ruleMap `` array in the constructor of `RuleMapper.php` class to can pass your validation rule  as a string.

**To apply validation in any request** 

**first** define instance of Validation.php class and pass your rules as an array to it`s constructor

```  
 $validation = new Validation([
      'first_name' => ['required', 'between:3,6'],
 ]);
```
also can pass instance of  Rules  

```  
 $validation = new Validation([
      'first_name' => [new RequiredRule, new BetweenRule(3,6)],
 ]);
```

**second** pass your data to `` validate() `` method.
```
 $validation->validate([
      'first_name' => $request->get('first_name'),
  ]);
```

to check if the validation success and pass you will need to use ``pass()`` method,
and to get errors in the case of validation failure use ``errors()`` method it will return array of validation message for each 
parameter, and it's coming fromm `ErrorBag.php` class


---
#### Views

Create views in `views` directory in the root directory and pass it`s pass to ``View::make('home')`` you will need
to ``echo`` view to render it.


