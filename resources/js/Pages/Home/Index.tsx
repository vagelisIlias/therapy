import { Head } from '@inertiajs/react'
import Layout from '@/Layouts/Layout'
import { ReactNode, ReactElement } from 'react'

export default function Index() {
    return (
        <>
            <Head title="Welcome" />
            <h1 className="text-2xl font-bold">Welcome Bitch</h1>
        </>
    )
}

Index.layout = (page: ReactNode) => <Layout>{page}</Layout>
