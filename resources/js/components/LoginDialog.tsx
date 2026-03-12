import {
    Dialog,
    DialogTrigger,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogDescription,
    DialogFooter,
    DialogClose
} from "@/shadcn/dialog";
import { Button } from "@/common/button/Button";
import { LogInIcon } from "lucide-react";
import { translation } from "@/hooks/Translation";
import {GoogleAuthRedirect} from "@/hooks/GoogleAuthRedirect";

function LoginDialog() {
    const { t } = translation();
    const { login } = GoogleAuthRedirect();

    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button variant="outline" className="btn-hover-effect">
                    <LogInIcon className="w-4 h-4 mr-1" />
                    {t("navbar.buttons.login")}
                </Button>
            </DialogTrigger>

            <DialogContent className="sm:max-w-sm">
                <DialogHeader>
                    <DialogTitle>{t("auth.login.title")}</DialogTitle>
                    <DialogDescription>
                        Sign in with your Google account to continue.
                    </DialogDescription>
                </DialogHeader>

                <div className="flex justify-center py-4">
                    <Button onClick={login} className="w-full">
                        {t('')}
                    </Button>
                </div>

                <DialogFooter className="sm:justify-start">
                    <DialogClose asChild>
                        <Button type="button" variant="secondary">
                            Cancel
                        </Button>
                    </DialogClose>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}

export default LoginDialog;
