<?php

namespace App\Controllers;

use App\Models\Archivo;

class ArchivoController
{

    public function index()
    {
        $archivos = Archivo::all();
        require_once __DIR__ . '/../Views/innovaciones.view.php';
    }

    public function store()
    {
        $data = $_POST;

        $archivo = new Archivo();
        $descripcion = $_POST['descripcion'] ?? '';
        $ruta = '';

        // Verificar si se subió un archivo
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $nombreTmp = $_FILES['archivo']['tmp_name'];
            $nombreArchivo = basename($_FILES['archivo']['name']);
            $directorioDestino = __DIR__ . '/../../public/uploads/';
            $ruta = 'uploads/' . uniqid() . '_' . $nombreArchivo;

            // Crear carpeta si no existe
            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            if (!move_uploaded_file($nombreTmp, $directorioDestino . basename($ruta))) {
                $_SESSION['mensaje'] = 'Error al subir el archivo.';
                $_SESSION['tipo'] = 'danger';
                header('Location: ' . BASE_URL . '/admin/innovaciones');
                exit;
            }
        }

        $archivo = new Archivo();
        $archivo->descripcion = $descripcion;
        $archivo->ruta_archivo = $ruta;
        $archivo->enlace = $data['enlace'] ?? '';

        $archivo->save();

        $_SESSION['mensaje'] = 'Publicación guardada correctamente';
        $_SESSION['tipo'] = 'success';

        header('Location: ' . BASE_URL . '/admin/innovaciones');
        exit;
    }

    public function update()
    {
        $data = $_POST;

        if (!isset($data['id'])) {
            header('Location: ' . BASE_URL . '/admin/innovaciones');
            exit;
        }

        $archivo = Archivo::findById($data['id']);

        if (!$archivo) {
            header('Location: ' . BASE_URL . '/admin/innovaciones');
            exit;
        }

        $archivo->descripcion = $data['descripcion'] ?? $archivo->descripcion;
        $archivo->enlace = $data['enlace'] ?? $archivo->enlace;

        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $nombreTmp = $_FILES['archivo']['tmp_name'];
            $nombreArchivo = basename($_FILES['archivo']['name']);
            $directorioDestino = __DIR__ . '/../../public/uploads/';
            $nuevaRuta = 'uploads/' . uniqid() . '_' . $nombreArchivo;

            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            if (move_uploaded_file($nombreTmp, $directorioDestino . basename($nuevaRuta))) {
                // Eliminar el archivo anterior si existía
                if (!empty($archivo->ruta_archivo) && file_exists(__DIR__ . '/../../public/' . $archivo->ruta_archivo)) {
                    unlink(__DIR__ . '/../../public/' . $archivo->ruta_archivo);
                }
                $archivo->ruta_archivo = $nuevaRuta;
            }
        }


        $archivo->save();

        $_SESSION['mensaje'] = 'Publicación actualizada correctamente';
        $_SESSION['tipo'] = 'success';

        header('Location: ' . BASE_URL . '/admin/innovaciones');
        exit;
    }

    public function destroy()
    {
        $id = $_POST['id'] ?? null;

        $archivo = Archivo::findById($id);

        if ($archivo) {
            if (!empty($archivo->ruta_archivo) && file_exists(__DIR__ . '/../../public/' . $archivo->ruta_archivo)) {
                unlink(__DIR__ . '/../../public/' . $archivo->ruta_archivo);
            }
            Archivo::destroy($id);
        }

        $_SESSION['mensaje'] = 'Publicación eliminada correctamente';
        $_SESSION['tipo'] = 'success';

        header('Location: ' . BASE_URL . '/admin/innovaciones');
        exit;
    }
}
