#LARAVEL YAJRA DATATABLE 6.0 PHP FRAMEWORK 5.X  
##Discussion
	* Installation 
		- Installation with Composer.
		- Config Datatable File
			- Add Laravel Provider.
			- Add Laravel Alias Provider.
	* View Datatable
	* Refference : 
		
## Installation  
	- Installation with Composer : 
		->	$ composer require yajra/laravel-datatables-oracle
		
	- Config Datatable File /* app/config/app.php */
		- Add Laravel Provider
			config/app.php and then add following service provider.
			'providers' => [
				// ...
				Yajra\Datatables\DatatablesServiceProvider::class,
			]
			
		- Add Laravel Alias Provider : 
		  'Datatables' => Yajra\Datatables\Facades\Datatables::class,
		  
	- Publis Configuration file : 
		- $ php artisan vendor:publish
		
	- DONE !!.

##	View Datatable
	* 	Route
			-> Route::get('customer', ['as' => 'datatables', 'uses' => 'Customer@getIndex']);
			-> Route::get('customer.data', ['as' => 'datatables.data', 'uses' => 'Customer@anyData']);
			
	*	Controller
		*	View Controller
				-> see "customer.php" as getIndex method.
		* 	Data Result
				-> set "customer.php" as anyData method.
				
	* 	View 
		*	Master Blade
				-> see "layouts/master.blade.php"
		* 	Content Blade
				-> see "layouts/index.blade.php"
	
## Refference : 
	- https://github.com/yajra/laravel-datatables
	- https://yajrabox.com/docs/laravel-datatables/6.0
		
	