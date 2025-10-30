<?php

namespace App\Controllers;

use App\Models\Convocatoria;
use App\Models\Postulacion;
use App\Models\Region;

class ConvocatoriaController
{

    public function showConvocatoriaEmpresaForm()
    {
        $usuarioId = $_SESSION['usuario_id'];
        $convocatorias = Convocatoria::convocatoriaPorUsuario($usuarioId);
        $regiones = Region::all();
        require_once __DIR__ . '/../Views/bolsatrabajo/empresas.view.php';
    }

    public function postular()
    {

        $convocatoriaId = $_POST['convocatoria_id'] ?? null;

        if (!$convocatoriaId) {
            $_SESSION['error'] = "Convocatoria no válida.";
            header('Location: ' . BASE_URL . '/bolsatrabajo');
            exit;
        }

        if (!estaAutenticado()) {
            $_SESSION['error'] = "Debes iniciar sesión para postularte.";
            header('Location: ' . BASE_URL . '/bolsatrabajo/login');
            exit;
        }

        $usuarioId = $_SESSION['usuario_id'];

        if (Postulacion::yaPostulo($usuarioId, $convocatoriaId)) {
            $_SESSION['error'] = "Ya te has postulado a esta convocatoria.";
            header('Location: ' . BASE_URL . '/bolsatrabajo/postulacion-estudiante');
            exit;
        }


        /*$postulacion = new Postulacion();
        $postulacion->usuario_id = $usuarioId;
        $postulacion->convocatoria_id = $convocatoriaId;
        $postulacion->save();
        $_SESSION['mensaje'] = "Te has postulado exitosamente.";
        header('Location: ' . BASE_URL . '/bolsatrabajo/postulacion-estudiante');*/
        header('Location: ' . BASE_URL . '/bolsatrabajo/confirmar-postulacion?id=' . $convocatoriaId);
        exit;
    }

    public function guardarPostulacion()
    {
        if (!estaAutenticado()) {
            $_SESSION['error'] = "Debes iniciar sesión para postularte.";
            header('Location: ' . BASE_URL . '/bolsatrabajo/login');
            exit;
        }

        $convocatoriaId = $_POST['convocatoria_id'] ?? null;
        $usuarioId = $_SESSION['usuario_id'];

        /*if (!$convocatoriaId) {
            $_SESSION['error'] = "Convocatoria no válida.";
            header('Location: ' . BASE_URL . '/bolsatrabajo');
            exit;
        }

        if (Postulacion::yaPostulo($usuarioId, $convocatoriaId)) {
            $_SESSION['error'] = "Ya te has postulado a esta convocatoria.";
            header('Location: ' . BASE_URL . '/bolsatrabajo/postulacion-estudiante');
            exit;
        }*/

        $postulacion = new Postulacion();
        $postulacion->usuario_id = $usuarioId;
        $postulacion->convocatoria_id = $convocatoriaId;

        if ($postulacion->save()) {
            $_SESSION['mensaje'] = "Tu postulación fue registrada correctamente.";
            $_SESSION['tipo'] = 'success';
        }

        header('Location: ' . BASE_URL . '/bolsatrabajo/postulacion-estudiante');
        exit;
    }


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = $_POST;
            $usuarioId = $_SESSION['usuario_id'];
            $logo = '';

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $nombreTmp = $_FILES['logo']['tmp_name'];
                $nombreArchivo = basename($_FILES['logo']['name']);
                $directorioDestino = __DIR__ . '/../../public/uploads/';
                $logo = 'uploads/' . uniqid() . '_' . $nombreArchivo;

                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true);
                }

                if (!move_uploaded_file($nombreTmp, $directorioDestino . basename($logo))) {
                    $_SESSION['mensaje'] = 'Error al subir el logo.';
                    $_SESSION['tipo'] = 'danger';
                    header('Location: ' . BASE_URL . '/bolsatrabajo/empresas');
                    exit;
                }
            }

            $data['usuario_id'] = $usuarioId;
            $data['logo'] = $logo;

            if (Convocatoria::create($data)) {
                $_SESSION['mensaje'] = 'Convocatoria creada correctamente.';
                $_SESSION['tipo'] = 'success';
            } else {
                $_SESSION['mensaje'] = 'Error al crear la convocatoria.';
                $_SESSION['tipo'] = 'danger';
            }

            header('Location: ' . BASE_URL . '/bolsatrabajo/empresas');
            exit;
        }
    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            if (!isset($data['id'])) {
                header('Location: ' . BASE_URL . '/bolsatrabajo/empresas');
                exit;
            }

            $convocatoria = Convocatoria::find($data['id']);
            if (!$convocatoria) {
                $_SESSION['mensaje'] = 'Convocatoria no encontrada.';
                $_SESSION['tipo'] = 'danger';
                header('Location: ' . BASE_URL . '/bolsatrabajo/empresas');
                exit;
            }

            $nuevoLogo = $convocatoria['logo'];

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $nombreTmp = $_FILES['logo']['tmp_name'];
                $nombreArchivo = basename($_FILES['logo']['name']);
                $directorioDestino = __DIR__ . '/../../public/uploads/';
                $nuevoLogo = 'uploads/' . uniqid() . '_' . $nombreArchivo;

                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true);
                }

                if (move_uploaded_file($nombreTmp, $directorioDestino . basename($nuevoLogo))) {
                    if (!empty($convocatoria['logo']) && file_exists(__DIR__ . '/../../public/' . $convocatoria['logo'])) {
                        unlink(__DIR__ . '/../../public/' . $convocatoria['logo']);
                    }
                }
            }

            $data['logo'] = $nuevoLogo;

            if (Convocatoria::update($data['id'], $data)) {
                $_SESSION['mensaje'] = 'Convocatoria actualizada correctamente.';
                $_SESSION['tipo'] = 'success';
            } else {
                $_SESSION['mensaje'] = 'Error al actualizar la convocatoria.';
                $_SESSION['tipo'] = 'danger';
            }

            header('Location: ' . BASE_URL . '/bolsatrabajo/empresas');
            exit;
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            if ($id) {
                Convocatoria::destroy($id);
            }

            $_SESSION['mensaje'] = 'Convocatoria eliminada correctamente';
            $_SESSION['tipo'] = 'success';
            header('Location:' . BASE_URL . '/bolsatrabajo/empresas');
            exit;
        }
    }
}
