<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/28/2019
 * Time: 9:45 AM
 */

namespace AppBundle\Handler;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;


/**
 * Class LoginSuccessHandler
 * @package AppBundle\Handler
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var RouterInterface $router
     */
    protected $router;
    /**
     * @var AuthorizationCheckerInterface $authorizationChecker
     */
    protected $authorizationChecker;
    public function __construct(RouterInterface $router, AuthorizationCheckerInterface $authorizationChecker)
    {
       $this->router =  $router;
       $this->authorizationChecker = $authorizationChecker;
    }

    /**
     * @param Request           $request
     * @param TokenInterface    $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->authorizationChecker->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('admin'));
        }
        elseif ($this->authorizationChecker->isGranted('ROLE_LEDEN'))
        {
            $response = new RedirectResponse($this->router->generate('leden'));
        }
        elseif ($this->authorizationChecker->isGranted('ROLE_BEGELEIDERS'))
        {
            $response = new RedirectResponse($this->router->generate('begeleiders'));
        }
        return $response;

    }
}