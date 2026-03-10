import { Dialog, DialogTrigger, DialogContent, DialogHeader, DialogTitle, DialogDescription, DialogFooter, DialogClose } from "@/shadcn/dialog";
import { Button } from "@/common/button/Button";

function LoginDialog() {
    const handleGoogleLogin = () => {
        window.location.href = "/auth/google";
    };

    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button>Login</Button>
            </DialogTrigger>
            <DialogContent className="sm:max-w-sm">
                <DialogHeader>
                    <DialogTitle>Login</DialogTitle>
                    <DialogDescription>
                        Sign in with your Google account.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter>
                    <Button onClick={handleGoogleLogin}>Login with Google</Button>
                    <DialogClose className="ml-2">Cancel</DialogClose>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}

export default LoginDialog;
