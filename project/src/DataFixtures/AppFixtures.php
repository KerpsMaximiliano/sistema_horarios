<?php
    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;

    use App\Entity\Usuario;
    use App\Entity\Materia;
    use App\Entity\Cuota;
    use App\Entity\Notificacion;

    class AppFixtures extends Fixture {
        public function load(ObjectManager $manager): void {
            // Información del objeto Materia (Nombre).
            $materiaNombre = array(
                0 => "Practica Profesionalisate 1",
                1 => "UDI 2",
                2 => "Estadistica",
                3 => "Programacion 1",
                4 => "Base de Datos 1"
            );

            // Información del objeto Materia (Descripción).
            $materiaDescripcion = array(
                0 => "Usamos symfony",
                1 => "Creamos proyecto de testing",
                2 => "Usamos R",
                3 => "Creamos app mobile con Andriud Studio",
                4 => "Consultas sql en phpMyAdmin"
            );

            // Información del objeto Materia (Aula).
            $materiaAula = array(
                0 => "Sala de computos",
                1 => "Virtual",
                2 => "Aula 15",
                3 => "Aula 17",
                4 => "Aula 11"
            );

            // Información del objeto Materia (Estado).
            $materiaEstado = array(
                0 => "Teoria",
                1 => "Parcial",
                2 => "Trabajo Practico",
                3 => "Clase consulta",
                4 => "Practica"
            );

            // Información del objeto Materia (Dia).
            $materiaDia = array(
                0 => "Lunes",
                1 => "Martes",
                2 => "Miercoles",
                3 => "Jueves",
                4 => "Viernes"
            );

            // Información del objeto Cuota (Mes).
            $cuotaMes = array(
                0 => "Marzo",
                1 => "Abril",
                2 => "Mayo",
                3 => "Junio",
                4 => "Julio",
                5 => "Agosto",
                6 => "Septiembre",
                7 => "Octubre",
                8 => 'Noviembre',
                9 => "Diciembre"
            );

            // Información del objeto Notificacion (Titulo).
            $notificacionTitulo = array(
                0 => "25/10/2022 Entregar carrito",
                1 => "Proxima clase presentacion de proyectos",
                2 => "Mañana no tenemos clases",
                3 => "Proxima clase presentacion de una version beta",
                4 => "Leer el articulo consultas SQL"
            );

            // Información del objeto Notificacion (Descripcion).
            $notificacionDescripcion = array(
                0 => "Deberan entregar el carrito en la fecha propuesta, debe estar completo (Unidad 11 terminada), no se frusten con las vistas, mientras que las funcionabilidades funcionen correctamente esta bien",
                1 => "La presentacion del proyecto sera de forma presencial, se pondra en el proyectos sus proyectos, primero se mostraran las diferentes pantallas y luego al final analizaremos el codigo todos juntos",
                2 => "Mañana 17/10 , no voy asistir al instituto por complicaciones personales, les deje una breve actividad en el aula, cualquier consulta mandenme un email",
                3 => "La proxima clase se presentara la version beta del proyecto, es decir, deberan presentar las diferentes vistas y simular las funcionalidades que tendra la misma, pueden utilizar herramientas para crear los wireframes",
                4 => "Por favor para la siguiente clase lean el articulo que les deje, en la misma utilizaremos los comandos propuestos, ¡Saludos y buen finde!"
            );

            for ( $i = 1; $i < 6; $i++ ){
                // Entity Usuario.
                $usuario = new Usuario();
                $usuario->setEmail('usuario'.$i.'@gmail.com');
                $usuario->setPassword('$2y$13$TIzeqKwVpkui1ytOV9TTx.tb3oCyJXP3jLuJSnF2orjfmJTq7kXCi');
                $usuario->setDocumento($i);
                $usuario->setNombre('Nombre'.$i);
                $usuario->setApellido('Apellido'.$i);
                $manager->persist($usuario);

                // Entity Materia.
                $materia = new Materia();
                $materia->setNombre($materiaNombre[$i-1]);
                $materia->setDescripcion($materiaDescripcion[$i-1]);
                $materia->setDia($materiaDia[$i-1]);
                $materia->setHoraInicio(1700);
                $materia->setHoraFin(1900);
                $materia->setAula($materiaAula[$i-1]);
                $materia->setEstado($materiaEstado[$i-1]);
                $manager->persist($materia);

                // Entity Cuota.
                for ( $j=1; $j < 11; $j++ ) {
                    $cuota = new Cuota();
                    $cuota->setUsuario($usuario);
                    $cuota->setMes($cuotaMes[$j-1]);
                    $cuota->setPago(true);
                    $manager->persist($cuota);
                }

                // Entity Notificación.
                $notificacion = new Notificacion();
                $notificacion->setTitulo($notificacionTitulo[$i-1]);
                $notificacion->setDescripcion($notificacionDescripcion[$i-1]);
                $manager->persist($notificacion);
            }
            // Manager flush.
            $manager->flush();
        }
    }
?>