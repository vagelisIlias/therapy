import React from "react"
import { motion, AnimatePresence } from "motion/react"
import { Link } from "@inertiajs/react"
import { Button } from "@/components/ui/button"
import DarkModeToggle from "@/components/DarkΜodeΤoggle"
import LanguageSwitcher from "@/components/LanguageSwitcher"
import {translation} from "@/hooks/Translation"
import LoginDialog from "@/components/LoginDialog"

interface NavLinkProps {
    name: string;
    href: string;
}

export default function MobileMenu({ isOpen, navLinks}: { isOpen: boolean, navLinks: NavLinkProps[] }) {
    const { t } = translation();

    return (
        <AnimatePresence>
            {/* Looping and getting all the links from NavBar dynamically */}
            {isOpen && (
                <motion.div
                    initial={{ height: 0, opacity: 0 }}
                    animate={{ height: "auto", opacity: 1 }}
                    exit={{ height: 0, opacity: 0 }}
                   transition={{ type: "spring", duration: 0.7, bounce: 0.5 }}
                    className="overflow-hidden mt-4 flex flex-col gap-6 items-center lg:hidden"
                >
                    {/* Links Loop */}
                    <div className="flex flex-col gap-4 items-center">
                            {navLinks.map((link, i) => (
                            <motion.div
                                key={link.name}
                                initial={{ opacity: 0, y: 10 }}
                                animate={{ opacity: 1, y: 0 }}
                                transition={{ delay: i * 0.1 }}
                            >
                                <Link href={link.href} className="underline-hover">
                                    {link.name}
                                </Link>
                            </motion.div>
                        ))}
                    </div>

                    {/* Line separator */}
                    <motion.div
                        initial={{ scaleX: 0 }}
                        animate={{ scaleX: 1 }}
                        className="w-full h-px bg-border max-w-50"
                    />

                    {/* Appointment */}
                    <motion.div
                        initial={{ y: -20, opacity: 0 }}
                        animate={{ y: 0, opacity: 1 }}
                        transition={{ delay: navLinks.length * 0.1 }}
                        className="flex flex-col gap-5 items-center w-full"
                    >
                        <Button variant="outline" className="w-50 h-11 rounded-full">
                            {t("navbar.button.appointment")}
                        </Button>

                        {/* Language & Theme Login */}
                        <div className="flex items-center gap-6">
                            <LanguageSwitcher align="start" side="bottom" sideOffset={20}/>
                            <DarkModeToggle align="center"side="bottom" sideOffset={20} />
                            <LoginDialog />
                        </div>
                    </motion.div>
                </motion.div>
            )}
        </AnimatePresence>
    )
}
