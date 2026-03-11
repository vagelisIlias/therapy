import React from "react";
import Navbar from "@/components/Navbar";
import {Theme} from "@/components/Theme";

export default function Layout() {
    return (
        <Theme defaultTheme="light" storageKey="vite-ui-theme">
            <Navbar />
            <main className="pt-24"></main>
        </Theme>
    );
}
