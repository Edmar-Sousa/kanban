import './bootstrap'

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

import { ZiggyVue } from 'ziggy-js'

import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'

import loadImage from './mixins/loadImage'

createInertiaApp({
    resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(ToastPlugin)
        .use(ZiggyVue)
        .component('Link', Link)
        .component('Head', Head)
        .mixin({ methods: { loadImage } })
        .mount(el)
    },
})
