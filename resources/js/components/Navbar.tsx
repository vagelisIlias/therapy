import React, { useState } from "react";
import {Link, usePage} from "@inertiajs/react";
import { Button } from "@/common/button/Button";
import { DarkModeToggle } from "@/components/DarkΜodeΤoggle";
import LanguageSwitcher from "@/components/LanguageSwitcher";
import { LogInIcon } from "lucide-react";
import Logo from "@/components/Logo";
import BurgerButton from "@/common/mobile/Burger/BurgerButton";
import MobileMenu from "@/common/mobile/Burger/MobileMenu";
import { translation } from "@/hooks/translation";

export default function Navbar() {
    const [isOpen, setIsOpen] = useState(false);
    const { t } = translation();
    const navLinks = [
        { name: t("navbar.links.home"), href: "/" },
        { name: t("navbar.links.posts"), href: "/posts" },
        { name: t("navbar.links.contact"), href: "/contact" },
    ];

    return (
        <nav className="mx-auto p-6 bg-background">
            <div className="flex items-center justify-between">
                <Logo />

                <div className="hidden lg:flex items-center gap-8">
                    {navLinks.map(link => (
                        <Link key={link.name} href={link.href} className="underline-hover">
                            {link.name}
                        </Link>
                    ))}
                </div>

                <div className="hidden lg:flex items-center gap-3">
                    <Button variant="outline" className="btn-hover-effect">
                        {t("navbar.buttons.appointment")}
                    </Button>

                    <LanguageSwitcher />
                    <DarkModeToggle />

                    <Link href="/login">
                        <Button variant="outline" className="btn-hover-effect">
                            <LogInIcon className="w-4 h-4 mr-1" />
                            {t("navbar.buttons.login")}
                        </Button>
                    </Link>
                </div>

                <BurgerButton isOpen={isOpen} setIsOpen={setIsOpen} />
            </div>

            <MobileMenu isOpen={isOpen} navLinks={navLinks} />
        </nav>
    );
}
