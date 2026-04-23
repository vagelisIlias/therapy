import {Theme} from "@/components/Theme";
import React from "react";
import { AppSidebar } from "@/components/ui/app-sidebar"
import { TooltipProvider } from "@/components/ui/tooltip";
import { SiteHeader } from "@/components/ui/site-header"
import { SidebarProvider, SidebarInset, SidebarHeader, } from "@/components/ui/sidebar";

export default function DashboardLayout({ children }: { children: React.ReactNode}) {
    return (
        <Theme defaultTheme="light" storageKey="vite-ui-theme">
            <TooltipProvider delayDuration={0}>
                <SidebarProvider
                    style={
                        {
                        "--sidebar-width": "calc(var(--spacing) * 72)",
                        "--header-height": "calc(var(--spacing) * 12)",
                        } as React.CSSProperties
                    }
                >
                    <AppSidebar variant="inset"/>
                    <SidebarInset>
                        <SiteHeader />
                        <div className="flex flex-1 flex-col p-4">
                            {children}
                        </div>
                    </SidebarInset>
                </SidebarProvider>
            </TooltipProvider>
        </Theme>
    );
}
