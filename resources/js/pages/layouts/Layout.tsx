import { Link } from '@inertiajs/react';
import React from "react";

interface AuthUser {
    id: number,
    name: string,
    email: string,
    role: 'admin' | 'customer' | 'user'
}
interface LayoutProps {
    children?: React.ReactNode;
    auth: { user: AuthUser | null };
}

export default function Layout({ children, auth }: LayoutProps) {
    return (
        <main>
            <header className="p-4 bg-gray-100 flex justify-between items-center">
                <div className="flex gap-4">
                    <Link href="/home">Home</Link>
                    <Link href="/about">About</Link>
                    <Link href="/contact">Contact</Link>
                </div>
                <div>
                    {auth.user ? (
                        <Link href="/logout">Logout</Link>
                    ) : (
                        <Link href="/login">Login</Link>
                    )}
                </div>
            </header>
            <article className="p-4">{children}</article>
        </main>
    )
}
