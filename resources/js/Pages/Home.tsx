import { Head } from '@inertiajs/react'
import Layout from '@/Layouts/Layout'
import { ReactNode } from "react"

export default function Home() {
    return (
        <>
            <Head title="Welcome" />
            <h1 className="text-2xl font-bold">Welcome Bitch</h1>
        </>
    )
}

Home.layout = (page: ReactNode) => <Layout>{page}</Layout>
