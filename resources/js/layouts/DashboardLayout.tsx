import {Theme} from "@/components/Theme";
import React from "react";
import Page from "@/components/dashboard/main/Page";
import { TooltipProvider } from "@/components/ui/tooltip";

export default function DashboardLayout({ children }: { children: React.ReactNode}) {
    return (
    <Theme defaultTheme="light" storageKey="vite-ui-theme">
        <TooltipProvider delayDuration={0}>
            <Page />
            <main className="p-4">
                {children}
            </main>
        </TooltipProvider>
    </Theme>
  );
}
