<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4" style="color: #73a1b2">Sugeng Rawuh!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Schedule
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="left">
                            <div class="calendar">
                                <div class="month">
                                    <i class="fas fa-angle-left prev"></i>
                                    <div class="date">december 2015</div>
                                    <i class="fas fa-angle-right next"></i>
                                </div>
                                <div class="weekdays">
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                <div class="days"></div>
                                <div class="goto-today">
                                    <div class="goto">
                                        <input type="text" placeholder="mm/yyyy" class="date-input" />
                                        <button class="goto-btn">Go</button>
                                    </div>
                                    <button class="today-btn">Today</button>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="today-date">
                                <div class="event-day">wed</div>
                                <div class="event-date">12th december 2022</div>
                            </div>
                            <div class="events"></div>
                            <div class="add-event-wrapper">
                                <div class="add-event-header">
                                    <div class="title">Add Event</div>
                                    <i class="fas fa-times close"></i>
                                </div>
                                <div class="add-event-body">
                                    <div class="add-event-input">
                                        <input type="text" placeholder="Event Name" class="event-name" />
                                    </div>
                                    <div class="add-event-input">
                                        <input type="text" placeholder="Event Time From" class="event-time-from" />
                                    </div>
                                    <div class="add-event-input">
                                        <input type="text" placeholder="Event Time To" class="event-time-to" />
                                    </div>
                                </div>
                                <div class="add-event-footer">
                                    <button class="add-event-btn">Add Event</button>
                                </div>
                            </div>
                        </div>
                        <button class="add-event">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>