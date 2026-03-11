import React from "react";
import {Link} from "@inertiajs/react";
import logo from "@/../assets/logos/logo.svg";
export default function Logo() {
    return (
        <Link href="/" className="flex items-center gap-2 text-xl font-bold">
            <img src={logo} alt="Psychanalyein logo" className="h-8 w-8" />
            Psychanalyein
        </Link>
    );
}
