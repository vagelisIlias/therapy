import {Theme} from "@/components/Theme";
import React from "react";
import { AppSidebar } from "@/components/dashboard/AppSidebar";
import { SidebarProvider, SidebarInset } from "@/shadcn/sidebar";

export default function DashboardLayout({ children }: { children: React.ReactNode}) {
    return (
    <Theme defaultTheme="light" storageKey="vite-ui-theme">
      <SidebarProvider>
        <AppSidebar />
            <SidebarInset>
                {/* Το Header και τα Breadcrumbs σου */}
                <main className="p-4">
                    {children}
                </main>
            </SidebarInset>
        </SidebarProvider>
    </Theme>
  );
}
