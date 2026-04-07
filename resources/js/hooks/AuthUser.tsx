import { usePage } from "@inertiajs/react";

interface User {
    name: string;
    email: string;
    avatar?: string;
}

interface AuthProps {
    auth: {user: User };
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
