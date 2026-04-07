import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./pages/**/*.tsx', { eager: true });
        const page = pages[`./pages/${name}.tsx`];

        if (!page) {
            throw new Error(`Page not found: ./pages/${name}.tsx`);
        }

        return page;
    },

    setup({ el, App, props }) {
        const root = createRoot(el)

        root.render(
            <App {...props} />
        )
    }
})
