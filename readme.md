#LARAVEL PHP FRAMEWORK 5.X  
##Discussion
	* Server Requirements
	* Installation 
	* Application Key
	* Local Development Server
	* Hallo World

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
		- Composer Installer
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

