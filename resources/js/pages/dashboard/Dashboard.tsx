import Layout from '@/pages/layouts/Layout'
import {Head, usePage} from '@inertiajs/react'

interface AuthUser {
    id: number,
    name: string,
    email: string,
    role: 'admin' | 'customer' | 'user'
}

function Dashboard({}) {
    const { auth } = usePage<{ auth: { user: AuthUser | null } }>().props;
    return (
        <Layout auth={auth}>
            <Head title="Index"/>
        </Layout>
    )
}

export default Dashboard;
