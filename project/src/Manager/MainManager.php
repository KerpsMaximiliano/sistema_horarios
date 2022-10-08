<?php
    namespace App\Manager;

    use Doctrine\Persistence\ManagerRegistry;

    use App\Entity\Usuario;
    use App\Entity\Materia;
    use App\Entity\Cuota;
    use App\Entity\Notificacion;

    class MainManager {
        public function __construct(ManagerRegistry $doctrine) {
            $this->doctrine = $doctrine;
        }

        public function verMaterias() {
            return $materias = $this->doctrine->getRepository(Materia::class)->findAll();
        }
    }
?>