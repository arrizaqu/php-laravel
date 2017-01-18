#LARAVEL PHP FRAMEWORK 5.X  
##Discussion
	* Server Requirements
	* Installation 
	* Application Key
	* Local Development Server
	* Hallo World 
	* Routing
	* Router Methods
	* Route Parameters
	* Multiple HTTP verbs
	* CSRF Protection
	* Form Method Spoofing
	* Response 
	* Laravel Redirect
	* Laravel View
	* Laravel Controller
	* Blade View
	* CRUD
	* use plugin database library.
	

##Server Requirements
	- PHP >= 5.6.4
	- OpenSSL PHP Extension
	- PDO PHP Extension
	- Mbstring PHP Extension
	- Tokenizer PHP Extension
	- XML PHP Extension
##Installation 
	1. File Master Download
		- Link Download : https://github.com/laravel/laravel
	2. Composer 
		- Composer Installerxz
			* open command Line : 
				-> composer global require "laravel/installer"
			* and next instruction : 
				-> laravel new blog
		- Composer Create-Project 
			* instruction : 
				- composer create-project --prefer-dist laravel/laravel blog
## Application Key
	Typically, this string should be 32 characters long. The key can be set in the .env environment file. 
	If you have not renamed the .env.example file to .env, you should do that now. 
	If the application key is not set, your user sessions and other encrypted data will not be secure!
	* instruction : -> php artisan key:generate
				
##Local Development Server
	If you have PHP installed locally and you would like to use PHP's built-in development server 
	to serve your application, you may use the serve Artisan command. 
	This command will start a development server
	* instruction : 
		-> php artisan serve

## Hallo World 
	* create laravel controller 
			- base URL file : -> \app\Http\Controllers\Customer.php
			- PHP Content : 	
				<?php 
				namespace App\Http\Controllers;
				 class Customer{
					 public function index(){
						echo phpinfo();
					 } 
				 }
	
	* Create Laravel Route : 
			- URL File : -> \routes\web.php
			- PHP Content : 
				<?php 
					Route::get('/customer', 'Customer@index');
				
	* SITE URL : http;//localhost:8000/customer
	
## Routing
	* notes : 
		All Laravel routes are defined in your route files, which are located in the routes directory. 
		These files are automatically loaded by the framework. 
		The routes/web.php file defines routes that are for your web interface. 
		These routes are assigned the web middleware group, which provides features like session state and CSRF protection. 
		The routes in routes/api.php are stateless and are assigned the api middleware group.
	
	* script : 
	 - example 1 /*just for text output*/
		Route::get('foo', function () {
			return 'Hello World';
		});
		
	 - example 2 /* route for laravel controller */ 
		Route::get('foo', function () {
			return 'Hello World';
		});
		
	 - example 3 /* laravel Controller and View */ 
		Route::get('foo', function () {
			return view('welcome');
		});

## Router Methods
	- he router allows you to register routes that respond to any HTTP verb:
		* Route::get($uri, $callback);
		* Route::post($uri, $callback);
		* Route::put($uri, $callback);
		* Route::patch($uri, $callback);
		* Route::delete($uri, $callback);
		* Route::options($uri, $callback);
		
## Multiple HTTP Verbs
	* 	Sometimes you may need to register a route that responds to multiple HTTP verbs. 
		You may do so using the match method. Or, 
		you may even register a route that responds to all HTTP verbs using the any method
	
	*	Script : 
		* Route::match(['get', 'post'], '/', function () {
			//
		  });

		* Route::any('foo', function () {
			//
		  });
		  
## CSRF Protection
	* 	Any HTML forms pointing to POST, PUT, or DELETE routes that are defined in the web 
		routes file should include a CSRF token field.
	
	* 	Script example : 
		<form method="POST" action="/profile">
			{{ csrf_field() }}
			...
		</form>
		
## Route Parameters
	* Required Parameter
		- example 1: 
			Route::get('user/{id}', function ($id) {
				return 'User '.$id;
			});
			
		- example 2: 
			Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
				//
			});
	
	* Optional Parameters
		- example 1: 
			Route::get('user/{name?}', function ($name = null) {
				return $name;
			});

		- 	example 2 : 
			Route::get('user/{name?}', function ($name = 'John') {
				return $name;
			});
			
	* Regular Expression Constraints
		- 	example 1:
			Route::get('user/{name}', function ($name) {
				//
			})->where('name', '[A-Za-z]+');
		
		- 	example 2: 
			Route::get('user/{id}', function ($id) {
				//
			})->where('id', '[0-9]+');

		- 	example 3: 
			Route::get('user/{id}/{name}', function ($id, $name) {
				//
			})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
			
	* Global Parameter
		- 	example 1 : 
			If you would like a route parameter to always be constrained by a given regular expression, 
			you may use the pattern method. 
			You should define these patterns in the boot method of your  RouteServiceProvider
			
			public function boot()
			{
				Route::pattern('id', '[0-9]+');
				parent::boot();
			}
				
		-	Once the pattern has been defined, it is automatically applied to all routes using that parameter name:

			Route::get('user/{id}', function ($id) {
				// Only executed if {id} is numeric...
			});
			
	* Named Routes
		-	Named routes allow the convenient generation of URLs or redirects for specific routes. 
			You may specify a name for a route by chaining the name method onto the route definition:
			
			Route::get('user/profile', function () {
				//
			})->name('profile');
			
		-	Once you have assigned a name to a given route, 
			you may use the route's name when generating URLs or redirects via the global route function:
			
			// Generating URLs...
			$url = route('profile');

			// Generating Redirects...
			return redirect()->route('profile');		

		-	Given router with parameter
			Route::get('user/{id}/profile', function ($id) {
				//
			})->name('profile');

			$url = route('profile', ['id' => 1]);
			
## Form Method Spoofing
		- 	HTML forms do not support PUT, PATCH or DELETE actions. 
			So, when defining PUT, PATCH or  DELETE routes that are called from an HTML form, 
			you will need to add a hidden _method field to the form. 
			The value sent with the _method field will be used as the HTTP request method:
		
		- 	Script Example : 
			<form action="/foo/bar" method="POST">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
			
			You may use the method_field helper to generate the _method input:

			{{ method_field('PUT') }}
			
## Response
	* 	- example 1 /* Basic Response */ 
			Route::get('/', function(){
				return 'Hello World';
			});
	
	* 	 - example 2 /* Custome Response */ 
			$response = Response::make("hallo world for laravel response", "201");
			$response->header('Content-Type', "text/html");
			return $response;
			
	*	- example 3 /* Response and view */
			Route::get('responseview', function(){
				return Response::view('customer')->header('Content-Type', "text/html");
			});
			
## Laravel Redirect 
	*	- example 1 /* Returning A Redirect */
		return Redirect::to('user/login');
		
	*	- example 2 /* Returning A Redirect With Flash Data */
		return Redirect::to('user/login')->with('message', 'Login Failed');
	
	*	- example 3 /* Returning A Redirect To A Named Route */
		return Redirect::route('login');
	
	*	- example 4 /* Returning A Redirect To A Named Route With Parameters */
		return Redirect::route('profile', array(1));
		
	* 	- example 5 /* Returning A Redirect To A Named Route Using Named Parameters */
		return Redirect::route('profile', array('user' => 1));
		
	*	- example 6 /* Returning A Redirect To A Controller Action */
		return Redirect::action('HomeController@index');
	
	* 	- example 7 /* Returning A Redirect To A Controller Action With Parameters */
		return Redirect::action('UserController@profile', array(1));
		
	*   - example 8 /* Returning A Redirect To A Controller Action Using Named Parameters */
		return Redirect::action('UserController@profile', array('user' => 1));
	
## Laravel View
	*	Views typically contain the HTML of your application and provide 
		a convenient way of separating your controller and domain logic from your presentation logic. 
		Views are stored in the app/views directory.
		
	* 	example 1 : 
		Route::get('/', function()
		{
			return View::make('greeting', array('name' => 'Taylor'));
		});
		
	*	example 3 /* Using conventional approach */
		$view = View::make('greeting')->with('name', 'Steve');

	* 	example 4 /* Using Magic Methods */
		$view = View::make('greeting')->withName('steve');
		
	* 	Full Example Controller :
		namespace App\Http\Controllers;
		use Illuminate\Support\Facades\DB;
		use Illuminate\Support\Facades\View;

		 class Customer{
			 
			 public function index(){
				$customers = DB::table('customers')->get();
				return view::make('customer', array('name'=> 'fasdf'));
			 }
		 }
		 
## Laravel Controller
	*	 that the controller extends the base controller class included with Laravel. 
		 The base class provides a few convenience methods such as the  middleware method, 
		 which may be used to attach middleware to controller actions: 
	
	*	example 1 /* basic laravel controller */
		* Controller : 
			- instruction -> "php artisan make:controller My_home"
			- Controller Script : 
				namespace App\Http\Controllers;
				use Illuminate\Http\Request;
				class UserController extends Controller
				{
					public function show($id)
					{
						return view('user.profile', ['user' => User::findOrFail($id)]);
					}
				}
		* Route : 
			- instruction -> Route::get('user/{id}', 'UserController@show');
		
	* 	example 2 /* Single Action Controllers */
		* Controller 
			- If you would like to define a controller that only handles a single action, 
			  you may place a single  __invoke method on the controller: 
			  
			- Script : 
				namespace App\Http\Controllers;
				use Illuminate\Http\Request;

				class SingleController extends Controller
				{
					//
					public function __invoke(){
						return "hello world";
					}
				}
				
		* Route : 
			- Route::get('singleprofile', 'SingleController');
			
	* 	example 3 /* Controller Middleware */
			- Middleware may be assigned to the controller's routes in your route files:
			- Route : 
				- Instruction : -> Route::get('profile', 'UserController@show')->middleware('auth');
			
				THIS SAME AS CONTROLLER CONSTRUCT LIKE : 
			
			- Controller 1 : 
				class UserController extends Controller
				{
					public function __construct()
					{
						$this->middleware('auth');
					}
				}
				