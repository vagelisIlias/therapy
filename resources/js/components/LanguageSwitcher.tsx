import { Button } from "@/components/ui/button"
import { usePage, router } from "@inertiajs/react";

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import { motion } from "motion/react"

interface LanguageSwitcherProps {
    align?: "start" | "center" | "end";
    side?: "top" | "bottom" | "left" | "right";
    sideOffset?: number;
}

const languages = [
    { code: "en", name: "English", flag: "🇬🇧" },
    { code: "el", name: "Greek", flag: "🇬🇷" },
]

export default function LanguageSwitcher({ align, side, sideOffset }: LanguageSwitcherProps) {
    const { locale } = usePage().props;

    const handleChangeLanguage = (code: string) => {
        router.get(`/${code}`);
    }

    const currentLanguage = languages.find(lang => lang.code === locale) || languages[0];

    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <Button variant="outline" className="cursor-pointer">
                    <span className="mr-2">{currentLanguage.flag}</span>
                    {currentLanguage.code.toUpperCase()}
                </Button>
            </DropdownMenuTrigger>

            <DropdownMenuContent align={align} side={side} sideOffset={sideOffset}>
                <motion.div
                    initial={{ opacity: 0, y: -10, scale: 0.95 }}
                    animate={{ opacity: 1, y: 0, scale: 1 }}
                    exit={{ opacity: 0, y: -10, scale: 0.95 }}
                    transition={{ duration: 0.6, ease: "easeOut" }}
                >
                    {languages.map(lang => (
                        <DropdownMenuItem
                            className="cursor-pointer"
                            key={lang.code}
                            onClick={() => handleChangeLanguage(lang.code)}
                        >
                            <span className="mr-2">{lang.flag}</span> {lang.name}
                        </DropdownMenuItem>
                    ))}
                </motion.div>
            </DropdownMenuContent>
        </DropdownMenu>
    )
}
