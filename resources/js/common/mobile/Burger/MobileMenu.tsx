import React from "react";
import { motion, AnimatePresence } from "motion/react";
import { Link } from "@inertiajs/react";
import { Button } from "@/common/button/Button";
import { DarkModeToggle } from "@/components/DarkΜodeΤoggle";
import LanguageSwitcher from "@/components/LanguageSwitcher";
import { LogInIcon } from "lucide-react";
import {translation} from "@/hooks/Translation";
import LoginDialog from "@/components/LoginDialog";

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
                    transition={{ duration: 0.4 }}
                    className="overflow-hidden mt-4 flex flex-col gap-5 items-center lg:hidden"
                >
                    {navLinks.map((link, i) => (
                        <motion.div
                            key={link.name}
                            initial={{ x: -20, opacity: 0 }}
                            animate={{ x: 0, opacity: 1 }}
                            transition={{ delay: i * 0.05 }}
                        >
                            <Link href={link.href} className="underline-hover">
                                {link.name}
                            </Link>
                        </motion.div>
                    ))}

                    {/* Appointment */}
                    <motion.div
                        initial={{ y: -20, opacity: 0 }}
                        animate={{ y: 0, opacity: 1 }}
                        transition={{ delay: navLinks.length * 0.1 }}
                    >
                        <Button variant="outline" className="btn-hover-effect">{t("navbar.button.appointment")}</Button>
                    </motion.div>

                    {/* Language && Dark Them Toggle */}
                    <motion.div
                        className="flex items-center gap-3"
                        initial={{ y: -20, opacity: 0 }}
                        animate={{ y: 0, opacity: 1 }}
                        transition={{ delay: (navLinks.length + 1) * 0.1 }}
                    >
                        <LanguageSwitcher />
                        <DarkModeToggle />
                    </motion.div>

                    {/* Login */}
                    <motion.div
                        initial={{ y: -20, opacity: 0 }}
                        animate={{ y: 0, opacity: 1 }}
                        transition={{ delay: (navLinks.length + 2) * 0.1 }}
                    >
                        <LoginDialog />
                    </motion.div>
                </motion.div>
            )}
        </AnimatePresence>
    )
}
