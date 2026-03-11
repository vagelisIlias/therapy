import '../css/app.css';
import './bootstrap';

import React from 'react';
import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob<{ default: any }>('./pages/**/*.{tsx, jsx}', {
            eager: true,
        })
        return pages[`./pages/${name}.tsx`]
    },

    setup({ el, App, props }) {
        const root = createRoot(el)

        root.render(
            <App {...props} />
        )
        console.log('Loaded JSON files:', Object.keys(import.meta.glob('/lang/*.json', { eager: true })));
    }
})
