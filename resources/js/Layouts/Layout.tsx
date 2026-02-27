import { Link } from '@inertiajs/react';
import React from "react";

interface LayoutProps {
    children: React.ReactNode
}

export default function Layout({ children }: LayoutProps) {
    return (
        <main>
            <header className="p-4 bg-gray-100 flex justify-between items-center">
                <div className="flex gap-4">
                    <Link href="/home">Home</Link>
                    <Link href="/about">About</Link>
                    <Link href="/contact">Contact</Link>
                </div>
                <div>
                    <Link href="/login">Login</Link>
                </div>
            </header>
            <article className="p-4">{children}</article>
        </main>
    )
}
