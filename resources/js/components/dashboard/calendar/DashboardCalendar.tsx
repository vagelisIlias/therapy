import React from 'react';
import FullCalendar from '@fullcalendar/react';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import { Calendar as CalendarIcon } from 'lucide-react';
import { translation } from "@/hooks/Translation";

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
    schedule: WorkingSchedule;
}

const DashboardCalendar = ({ appointments, schedule }: Props) => {

    const { t } = translation()

    const DEFAULT_CALENDAR_START = "18:00:00";
    const DEFAULT_CALENDAR_END = "22:00:00";
    const DEFAULT_SCROLL_TIME = "09:00:00";
    const DEFAULT_EVENT_TITLE = t("appointment");

    const events = appointments.map(app => ({
        id: String(app.id),
        title: DEFAULT_EVENT_TITLE,
        start: app.start_time,
        end: app.end_time,
        extendedProps: { status: app.status },
        backgroundColor: app.status === 'booked' ? '#3b82f6' : '#94a3b8',
    }));

    return (
        <div className="p-6 bg-card rounded-xl shadow-sm border border-border">
            <FullCalendar
                plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
                initialView='timeGridWeek'
                events={events}
                slotMinTime={schedule?.start_time ?? DEFAULT_CALENDAR_START}
                slotMaxTime={schedule?.end_time ?? DEFAULT_CALENDAR_END}
                scrollTime={schedule?.start_time ?? DEFAULT_SCROLL_TIME}
                allDaySlot={false}
                height="auto"
                locale="el"
            />
        </div>
    );
}

export default DashboardCalendar;
