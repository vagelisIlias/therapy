import { usePage } from '@inertiajs/react';

export const translation = () => {
    const { translation } = usePage().props as any;

    const t = (key: string) => {
        return translation?.[key] || key;
    };

    return { t };
};
