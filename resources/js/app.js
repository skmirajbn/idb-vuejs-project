import "../css/all.min.css";
import "../css/app.css";
import "./bootstrap";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

// Sweet alert
import "sweetalert2/dist/sweetalert2.min.css";
import VueSweetalert2 from "vue-sweetalert2";

const appName = "Ecommerce";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueSweetalert2, {
                confirmButtonColor: "#10B981",
                cancelButtonColor: "#4B5563",
            })
            .mount(el);
    },
    progress: {
        color: "#EA580C",
        includeCSS: true,
        showSpinner: true,
    },
});
