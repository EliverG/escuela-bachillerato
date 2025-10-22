<?php
/**
 * Layout principal con Sidebar de navegación
 * Bootstrap 5 + FontAwesome + SweetAlert2
 * Compatible con las vistas de Carreras, Alumnos, Cursos, etc.
 * @var \App\View\AppView $this
 */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?: 'Sistema Académico' ?></title>
    <?= $this->Html->meta('icon') ?>

    <!-- Estilos principales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: all 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }

        .sidebar .brand {
            font-size: 1.3rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            background-color: #212529;
            border-bottom: 1px solid #495057;
        }

        main {
            margin-left: 250px;
            padding: 30px;
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            main {
                margin-left: 0;
            }
        }
    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <?php $path = $this->getRequest()->getPath(); ?>

    <nav class="sidebar">
        <div class="brand">
            <i class="fa-solid fa-graduation-cap"></i> Escuela Bachillerato
        </div>

        <a class="<?= $path === '/' ? 'active' : '' ?>" href="<?= $this->Url->build('/') ?>">
            <i class="fa-solid fa-house me-2"></i>Inicio
        </a>

        <a class="<?= str_starts_with($path, '/carreras') ? 'active' : '' ?>"
            href="<?= $this->Url->build('/carreras') ?>">
            <i class="fa-solid fa-briefcase me-2"></i>Carreras
        </a>

        <a class="<?= str_starts_with($path, '/alumnos') ? 'active' : '' ?>"
            href="<?= $this->Url->build('/alumnos') ?>">
            <i class="fa-solid fa-user-graduate me-2"></i>Alumnos
        </a>

        <!-- 👇 Aquí corregimos el caso conflictivo -->
        <a class="<?= $path === '/cursos' || str_starts_with($path, '/cursos/') ? 'active' : '' ?>"
            href="<?= $this->Url->build('/cursos') ?>">
            <i class="fa-solid fa-book me-2"></i>Cursos
        </a>

        <a class="<?= str_starts_with($path, '/semestres') ? 'active' : '' ?>"
            href="<?= $this->Url->build('/semestres') ?>">
            <i class="fa-solid fa-calendar me-2"></i>Semestres
        </a>

        <a class="<?= str_starts_with($path, '/secciones') ? 'active' : '' ?>"
            href="<?= $this->Url->build('/secciones') ?>">
            <i class="fa-solid fa-layer-group me-2"></i>Secciones
        </a>

        <!-- 👇 Y este tiene su propio prefijo -->
        <a class="<?= str_starts_with($path, '/cursos-aprobados') ? 'active' : '' ?>"
            href="<?= $this->Url->build('/cursos-aprobados') ?>">
            <i class="fa-solid fa-file-pen me-2"></i>Notas
        </a>
    </nav>


    <!-- Contenido principal -->
    <main>
        <?= $this->fetch('content') ?>
    </main>

    <!-- Scripts principales -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/sweetalert2@11') ?>

    <!-- Tooltips -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <!-- Mensajes Flash con SweetAlert -->
    <?= $this->Flash->render() ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const flashContainer = document.querySelector('.message, .error-message, .success-message');
            if (flashContainer) {
                const isError = flashContainer.classList.contains('error-message');
                const message = flashContainer.textContent.trim();

                Swal.fire({
                    title: isError ? 'Error' : 'Éxito',
                    text: message,
                    icon: isError ? 'error' : 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    </script>

    <!-- Confirmación de eliminación -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    if (!form) return;
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción no se puede deshacer.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
