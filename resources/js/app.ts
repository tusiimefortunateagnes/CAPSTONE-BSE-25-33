import './bootstrap';
import '../css/app.css';

import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp, Head } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import AuthenticatedLayout from './Layouts/AuthenticatedLayout.vue';
import ProjectItem from './Components/ProjectItem.vue'
const appName = import.meta.env.VITE_APP_NAME || 'COTE Timesheets';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            // .use(ZiggyVue)
            .component('Head', Head)
            .component('ProjectItem', ProjectItem)
            .component('AuthenticatedLayout', AuthenticatedLayout)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
