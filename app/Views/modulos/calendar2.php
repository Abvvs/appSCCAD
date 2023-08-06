<!-- Layout wrapper -->
<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->
    <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-user bx-md"></i>
                    <label class="mt-3">
                        <h2>CALENDARIO</h2>
                    </label>
                </div>
            </div>
            <!-- /Search -->
        </div>
    </nav>
    <!-- / Navbar -->
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="m-5 container">
                <div id='calendar'>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var calendarEl = document.getElementById("calendar");
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: "dayGridMonth",
                        initialDate: "2023-07-07",
                        locale: "es",
                        headerToolbar: {
                            left: "prev, next, today",
                            center: "title",
                            right: "dayGridMonth,timeGridWeek,timeGridDay",
                        },
                            events: [
                                <?php
                                /* Hacer consulta a la bdd y traer datos con fechas*/
                                for ($i = 0; $i < count($trabajos); $i++) {
                                    $t = $trabajos[$i];
                                    $titulo = $t['trb_direccion'];
                                    $fechaI = $t['trb_fecha'];
                                    echo '
                                    {
                                        title:"' . $titulo . '",
                                        start:"' . $fechaI . '",
                                    },
                                    ';
                                }
                                ?>
                            ],
                        });
                    calendar.render();
                });
            </script>