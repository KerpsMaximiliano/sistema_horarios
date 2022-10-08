<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    use App\Manager\MainManager;

    class MainController extends AbstractController {
        /**
        * @Route ("/", name="calendario")
        */
        public function calendario(MainManager $mainManager): Response {
            $materias = $mainManager->verMaterias();
            return $this->render('calendario/principal.html.twig', compact('materias'));
        }
    }
?>