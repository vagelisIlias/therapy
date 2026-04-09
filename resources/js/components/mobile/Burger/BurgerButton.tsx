import React from "react";
import { MenuIcon, XIcon } from "lucide-react";

export default function BurgerButton({ isOpen, setIsOpen }: { isOpen: boolean, setIsOpen: React.Dispatch<React.SetStateAction<boolean>> }) {
    return (
        <button
            onClick={() => setIsOpen(!isOpen)}
            className="lg:hidden p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
        >
            {isOpen ? <XIcon className="w-6 h-6" /> : <MenuIcon className="w-6 h-6" />}
        </button>
    )
}
