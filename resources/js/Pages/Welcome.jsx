import { Link, Head } from '@inertiajs/react';
import { Button } from '@mui/material';

export default function Welcome({ auth }) {
    return (
        <div className="min-h-screen bg-slate-50"> {/* Tailwind για το background */}
            <Head title="Calm Down Therapy" />

            {/* Navbar με Tailwind Flexbox */}
            <nav className="flex items-center justify-between px-8 py-4 bg-white shadow-sm">
                <div className="text-2xl font-bold text-indigo-900">
                    Calm Down Therapy
                </div>

                <div className="space-x-4">
                    {auth.user ? (
                        <Button
                            component={Link}
                            href={route('dashboard')}
                            variant="outlined"
                            className="border-indigo-600 text-indigo-600" // Tailwind πάνω στο MUI!
                        >
                            Dashboard
                        </Button>
                    ) : (
                        <>
                            <Link href={route('login')} className="text-gray-600 hover:text-indigo-600 font-medium">
                                Είσοδος
                            </Link>
                            <Button
                                component={Link}
                                href={route('register')}
                                variant="contained"
                                className="bg-indigo-600 hover:bg-indigo-700"
                            >
                                Εγγραφή
                            </Button>
                        </>
                    )}
                </div>
            </nav>

            {/* Hero Section με Tailwind Grid */}
            <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
                <div className="text-center space-y-8">
                    <h1 className="text-5xl font-extrabold text-gray-900 tracking-tight">
                        Βρείτε την <span className="text-indigo-600">εσωτερική σας ηρεμία</span>
                    </h1>
                    <p className="max-w-2xl mx-auto text-xl text-gray-500">
                        Εξειδικευμένη ψυχολογική υποστήριξη και online ραντεβού με άμεση επιβεβαίωση.
                    </p>
                    <div className="flex justify-center gap-4">
                        <Button
                            variant="contained"
                            size="large"
                            className="h-14 px-8 bg-indigo-600 shadow-lg"
                        >
                            Κλείστε Ραντεβού
                        </Button>
                        <Button
                            variant="outlined"
                            size="large"
                            className="h-14 px-8 border-gray-300 text-gray-700"
                        >
                            Μάθετε Περισσότερα
                        </Button>
                    </div>
                </div>
            </main>
        </div>
    );
}
