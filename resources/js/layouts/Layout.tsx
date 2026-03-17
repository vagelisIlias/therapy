import React from "react";
import Navbar from "@/components/Navbar";
import { Theme } from "@/components/Theme";
import { Head } from '@inertiajs/react'

export default function Layout() {
    return (
        <Theme defaultTheme="light" storageKey="vite-ui-theme">
            <Head title="Psychanalyein" />
            <Navbar />
            <main className="pt-24"></main>
        </Theme>
    );
}
