// import React from 'react'
// import FullCalendar from '@fullcalendar/react'
// import dayGridPlugin from '@fullcalendar/daygrid'
// import timeGridPlugin from '@fullcalendar/timegrid'
// import interactionPlugin from '@fullcalendar/interaction'
// import elLocale from '@fullcalendar/core/locales/el'
// import enLocale from '@fullcalendar/core/locales/en-gb'
// import { Card } from "@/components/ui/card"
// import { translation } from "@/hooks/Translation";

// export default function AdminCalendar() {
//     const { t } = translation();

//     const handleDateSelect = (selectInfo: any) => {
//         const title = prompt(t("calendar.create.appointment.event"));
//         const calendarApi = selectInfo.view.calendar

//         calendarApi.unselect()

//         if (title) {
//             calendarApi.addEvent({
//                 id: String(Date.now()),
//                 title,
//                 start: selectInfo.startStr,
//                 end: selectInfo.endStr,
//                 allDay: selectInfo.allDay,
//             })
//         }
//     }

//     return (
//         <Card className="p-6 shadow-lg border-border bg-card">
//             <div className="admin-calendar-container">
//                 <FullCalendar
//                     plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
//                     // Εδώ περνάμε τη λίστα με τα διαθέσιμα locales
//                     locales={[elLocale, enLocale]}
//                     // Και εδώ την τρέχουσα γλώσσα δυναμικά
//                     locale={t}
//                     headerToolbar={{
//                         left: 'prev,next today',
//                         center: 'title',
//                         right: 'dayGridMonth,timeGridWeek,timeGridDay'
//                     }}
//                     initialView="timeGridWeek"
//                     editable={true}
//                     selectable={true}
//                     selectMirror={true}
//                     dayMaxEvents={true}
//                     weekends={true}
//                     nowIndicator={true}
//                     select={handleDateSelect}
//                     events={[
//                         { id: '1', title: t("calendar.event.google_sync"), start: new Date().toISOString() }
//                     ]}
//                     height="auto"
//                 />
//             </div>
//         </Card>
//     )
// }
