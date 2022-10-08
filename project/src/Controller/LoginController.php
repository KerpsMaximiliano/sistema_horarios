<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
    use Symfony\Component\HttpFoundation\Response;
    
    class LoginController extends AbstractController{
        /**
        * @Route("/login", name="app_login")
        */
        public function index(AuthenticationUtils $authenticationUtils): Response {
            $error = $authenticationUtils->getLastAuthenticationError();
            $userName = $authenticationUtils->getLastUsername();
            return $this->render('login/login.html.twig', compact('userName', 'error'));
        }

        /**
        * @Route("/logout", name="app_logout", methods={"GET"})
        */
        public function logout(): void {
            // controller can be blank: it will never be called!
            throw new \Exception('Don\'t forget to activate logout in security.yaml');
        }
    }
?>