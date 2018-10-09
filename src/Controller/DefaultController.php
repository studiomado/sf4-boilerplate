<?php

namespace App\Controller;

use App\Validators\LoginValidator;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends AbstractController
{
    /** @Route("/api/login_check", name="login") */
    public function index(
        JWTTokenManagerInterface $jwtManager,
        LoginValidator $validator,
        EntityManagerInterface $manager,
        Request $request,
        UserPasswordEncoderInterface $encoder,
        LoggerInterface $logger
    ) {
        $response = $validator->validate();

        if ($response->isValid()) {
            $email = $request->request->get('username');
            $userRepository = $manager->getRepository(\App\Entity\User::class);
            $user = $userRepository->findOneByEmail($email);

            if (!$user) {
                $logger->warning('user not found');

                return new JsonResponse([
                    'success' => false,
                ], 403);
            }

            if ($encoder->isPasswordValid($user, $request->request->get('password'))) {
                $token = $jwtManager->create($user);
                return new JsonResponse([
                    'token' => $token,
                ]);
            }
        }

        $logger->warning((string) $validator->error());

        return new JsonResponse([
            'success' => false,
        ], 403);
    }
}
