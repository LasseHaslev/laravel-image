<?php

namespace LasseHaslev\LaravelImage\Http;

use Illuminate\Support\Facades\Route;
use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;
// use Illuminate\Routing\Route;

/**
 * Class Routing
 * @author Lasse S. Haslev
 */
class Routing
{
    protected $routes = [
        'download',
        'backend'=>[
            'index',
            'store',
            'update',
            'delete',
        ],
    ];

    /**
     * undocumented function
     *
     * @return void
     */
    public function routes( string $groupName = null )
    {
        if ( ! $groupName ) {
            return $this->getRouteGroup( $this->routes, true );
        }

        return $this->getRouteGroup( $this->routes[ $groupName ] );
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function getRouteGroup(array $array = [], $recursive = false)
    {
        foreach ($array as $key=>$routes) {
            if ( is_array( $routes ) && $recursive ) {
                $this->getRouteGroup( $routes, $recursive );
            }
            else {
                $this->route( $routes );
            }
        }
    }

    /**
     * Get named routes or all routes
     *
     * @return void
     */
    public function route( string $routeName = null )
    {
        switch ($routeName) {
            case 'index':
                return $this->getRoute( 'images.index', 'images', 'index' );
                break;
            case 'store':
                return $this->getRoute( 'images.store', 'images/store', 'store', 'post' );
                break;
            case 'update':
                return $this->getRoute('images.update', 'images/{image}', 'update', 'put' );
                break;
            case 'delete':
                return $this->getRoute('images.destroy', 'images/{image}', 'destroy', 'delete' );
                break;
            case 'download':
                return $this->getRoute('images.download', 'images/{image}/download', 'download', 'post' );
                break;
            case null:
                return $this->routes();
                break;
            default:
                abort( 500, sprintf( 'No route of name %s found.', $routeName ) );
                break;
        }
    }

    /**
     * undocumented function
     *
     * @return void
     */
    protected function getRoute($name, $uri, $method, $routeMethod = 'get')
    {
        $router = app('router');
        $router->match( $routeMethod, $uri, sprintf( '\%s@%s', ImagesController::class, $method ) )->name( $name );
    }

}
