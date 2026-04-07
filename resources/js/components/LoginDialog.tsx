import {
    Dialog,
    DialogTrigger,
    DialogContent,
} from "@/components/ui/dialog";
import { Button } from "@/components/ui/button";
import { LogInIcon, LogOutIcon} from "lucide-react";
import { translation } from "@/hooks/Translation";
import LoginForm from "@/common/card/Login/LoginForm";
import { Logout } from "@/hooks/Logout";
import { AuthUser } from "@/hooks/AuthUser";

function LoginDialog() {
    const { t } = translation();
    const { logout } = Logout();
    const { user, isAuthenticated } = AuthUser();

    if (isAuthenticated) {
        return (
            <Button variant="outline" onClick={logout} className="text-destructive">
                <LogOutIcon className="w-4 h-4 mr-1" />
                {t("navbar.button.logout")}
            </Button>
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

            <DialogContent className="border-none bg-transparent shadow-none ring-0 focus:ring-0 rounded-none p-0 sm:max-w-112.5">
                <LoginForm />
            </DialogContent>
        </Dialog>
    );
}

export default LoginDialog;
