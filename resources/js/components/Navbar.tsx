import React from "react";
import { Link } from "@inertiajs/react";
import { Button } from "@/common/button/Button";
import { ModeToggle } from "@/components/ΜodeΤoggle";
import Language from "@/components/Language";
import { LogInIcon } from "lucide-react"

export default function Navbar() {
    return (
        <nav className="mx-auto flex items-center justify-between p-6 bg-background">
            {/* Logo */}
            <Link href="/" className="text-2xl font-bold">
                Psychanalyein
            </Link>

            {/* Links */}
            <div className="flex items-center gap-8">
                <Link href="/" className="underline-hover">Home</Link>
                <Link href="/about" className="underline-hover">About</Link>
                <Link href="/posts" className="underline-hover">Posts</Link>
                <Link href="/more" className="underline-hover">More</Link>
            </div>

            {/* Buttons */}
            <div className="flex items-center gap-3">
                <Button size="sm" variant="outline" className="flex items-center gap-2 btn-hover-effect" >Book Your Appointment</Button>
                <Language />
                <ModeToggle />
                <Link href="/login">
                    <Button size="sm" variant="outline" className="flex items-center gap-2 btn-hover-effect">
                        <LogInIcon className="w-4 h-4" />
                            Login
                    </Button>
                </Link>
            </div>
        </nav>
    );
}
