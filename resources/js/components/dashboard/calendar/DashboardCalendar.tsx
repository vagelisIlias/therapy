import React, { useState } from 'react';
import { Button } from '@/components/ui/button';
import FullCalendar from '@fullcalendar/react';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import { translation } from "@/hooks/Translation";
import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog";

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

const DashboardCalendar = ({ appointments, workingSchedule }: Props) => {
    const { t } = translation();

    const [isCreateModalOpen, setIsCreateModalOpen] = useState(false);
    const [selectedRange, setSelectedRange] = useState<{ start: string, end: string } | null>(null);

    const activeSchedule = workingSchedule[0];

    const minTime = "00:00:00";
    const maxTime = "23:59:59";

    const DEFAULT_EVENT_TITLE = t("appointment");

    // Google Style Events
    const events = appointments.map(app => ({
        id: String(app.id),
        title: DEFAULT_EVENT_TITLE,
        start: app.start_time,
        end: app.end_time,
        extendedProps: { status: app.status },
        backgroundColor: app.status === 'booked' ? '#3b82f6' : '#94a3b8',
        borderColor: 'transparent',
    }));

    // Handlers
    const handleDateSelect = (selectInfo: any) => {
        setSelectedRange({ start: selectInfo.startStr, end: selectInfo.endStr });
        setIsCreateModalOpen(true);
    };

    const handleEventClick = (clickInfo: any) => {
        console.log("Details for event:", clickInfo.event.id);
        // Εδώ θα ανοίγει το View/Edit Modal
    };

    const handleEventDrop = (dropInfo: any) => {
        if (confirm(t("confirm_move_appointment"))) {
            // Εδώ θα καλείς ένα API endpoint για να τρέξει το Update στο backend
            console.log("New start:", dropInfo.event.startStr);
        } else {
            dropInfo.revert();
        }
    };

    if (!activeSchedule || !activeSchedule.start_time || !activeSchedule.end_time) {
        return (
            <div className="flex flex-col items-center justify-center p-12 bg-destructive/10 border border-destructive rounded-xl text-destructive">
                <svg className="w-12 h-12 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" />
                </svg>
                <h3 className="text-lg font-bold">Configuration Error</h3>
                <p>{t("missing_working_schedule_error")}</p>
                <Button variant="outline" className="cursor-pointer mt-4 px-4 py-2 rounded-md hover:bg-destructive/90"
                    onClick={() => window.location.reload()}
                >
                    Retry
                </Button>
            </div>
        );
    }

    return (
        <div className="p-4 bg-white rounded-xl shadow-sm border border-border calendar-google-style">
            <FullCalendar
                timeZone="local"
                plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
                initialView='timeGridWeek'
                locale={t.language}

                // Toolbar & Header
                headerToolbar={{
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }}
                dayHeaderFormat={{ weekday: 'short', day: 'numeric' }}

                // Styling & UI
                events={events}
                height="80vh"
                nowIndicator={true}
                allDaySlot={false}
                slotMinTime={minTime}
                slotMaxTime={maxTime}
                scrollTime="08:00:00"
                expandRows={true}
                stickyHeaderDates={true}

                // Interaction
                editable={true}
                selectable={true}
                selectMirror={true}
                select={handleDateSelect}
                eventClick={handleEventClick}
                eventDrop={handleEventDrop}

                // Event Appearance
                eventClassNames="rounded-md shadow-sm border-none px-2 text-xs font-semibold cursor-pointer hover:brightness-95"
                slotLabelFormat={{ hour: 'numeric', minute: '2-digit', hour12: false }}
                eventTimeFormat={{ hour: 'numeric', minute: '2-digit', hour12: false }}
            />

            <Dialog open={isCreateModalOpen} onOpenChange={setIsCreateModalOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>{t("new_appointment")}</DialogTitle>
                    </DialogHeader>
                    <div className="p-4">
                        <p>From: {selectedRange?.start}</p>
                        <p>To: {selectedRange?.end}</p>
                        {/* Εδώ βάλε το Form σου που θα καλεί το CreateAppointment */}
                    </div>
                </DialogContent>
            </Dialog>
        </div>
    );
}

export default DashboardCalendar;
