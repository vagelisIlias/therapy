import { usePage } from "@inertiajs/react";

type UserRole = "admin" | "manager" | "user";

interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    role: UserRole;
}

interface AuthProps {
    auth: {
        user: User;
        isAuthenticated: boolean;
    };
    [key: string]: any;

}

export const AuthUser = () => {
   const { props } = usePage<AuthProps>();

   const user = props.auth.user;
   const isAuthenticated = !!user;

    return {
        user,
        isAuthenticated,
    }
};
