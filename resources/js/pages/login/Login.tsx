import {
    Dialog,
    DialogContent,
    DialogTrigger,
    DialogTitle,
    DialogDescription,
    DialogHeader,
    DialogFooter,
    DialogClose
} from "@/shadcn/dialog";
import React from "react";
import { Button } from "@/common/button/Button";
import {Field, FieldGroup} from "@/shadcn/field";
import { Input } from "@/shadcn/input"
import { Label } from "@/shadcn/label"

export function Login() {
    const handleGoogleLogin = () => {
        // window.location.href = "/auth/google";
    };

    return (
        <Dialog>
            <form>
                <DialogTrigger />
                <DialogContent className="sm:max-w-sm">
                    <DialogHeader>
                        <DialogTitle>Edit profile</DialogTitle>
                        <DialogDescription>
                            Make changes to your profile here. Click save when you&apos;re
                            done.
                        </DialogDescription>
                    </DialogHeader>
                    <FieldGroup>
                        <Field>
                            <Label htmlFor="name-1">Name</Label>
                            <Input id="name-1" name="name" defaultValue="Pedro Duarte" />
                        </Field>
                        <Field>
                            <Label htmlFor="username-1">Username</Label>
                            <Input id="username-1" name="username" defaultValue="@peduarte" />
                        </Field>
                    </FieldGroup>
                    <DialogFooter>
                        <DialogClose />
                        <Button type="submit">Save changes</Button>
                    </DialogFooter>
                </DialogContent>
            </form>
        </Dialog>
    );
}

export default Login;
