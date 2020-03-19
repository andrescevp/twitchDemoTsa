<?php


namespace App\Controller;

use App\Form\UserTagType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class AppController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var AuthorizationChecker
     */
    private $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function indexAction(Request $request)
    {
        $viewData = [
            'form' => null,
        ];

        if ($this->authorizationChecker->isGranted('ROLE_USER')) {
            $user = $this->getUser();
            $form = $this->createForm(UserTagType::class, $user);

            $form->handleRequest($request);

            $viewData['form'] = $form->createView();
        }

        return $this->render('app/index.html.twig', $viewData);
    }
}
