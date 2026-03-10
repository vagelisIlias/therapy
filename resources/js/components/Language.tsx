import React, {useState} from "react"
import { Button } from "@/common/button/Button"
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/shadcn/dropdown-menu"

export default function Language() {

    const [language, setLanguage] = useState("en")
    const changeLanguage = (lang: string) => {
        setLanguage(lang)
        console.log("language: ", lang)
    }

    const languageLabel = language === "en" ? "🇬🇧 EN" : "🇬🇷 EL"
    return (
       <DropdownMenu>
           <DropdownMenuTrigger asChild>
               <Button size="sm" variant="outline" className="btn-hover-effect">
                   {languageLabel}
               </Button>
           </DropdownMenuTrigger>

           <DropdownMenuContent align="end">
               <DropdownMenuItem onClick={() => changeLanguage("en")}>
                   🇬🇧 English
               </DropdownMenuItem>

               <DropdownMenuItem onClick={() => changeLanguage("el")}>
                   🇬🇷 Greek
               </DropdownMenuItem>
           </DropdownMenuContent>
       </DropdownMenu>
    );
}
