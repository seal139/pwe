<?php

 namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class SessionInterceptor implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = $request->getUri()->getSegments();

        if (!isset($uri[0])) {
            return redirect()->to(base_url('/HomeController'));
        }

        // Check for every controller registered at "App\Controllers\*"
        $controllerName = ucfirst($uri[0]); // Capitalize the first letter for class name
        $fullClassName = 'App\\Controllers\\' . $controllerName;

        // Never called due to auto routes. This is for security considerity. 
        // Class that not declared here should not be accessed by public
        if(!class_exists($fullClassName)) {
            return redirect()->to('/error/404');
        }
       
        // if not logged in, force to login
        if(is_null(session()->get('logged_in'))) {
            if($controllerName != "LoginController") {
                return redirect()->to(base_url('/LoginController'));
            }            
        }

        // When logged in and accessing login controller, force to home
        else{
            if($controllerName == "LoginController") {
                // got to know if user access logout. this should not be a blocker
                if (!(isset($uri[1]) && $uri[1] == "logout")) {
                   return redirect()->to(base_url('/HomeController'));
                }
            }

            else if($controllerName == "UserController" && session()->get('role') == 0) {
                return redirect()->to(base_url('/HomeController/on401'));
            }
        }      
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
