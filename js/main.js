// (c)2018 Keegan Harris
// Using TimeLine jquery plugin for scheduling
$(function () {
  
  $('#timelineClock').timespace({
    selectedEvent: -1,
    data: {
      headings: [
        {start: 0, end: 6, title: 'Night'},
        {start: 6, end: 12, title: 'Morning'},
        {start: 12, end: 18, title: 'Afternoon'},
        {start: 18, end: 24, title: 'Evening'},
      ],
      events: [
        {start: 6.50, end: 7.50, title: 'Meeting 1', description: 'Some random meeting.'},
        {start: 8, end: 10, title: 'Walk', description: 'Go for a walk.'},
        {start: 14, title: 'Lunch', description: 'Eat a healthy lunch.'},
        {start: 14.75, title: 'Confirm Appointment', noDetails: true},
        {start: 14.75, title: 'Bring Supplies'},
      ]
    }
  });
});