
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import( /* webpackChunkName: "home" */ '../views/home.vue')
    },

    //Mahasiswas
    {
        path: '/mahasiswas',
        name: 'mahasiswas.index',
        component: () => import( /* webpackChunkName: "mahasiswas.index" */ '../views/mahasiswas/mahasiswas.index.vue')
    },
    {
        path: '/mahasiswas/create',
        name: 'mahasiswas.create',
        component: () => import( /* webpackChunkName: "mahasiswas.create" */ '../views/mahasiswas/mahasiswas.create.vue')
    },
    {
        path: '/mahasiswas/edit/:id',
        name: 'mahasiswas.edit',
        component: () => import( /* webpackChunkName: "mahasiswas.edit" */ '../views/mahasiswas/mahasiswas.edit.vue')
    },


    // Dosens
    {
        path: '/dosens',
        name: 'dosens.index',
        component: () => import( /* webpackChunkName: "dosens.index" */ '../views/dosens/dosens.index.vue')
    },
    {
        path: '/dosens/create',
        name: 'dosens.create',
        component: () => import( /* webpackChunkName: "dosens.create" */ '../views/dosens/dosens.create.vue')
    },
    {
        path: '/dosens/edit/:id',
        name: 'dosens.edit',
        component: () => import( /* webpackChunkName: "dosens.edit" */ '../views/dosens/dosens.edit.vue')
    },

    //Mata Kuliah
        {
            path: '/mata_kuliahs',
            name: 'mata_kuliahs.index',
            component: () => import( /* webpackChunkName: "mata_kuliahs.index" */ '../views/mata_kuliahs/mata_kuliahs.index.vue')
        },
        {
            path: '/mata_kuliahs/create',
            name: 'mata_kuliahs.create',
            component: () => import( /* webpackChunkName: "mata_kuliahs.create" */ '../views/mata_kuliahs/mata_kuliahs.create.vue')
        },
        {
            path: '/mata_kuliahs/edit/:id',
            name: 'mata_kuliahs.edit',
            component: () => import( /* webpackChunkName: "mata_kuliahs.edit" */ '../views/mata_kuliahs/mata_kuliahs.edit.vue')
        },

        //Prodi
        {
            path: '/prodis',
            name: 'prodis.index',
            component: () => import( /* webpackChunkName: "prodis.index" */ '../views/prodis/prodis.index.vue')
        },
        {
            path: '/prodis/create',
            name: 'prodis.create',
            component: () => import( /* webpackChunkName: "prodis.create" */ '../views/prodis/prodis.create.vue')
        },
        {
            path: '/prodis/edit/:id',
            name: 'prodis.edit',
            component: () => import( /* webpackChunkName: "prodis.edit" */ '../views/prodis/prodis.edit.vue')
        },
]



const router = createRouter({
    history: createWebHistory(),
    routes 
})

export default router