export const GoogleAuthRedirect = () => {
    const login = () => {
        window.location.href = "/auth/redirect";
    }

    return { login };
};
