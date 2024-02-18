@extends('layouts.user.app')

@push('page_style')
    <link href="{{ secure_asset('user-template/plugins/fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
@endpush

@section('content')
    <section class=" fullscreen" data-bg-parallax="{{ secure_asset('user-template/images/parallax/14.jpg') }}">
        <div class="bg-overlay"></div>
        <div class="shape-divider" data-style="1" data-height="300"></div>
        <div class="container">
            <div class="text-center">
                <div class="heading-text text-light col-lg-12">
                    <p>Polo is jam packed with tons of features that will give you the power to create the web
                        as you always wanted.</p>
                    <a href="{{ route('book') }}" class="btn btn-light btn-rounded btn-lg">Book now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section id="page-content" class="no-sidebar">
        <div class="container">
            <!-- Calendar -->
            <div class="row mb-5">
                <div class="col-lg-6">
                    <h4>Booking List</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- end: Calendar -->
        </div>
    </section>
    <!-- end: Page Content -->
@endsection

@push('page_script')
    <script src={{ secure_asset('user-template/plugins/moment/moment.min.js') }}></script>
    <script src={{ secure_asset('user-template/plugins/fullcalendar/fullcalendar.min.js') }}></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay,listWeek,month'
                },
                // customize the button names,
                // otherwise they'd all just say "list"
                views: {
                    listDay: {
                        buttonText: 'list day'
                    },
                    listWeek: {
                        buttonText: 'list week'
                    }
                },
                defaultView: 'listWeek',
                defaultDate: new Date(),
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: false, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2021-09-23',
                    },
                    {
                        title: 'Long Event',
                        start: '2021-09-21',
                        end: '2021-09-22',
                        className: 'fc-event-primary'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2021-09-18T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2021-09-17T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2021-09-11',
                        end: '2021-09-13',
                        className: 'fc-event-warning',
                    },
                    {
                        title: 'Meeting',
                        start: '2021-09-20T10:30:00',
                        end: '2021-09-20T12:30:00',
                        className: 'fc-event-success'
                    },
                    {
                        title: 'Lunch',
                        start: '2021-09-20T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2021-09-20T14:30:00',
                        className: 'fc-event-info'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2021-09-20T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2021-09-20T20:00:00',
                        className: 'fc-event-success'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2021-09-13T07:00:00',
                        className: 'fc-event-danger'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2021-09-28',
                        className: 'fc-event-info'
                    }
                ]
            });
        });
    </script>
@endpush
