import {
    Dialog,
    DialogTrigger,
    DialogContent,
} from "@/components/ui/dialog";
import { Button } from "@/common/button/Button";
import { LogInIcon } from "lucide-react";
import { translation } from "@/hooks/Translation";
import LoginForm from "@/common/card/Login/LoginForm";

function LoginDialog() {
    const { t } = translation();

    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button variant="outline" className="btn-hover-effect">
                    <LogInIcon className="w-4 h-4 mr-1" />
                        {t("navbar.button.login")}
                </Button>
            </DialogTrigger>

            <DialogContent className="border-none bg-transparent shadow-none ring-0 focus:ring-0 rounded-none p-0 sm:max-w-[450px]">
                <LoginForm />
            </DialogContent>
        </Dialog>
    );
}

export default LoginDialog;

