import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'

import { ZiggyVue } from 'ziggy'
import { Ziggy } from './ziggy'

import loadImage from './mixins/loadImage'

InertiaProgress.init()

createInertiaApp({
    resolve: async (name) => {
        return (await import(`./Pages/${name}`)).default
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(ToastPlugin)
            .component('Link', Link)
            .component('Head', Head)
            .mixin({ methods: { route, loadImage } })
            .mount(el);
    },
});