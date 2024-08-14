import { createRouter, createWebHistory } from 'vue-router';
import Contacts from './components/Contacts.vue'; // Asegúrate de que esta ruta sea correcta

const routes = [
    {
        path: '/contacts',  // Esta es la ruta que manejará la navegación a la página de contactos
        name: 'Contacts',
        component: Contacts,
    },
    // Otras rutas que necesites
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
