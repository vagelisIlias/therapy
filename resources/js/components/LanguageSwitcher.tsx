import React from "react"
import { Button } from "@/common/button/Button"
import { usePage, router } from "@inertiajs/react";

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"

const languages = [
    { code: "en", name: "English", flag: "🇬🇧" },
    { code: "el", name: "Ελληνικά", flag: "🇬🇷" },
]

export default function LanguageSwitcher() {
    const { locale } = usePage().props as any;

    const handleChangeLanguage = (code: string) => {
        router.get(`/${code}`);
    }

    const currentLanguage = languages.find(lang => lang.code === locale) || languages[0];

    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <Button variant="outline" className="btn-hover-effect">
                    <span className="mr-2">{currentLanguage.flag}</span>
                    {currentLanguage.code.toUpperCase()}
                </Button>
            </DropdownMenuTrigger>

            <DropdownMenuContent align="end">
                {languages.map(lang => (
                    <DropdownMenuItem
                        key={lang.code}
                        onClick={() => handleChangeLanguage(lang.code)}
                    >
                        <span className="mr-2">{lang.flag}</span> {lang.name}
                    </DropdownMenuItem>
                ))}
            </DropdownMenuContent>
        </DropdownMenu>
    )
}
