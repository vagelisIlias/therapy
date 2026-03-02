import '../css/app.css';
import './bootstrap';

import React from 'react';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';

const appName: string = import.meta.env.VITE_APP_NAME;
const pages = import.meta.glob<{ default: React.ComponentType<any> }>('./Pages/**/*.tsx');

createInertiaApp({
    title: (title: string) => `${title} - ${appName}`,
    resolve: (name: string) =>
        resolvePageComponent<{ [key: string]: any }>(`./Pages/${name}.tsx`, pages),
    setup({ el, App, props }: { el: HTMLElement; App: React.ComponentType<any>; props: any }) {
        const root = createRoot(el);
        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
