import DashboardLayout from "@/layouts/DashboardLayout";
import DashboardCalendar from "@/components/dashboard/calendar/DashboardCalendar";

type Status = 'booked' | 'cancelled' | 'completed';

interface Appointments {
    id: number,
    user_id: number,
    start_time: string,
    end_time: string,
    status: Status
}

interface WorkingSchedule {
    day_of_week: number,
    start_time: string,
    end_time: string,
    is_open: boolean
}

interface Props {
    appointments: Appointments[];
    workingSchedule: WorkingSchedule[];
}

export default function Calendar({ appointments, workingSchedule }: Props) {
    return (
        <DashboardLayout>
            <div className="flex flex-col gap-4 py-4">
                <DashboardCalendar
                    appointments={appointments}
                    workingSchedule={workingSchedule}
                />
            </div>
        </DashboardLayout>
    );
}
