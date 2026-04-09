import * as React from "react"

import Logo from "@/components/Logo";
import { NavMain } from "@/components/ui/nav-main"
import { NavUser } from "@/components/ui/nav-user"
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar"
import {
    LayoutDashboardIcon,
    ListIcon,
    ChartBarIcon,
    FolderIcon,
    UsersIcon,
} from "lucide-react"
import { translation } from "@/hooks/Translation";


export function AppSidebar({ ...props }: React.ComponentProps<typeof Sidebar>) {
    const { t } = translation();

    const data = {
        user: {
            name: "shadcn",
            email: "m@example.com",
            avatar: "/avatars/shadcn.jpg",
        },
        navMain: [
            {
                title: t("calendar"),
                url: "calendar",
                icon: (
                    <LayoutDashboardIcon
                    />
                ),
            },
            {
                title: t("appointments"),
                url: "appointments",
                icon: (
                    <ListIcon
                    />
                ),
            },
            {
                title: t("analytics"),
                url: "analytics",
                icon: (
                    <ChartBarIcon
                    />
                ),
            },
            {
                title: t("projects"),
                url: "projects",
                icon: (
                    <FolderIcon
                    />
                ),
            },
            {
                title: t("team"),
                url: "team",
                icon: (
                    <UsersIcon
                    />
                ),
            },
        ],
    }

    return (
        <Sidebar collapsible="offcanvas" {...props}>
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton
                            asChild
                            className="data-[slot=sidebar-menu-button]:p-1.5!"
                        >
                            <Logo />
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
            <SidebarContent >
                <NavMain items={data.navMain} />
            </SidebarContent>
            <SidebarFooter>
                <NavUser user={data.user} />
            </SidebarFooter>
        </Sidebar>
    )
}
