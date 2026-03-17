import { usePage } from '@inertiajs/react'
import DashboardLayout from "@/layouts/DashboardLayout";

interface AuthUser {
  id: number,
  name: string,
  email: string,
  role: 'admin' | 'customer' | 'user'
}

function Dashboard({ }) {
  const { auth } = usePage<{ auth: { user: AuthUser | null } }>().props;
  return (
    <DashboardLayout>
      <div className="text-center">
        <h1 className="text-2xl font-bold">Admin Panel</h1>
        <p>Γεια σου, {auth.user?.name}!</p>
      </div>
    </DashboardLayout>
  )
}

export default Dashboard;
