import { Head, usePage } from '@inertiajs/react'
import Layout from '@/pages/layouts/Layout'

interface AuthUser {
    id: number,
    name: string,
    email: string,
    role: 'admin' | 'customer' | 'user'
}

function Home() {
    const { auth } = usePage<{ auth: { user: AuthUser | null } }>().props;

    return (
        <Layout auth={auth}>
            <h1>Welcome {auth.user?.name }!</h1>
        </Layout>
    );
}

export default Home;
