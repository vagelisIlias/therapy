import React, { useState } from "react"
import { Link } from "@inertiajs/react"
import { Button } from "@/components/ui/button"
import DarkModeToggle from "@/components/DarkΜodeΤoggle"
import LanguageSwitcher from "@/components/LanguageSwitcher"
import Logo from "@/components/Logo";
import BurgerButton from "@/components/mobile/Burger/BurgerButton"
import MobileMenu from "@/components/mobile/Burger/MobileMenu"
import { translation } from "@/hooks/Translation"
import LoginDialog from "@/components/LoginDialog"

export default function Navbar() {
    const [isOpen, setIsOpen] = useState(false);
    const { t } = translation();
    const navLinks = [
        { name: t("navbar.link_home"), href: "/" },
        { name: t("navbar.link_posts"), href: "/posts" },
        { name: t("navbar.link_contact"), href: "/contact" },
    ];

    return (
        <nav className="mx-auto p-6 bg-background">
            <div className="flex items-center justify-between">
                {/* Logo */}
                <Logo />

                {/* Looping all the NavLinks */}
                <div className="hidden lg:flex items-center gap-8">
                    {navLinks.map(link => (
                        <Link key={link.name} href={link.href} className="underline-hover">
                            {link.name}
                        </Link>
                    ))}
                </div>

                {/* Appointment */}
                <div className="hidden lg:flex items-center gap-3">
                    <Button variant="outline" className="cursor-pointer">
                        {t("navbar.button_appointment")}
                    </Button>

                    {/* Language Switcher, DarkModeToggle, LoginDialog */}
                    <LanguageSwitcher align="center" side="bottom" sideOffset={15}/>
                    <DarkModeToggle align="end"side="bottom" sideOffset={15}/>
                    <LoginDialog />
                </div>

                {/* Burger Button */}
                <BurgerButton isOpen={isOpen} setIsOpen={setIsOpen} />
            </div>

            {/* Mobile Menu after burger is open */}
            <MobileMenu isOpen={isOpen} navLinks={navLinks} />
        </nav>
    );
}
