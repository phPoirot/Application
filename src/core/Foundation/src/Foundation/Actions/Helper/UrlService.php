<?php
namespace Module\Foundation\Actions\Helper;

use Poirot\Ioc\Container\Service\aServiceContainer;

class UrlService 
    extends aServiceContainer
{
    /**
     * @var string Service Name
     */
    protected $name = 'url';

    /**
     * Create Service
     *
     * @return mixed
     */
    function newService()
    {
        $rootSrv = $this->services()->from('/');

        $router  = $rootSrv->get('router');
        /** @see onRouteMatchListener */
        $matched = $rootSrv->get('router.match');

        $rAction = new UrlAction;
        $rAction->setRouter($router)
            ->setRouteMatch($matched);

        return $rAction;
    }
}
