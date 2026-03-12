// import {
//     Dialog,
//     DialogTrigger,
//     DialogContent,
//     DialogHeader,
//     DialogTitle,
//     DialogDescription,
//     DialogFooter,
//     DialogClose
// } from "@/shadcn/dialog";
// import { Button } from "@/common/button/Button";
//
// function LoginDialog() {
//     const handleGoogleLogin = () => {
//         window.location.href = "/auth/google";
//     };
//
//     return (
//         <Dialog>
//             <DialogTrigger asChild>
//                 <Button>Login</Button>
//             </DialogTrigger>
//             <DialogContent className="sm:max-w-sm">
//                 <DialogHeader>
//                     <DialogTitle>Login</DialogTitle>
//                     <DialogDescription>
//                         Sign in with your Google account.
//                     </DialogDescription>
//                 </DialogHeader>
//                 <DialogFooter>
//                     <Button onClick={handleGoogleLogin}>Login with Google</Button>
//                     <DialogClose className="ml-2">Cancel</DialogClose>
//                 </DialogFooter>
//             </DialogContent>
//         </Dialog>
//     );
// }
//
// export default LoginDialog;




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

function LoginDialog() {
    const { t } = translation();

    const handleGoogleLogin = () => {
        window.location.href = "/auth/redirect";
    };

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
                    {/* Εδώ μπορείς να βάλεις ένα ωραίο Google Icon αν έχεις */}
                    <Button onClick={handleGoogleLogin} className="w-full">
                        Login with Google
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
