import {Theme} from "@/components/Theme";
import React from "react";

export default function DashboardLayout({ children }: { children: React.ReactNode}) {
    return (
        <Theme defaultTheme="light" storageKey="vite-ui-theme">
            <main className="pt-24">
                { children }
            </main>
        </Theme>
    );
}
