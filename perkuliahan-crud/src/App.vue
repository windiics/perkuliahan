<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
      <div class="container">
        <router-link :to="{ name: 'home' }" class="navbar-brand">HOME</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{ name: 'mahasiswas.index' }" class="nav-link active" aria-current="page">Mahasiswa</router-link
              >
            </li>
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{ name: 'dosens.index' }" class="nav-link active" aria-current="page">Dosen</router-link
              >
            </li>
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{ name: 'prodis.index' }" class="nav-link active" aria-current="page">Prodi</router-link
              >
            </li>
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{ name: 'mata_kuliahs.index' }" class="nav-link active" aria-current="page">Mata Kuliah</router-link
              >
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0" role="search">
            <a
              href="https://www.instagram.com/windiics_/"
              target="_blank"
              class="btn btn-secondary"
              >Windi Centia Septiani on Instagram</a
            >
          </ul>
        </div>
      </div>
    </nav>

<router-view></router-view>

  </div>
</template>