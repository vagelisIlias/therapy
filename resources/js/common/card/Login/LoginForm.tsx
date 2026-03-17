import { cn } from "@/lib/utils"
import { Button } from "@/common/button/Button"
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/shadcn/card"
import { GoogleAuthRedirect } from "@/hooks/GoogleAuthRedirect"
import { translation } from "@/hooks/Translation"
import { motion } from "framer-motion"

export default function LoginForm({ className, ...props }: React.ComponentProps<"div">) {
    const { t } = translation();
    const { login } = GoogleAuthRedirect();

    return (
        <div className={cn("flex flex-col gap-6", className)} {...props}>
            <Card className="shadow-2xl rounded-lg overflow-hidden min-h-[500px] flex flex-col justify-center p-8">
                <CardHeader className="text-center pb-8">
                    <CardTitle className="text-3xl">
                        {t('welcome')}
                    </CardTitle>
                    <CardDescription className="text-base mt-2">
                        {t('auth.login.title')}
                    </CardDescription>
                </CardHeader>

                <CardContent className="flex flex-col gap-8">
                    <div className="flex flex-col gap-4">
                        <Button
                            onClick={login}
                            variant="outline"
                            className="btn-hover-effect w-full h-12 text-lg rounded-full border-2"
                        >
                            <svg className="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z" fill="currentColor"/>
                            </svg>
                            {t('auth.login.google_button')}
                        </Button>
                    </div>

                    <div className="relative">
                        <div className="absolute inset-0 flex items-center">
                            <span className="w-full border-t border-border" />
                        </div>
                        <div className="relative flex justify-center text-xs uppercase">
                            <span className="px-2 text-muted-foreground opacity-50">{t("secure.access")}</span>
                        </div>
                    </div>
                </CardContent>
            </Card>

            <p className="text-center text-xs text-muted-foreground px-8">
                By clicking continue, you agree to our <a href="#" className="underline">Terms</a>.
            </p>
        </div>
    )
}
