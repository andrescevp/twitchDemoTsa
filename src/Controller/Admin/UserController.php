<?php


namespace App\Controller\Admin;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function userList(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 10);

        $users = $this->userRepository->findPaginated($page, $limit);

        return $this->render('admin/users/list.html.twig', ['users' => $users]);
    }
}
