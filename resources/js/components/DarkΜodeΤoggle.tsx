import { Moon, Sun } from "lucide-react"
import { Button } from "@/components/ui/button"
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import { useTheme } from "@/components/Theme"
import { translation } from "@/hooks/Translation";
import { motion } from "motion/react"

interface DarkModeToggleProps  {
    align?: "start" | "center" | "end";
    side?: "top" | "bottom" | "left" | "right";
    sideOffset?: number;
}

function DarkModeToggle({ align, side, sideOffset }: DarkModeToggleProps) {
    const { setTheme } = useTheme()
    const { t } = translation()
    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <Button variant="outline" className="cursor-pointer">
                    <Sun className="h-[1.2rem] w-[1.2rem] scale-100 rotate-0 transition-all dark:scale-0 dark:-rotate-90" />
                    <Moon className="absolute h-[1.2rem] w-[1.2rem] scale-0 rotate-90 transition-all dark:scale-100 dark:rotate-0" />
                    <span className="sr-only">Toggle theme</span>
                </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align={align} side={side} sideOffset={sideOffset}>
                <motion.div
                    initial={{ opacity: 0, y: -10, scale: 0.95 }}
                    animate={{ opacity: 1, y: 0, scale: 1 }}
                    exit={{ opacity: 0, y: -10, scale: 0.95 }}
                    transition={{ duration: 0.6, ease: "easeOut" }}
                >
                    <DropdownMenuItem onClick={() => setTheme("light")} className="cursor-pointer">
                        {t("theme.mode_light")}
                    </DropdownMenuItem>
                    <DropdownMenuItem onClick={() => setTheme("dark")} className="cursor-pointer">
                        {t("theme.mode_dark")}
                    </DropdownMenuItem>
                    <DropdownMenuItem onClick={() => setTheme("system")} className="cursor-pointer">
                        {t("theme.mode_system")}
                    </DropdownMenuItem>
                </motion.div>
            </DropdownMenuContent>
        </DropdownMenu>
    )
}

export default DarkModeToggle;
