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
            return redirect()->to(base_url('/'));
        }
       
        $controllerName = $uri[0];

        // if not logged in, force to login
        if(is_null(session()->get('logged_in'))) {
            if($controllerName != "LoginController") {
                return redirect()->to(base_url('/LoginController'));
            }            
        }

        // When logged in and accessing login controller, force to home
        if($controllerName == "UserController") {
            // got to know if user access logout. this should not be a blocker
            if (!(isset($uri[1]) && $uri[1] == "logout")) {
                return redirect()->to(base_url('/HomeController'));
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
