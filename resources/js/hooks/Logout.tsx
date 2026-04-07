import { router } from "@inertiajs/react";

export const Logout = () => {
   const logout = () => {
       router.post("/logout");
   }

   return { logout };
};
