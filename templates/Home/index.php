<?php
$this->assign('title', 'Inicio');
?>

<div class="container-fluid">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Panel principal</h1>
  </div>

  <div class="row g-4">

    <!-- Carreras -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-briefcase fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Carreras</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Administrar carreras disponibles.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/carreras') ?>">
            Ir a Carreras
          </a>
        </div>
      </div>
    </div>

    <!-- Alumnos -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-user-graduate fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Alumnos</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Gestión de alumnos y fotografías.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/alumnos') ?>">
            Ir a Alumnos
          </a>
        </div>
      </div>
    </div>

    <!-- Cursos -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-book fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Cursos</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Administrar cursos por carrera.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/cursos') ?>">
            Ir a Cursos
          </a>
        </div>
      </div>
    </div>

    <!-- Semestres -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-calendar fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Semestres</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Catálogo de semestres.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/semestres') ?>">
            Ir a Semestres
          </a>
        </div>
      </div>
    </div>

    <!-- Secciones -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-layer-group fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Secciones</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Catálogo de secciones.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/secciones') ?>">
            Ir a Secciones
          </a>
        </div>
      </div>
    </div>

    <!-- Notas (Cursos Aprobados) -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-file-pen fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Notas</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Registro de notas por alumno.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/cursos-aprobados') ?>">
            Ir a Notas
          </a>
        </div>
      </div>
    </div>

     <!-- Reportes -->
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-file-pdf fa-2x text-secondary me-3"></i>
            <h5 class="card-title mb-0">Reporteria</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">Generación de reportes por especificaciones.</p>
          <a class="btn btn-dark mt-auto" href="<?= $this->Url->build('/reporteria') ?>">
            Ir a Reporteria
          </a>
        </div>
      </div>
    </div>

  </div>
</div>
