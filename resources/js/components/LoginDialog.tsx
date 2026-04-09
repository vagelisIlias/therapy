import React from "react";
import { Button } from "@/components/ui/button";
import { LayoutDashboardIcon, LogInIcon, LogOutIcon, UserIcon} from "lucide-react";
import { Link } from "@inertiajs/react";
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import {
    Dialog,
    DialogTrigger,
    DialogContent,
} from "@/components/ui/dialog";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { translation } from "@/hooks/Translation";
import { Logout } from "@/hooks/Logout";
import { AuthUser } from "@/hooks/AuthUser";
import LoginForm from "@/common/card/Login/LoginForm";
import { motion } from "motion/react"

function LoginDialog() {
    const { t } = translation();
    const { logout } = Logout();
    const { user, isAuthenticated } = AuthUser();

    if (isAuthenticated) {
        return (
            <DropdownMenu>
                <DropdownMenuTrigger asChild>
                    <Button variant="avatar">
                        {/* Avatar */}
                        <Avatar className="h-9 w-9  cursor-pointer">
                            <AvatarImage src={user?.avatar} alt={user?.name} />
                            <AvatarFallback>{user?.name?.charAt(0)}</AvatarFallback>
                        </Avatar>
                    </Button>
                </DropdownMenuTrigger>

                {/* Dorp Down Menu */}
                <DropdownMenuContent className="w-56" align="end" side="bottom" sideOffset={20} forceMount>
                    <motion.div
                        initial={{ opacity: 0, y: -10, scale: 0.95 }}
                        animate={{ opacity: 1, y: 0, scale: 1 }}
                        exit={{ opacity: 0, y: -10, scale: 0.95 }}
                        transition={{ duration: 0.6, ease: "easeOut" }}
                    >
                    {/* Muted Label */}
                    <DropdownMenuLabel className="font-normal">
                        <div className="flex flex-col space-y-1">
                            <p className="text-sm font-medium leading-none">{user?.name}</p>
                            <p className="text-xs leading-none text-muted-foreground">{user?.email}</p>
                        </div>
                    </DropdownMenuLabel>

                    {/* Line Separator */}
                    <DropdownMenuSeparator />

                    {/* Dashboard */}
                    {(user.role === "admin" || user.role === "manager") && (
                        <DropdownMenuItem asChild>
                            <Link href='dashboard' className="cursor-pointer w-full">
                                <LayoutDashboardIcon className="mr-2 h-4 w-4" />
                                <span>{t("navbar.button.dashboard")}</span>
                            </Link>
                        </DropdownMenuItem>
                    )}

                    {/* Profile */}
                    {(user.role === "user") && (
                        <DropdownMenuItem asChild>
                            <Link href='profile/edit' className="cursor-pointer w-full">
                                <UserIcon className="mr-2 h-4 w-4" />
                                <span>{t("navbar.button.profile")}</span>
                            </Link>
                        </DropdownMenuItem>
                    )}

                    {/* Logout */}
                    <DropdownMenuItem
                        onClick={logout}
                        className="text-destructive cursor-pointer focus:text-destructive-foreground"
                    >
                        <LogOutIcon className="mr-2 h-4 w-4" />
                            <span>{t("navbar.button.logout")}</span>
                    </DropdownMenuItem>
                    </motion.div>

                    </DropdownMenuContent>
            </DropdownMenu>
        );
    }

    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button variant="outline">
                    <LogInIcon className="w-4 h-4 mr-1" />
                        {t("navbar.button.login")}
                </Button>
            </DialogTrigger>

            {/* Login Form */}
            <DialogContent className="border-none bg-transparent shadow-none ring-0 focus:ring-0 rounded-none p-0 sm:max-w-112.5">
                <LoginForm />
            </DialogContent>
        </Dialog>
    );
}

export default LoginDialog;
