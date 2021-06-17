<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Talkshow</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="/css/style.min.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">
    <link href="/css/fullcalendar.min.css" rel="stylesheet">
</head>

<style>

.logo-icon {
    color: #000;
    font-size: 30px;
    font-weight: bold;
    padding: 0px 20px;
}
.logout{
    padding-right: 20px;
    font-weight: bold;
    color: #fff;
}
.logout:hover{
    color: #2cabe3;
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <strong class="logo-icon">
                            <!-- Dark Logo icon -->
                            Talkshow
                        </strong>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <span class="text-white font-medium">{{ Auth::user()->name }}</span>
                            </a>
                        </li>

                        <li>
                            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="fa fa-power-off"></i>
                            </a>    
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    @if(Auth::check() && Auth::user()->role_id == '1') 
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('talks') }}"
                                aria-expanded="false">
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                                <span class="hide-menu">Talks</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('speaker') }}"
                                aria-expanded="false">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                <span class="hide-menu">Speaker</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('event') }}"
                                aria-expanded="false">
                                <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                <span class="hide-menu">Event</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('tag') }}"
                                aria-expanded="false">
                                <i class="fa fa-tag" aria-hidden="true"></i>
                                <span class="hide-menu">Tag</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('rating') }}"
                                aria-expanded="false">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="hide-menu">Rating</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('top_speaker') }}"
                                aria-expanded="false">
                                <i class="fas fa-trophy" aria-hidden="true"></i>
                                <span class="hide-menu">Top Speakers</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('sameday_talks') }}"
                                aria-expanded="false">
                                <i class="fas fa-chart-line" aria-hidden="true"></i>
                                <span class="hide-menu">Sameday Talks</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('event_talks') }}"
                                aria-expanded="false">
                                <i class="fas fa-chart-line" aria-hidden="true"></i>
                                <span class="hide-menu">Talks Per Event</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::check() && Auth::user()->role_id == '2')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('participants') }}"
                                aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Participant</span>
                            </a>
                        </li>
                        @endif
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        @yield ('content')
        @php($year=date('Y'))

                    <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> {{ $year }} © Talkshow
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app-style-switcher.js"></script>
    <script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/js/pages/dashboards/dashboard1.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>

    <script>
    $('#speaker_id').select2({
        placeholder: 'Select Speaker',
        selectOnClose: false
    });

    $('#events').select2({
        placeholder: 'Select an Event',
        selectOnClose: false
    });

    $('#participants').select2({
        placeholder: 'Select Participants',
        selectOnClose: false
    });

    $('#tags').select2({
        placeholder: 'Select Tags',
        selectOnClose: false
    });

    function load_speakers(){
        $.ajax({
            url: "{{ route('load_speakers') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $.each(data, function(key, speaker){
                        counter++;

                        var buttons = '<a href="speaker/edit/'+speaker.id+'" class="btn btn-info"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>&nbsp;&nbsp;<a href="speaker/delete/'+speaker.id+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';

                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+speaker.name+"</td>";
                        table_row += "<td class='text-center'>"+buttons+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });

                    $('#table_body').html(table_content);
                } else {
                    $('#table_body').html("<tr><td class='text-center' colspan='3'>No Speakers Found !!!</td></tr>");
                }
            },
            error: function(e){

            }
        });
    }

    function load_events(){
        $.ajax({
            url: "{{ route('load_events') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $.each(data, function(key, event){
                        counter++;

                        var buttons = '<a href="event/edit/'+event.id+'" class="btn btn-info"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>&nbsp;&nbsp;<a href="event/delete/'+event.id+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';

                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+event.name+"</td>";
                        table_row += "<td>"+event.location+"</td>";
                        table_row += "<td>"+event.date+"</td>";
                        table_row += "<td>"+event.time+"</td>";
                        table_row += "<td class='text-center'>"+buttons+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });

                    $('#table_body').html(table_content);
                } else {
                    $('#table_body').html("<tr><td class='text-center' colspan='6'>No Events Found !!!</td></tr>");
                }
            },
            error: function(e){

            }
        });
    }

    function load_tags(){
        $.ajax({
            url: "{{ route('load_tags') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $.each(data, function(key, tag){
                        counter++;

                        var buttons = '<a href="tag/edit/'+tag.id+'" class="btn btn-info"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>&nbsp;&nbsp;<a href="tag/delete/'+tag.id+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';

                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+tag.name+"</td>";
                        table_row += "<td class='text-center'>"+buttons+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });

                    $('#table_body').html(table_content);
                } else {
                    $('#table_body').html("<tr><td class='text-center' colspan='3'>No Tags Found !!!</td></tr>");
                }
            },
            error: function(e){

            }
        });
    }

    function load_ratings(){
        $.ajax({
            url: "{{ route('load_ratings') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $.each(data, function(key, rating){
                        counter++;

                        var buttons = '<a href="rating/edit/'+rating.id+'" class="btn btn-info"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>&nbsp;&nbsp;<a href="rating/delete/'+rating.id+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';

                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+rating.name+"</td>";
                        table_row += "<td>"+rating.value+"</td>";
                        table_row += "<td class='text-center'>"+buttons+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });

                    $('#table_body').html(table_content);
                } else {
                    $('#table_body').html("<tr><td class='text-center' colspan='4'>No Ratings Found !!!</td></tr>");
                }
            },
            error: function(e){

            }
        });
    }

    function load_participant_talks(){
        @php($cur_date=date('Y-m-d'))
        $.ajax({
            url: "{{ route('load_participant_talks') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                
                var events = [];
                $.each(data, function(key, talk){
                    var event = new Object();
                    event.title = talk.name;
                    event.start = talk.event.date+" "+talk.event.time;
                    event.end = talk.event.date+" "+talk.event.time;
                    event.url = "/participants/show/"+talk.id;
                    
                    events[key] = event;
                });



                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '{{ $cur_date }}',
                    defaultView: 'month',
                    editable: false,
                    events: events,
                });
            },
            error: function(e){

            }
        });
    }

    function load_talks(){
        var speaker = $('#speaker').val();
        var tag = $('#tag').val();

        $.ajax({
            url: "{{ route('search_talk') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", speaker, tag },
            success: function(data){
                if(data.talks.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $('#table_body').empty();
                    $.each(data.talks, function(key, talk){
                        counter++;
                        var rating = "";

                        if(talk.rating != null){
                            rating = parseFloat(talk.rating);
                        }

                        var selected_participants = [];

                        var talk_participants = JSON.parse(talk.participants);
                        $.each(talk_participants, function(key,participant_stored){
                            $.each(data.participants, function(key,participant){
                                if(participant.id == participant_stored){
                                    selected_participants.push(participant.name);
                                }
                            });
                        });

                        var selected_tags = [];

                        var talk_tags = JSON.parse(talk.tags);
                        $.each(talk_tags, function(key,tag_stored){
                            $.each(data.tags, function(key,tag){
                                if(tag.id == tag_stored){
                                    selected_tags.push(tag.name);
                                }
                            });
                        });

                        var buttons = '<a href="talks/edit/'+talk.id+'" class="btn btn-info"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a><a href="talks/delete/'+talk.id+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';

                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+talk.name+"</td>";
                        table_row += "<td>"+talk.title+"</td>";
                        table_row += "<td>"+talk.description+"</td>";
                        table_row += "<td>"+talk.speaker.name+"</td>";
                        table_row += "<td>"+talk.event.name+"</td>";
                        table_row += "<td>"+selected_participants.join(', ')+"</td>";
                        table_row += "<td>"+selected_tags.join(', ')+"</td>";
                        table_row += "<td class='text-center'>"+rating+"</td>";
                        table_row += "<td class='text-center'>"+buttons+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });

                    $('#table_body').html(table_content);
                } else {
                    $('#table_body').html("<tr><td class='text-center' colspan='10'>No Talks Found !!!</td></tr>");
                }
            },
            error: function(){
                $('#table_body').html("<tr><td class='text-center' colspan='10'>No Talks Found !!!</td></tr>");
            }
        });
    }

    function load_topspeakers(){
        var search_type = $('#search_type').val(); 

        $.ajax({
            url: "{{ route('load_topspeaker') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", search_type },
            success: function(data){
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $('#table_body').empty();

                    $.each(data, function(key, top){
                        counter++;
                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+top.speaker.name+"</td>";
                        table_row += "<td class='task'>"+top.name+"</td>";
                        table_row += "<td class='text-center total_task'>"+top.total_talks+"</td>";
                        table_row += "<td class='text-center rating'>"+parseFloat(top.rating)+"</td>";

                        table_row += "</tr>";

                        table_content += table_row;
                    });

                    $('#table_body').html(table_content);
                } else {
                    var colspan = 4;
                    if(search_type == 1){
                        colspan = 3;
                    }

                    $('#table_body').html("<tr><td class='text-center' colspan='"+colspan+"'>No Speakers Found !!!</td></tr>");
                }

                if(search_type == 1){
                    $('.task').hide();
                    $('.rating').hide();
                    $('.total_task').show();
                } else {
                    $('.task').show();
                    $('.rating').show();
                    $('.total_task').hide();
                }
            },
            error: function(e){
            }
        });
    }

    function load_sameday_talks(){
        $.ajax({
            url: "{{ route('load_sameday_talks') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $('#table_body').empty();

                    $.each(data, function(key, talk){
                        counter++;
                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+talk.speaker.name+"</td>";
                        table_row += "<td class='text-center'>"+talk.date+"</td>";
                        table_row += "<td class='text-center'>"+talk.total_events+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });
                    
                    $('#table_body').html(table_content);
                } else {
                    var colspan = 4;
                    if(search_type == 1){
                        colspan = 3;
                    }

                    $('#table_body').html("<tr><td class='text-center' colspan='"+colspan+"'>No Speakers Found !!!</td></tr>");
                }
            },
            error: function(e){
            }
        });
    }

    function load_event_talks(){
        $.ajax({
            url: "{{ route('load_event_talks') }}",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}" },
            success: function(data){
                console.log(data);
                if(data.length > 0){
                    var counter = 0;
                    var table_content = "";
                    $('#table_body').empty();

                    $.each(data, function(key, talk){
                        counter++;
                        var table_row = "";
                        table_row = "<tr>";
                        table_row += "<td class='text-center'>"+counter+"</td>";
                        table_row += "<td>"+talk.event.name+"</td>";
                        table_row += "<td class='text-center'>"+talk.total_talks+"</td>";
                        table_row += "</tr>";

                        table_content += table_row;
                    });
                    
                    $('#table_body').html(table_content);
                } else {
                    $('#table_body').html("<tr><td class='text-center' colspan='3'>No Talks Found !!!</td></tr>");
                }
            },
            error: function(e){
            }
        });
    }

    @error('rating_id')
        $('#ratingModal').modal('show');
    @enderror
    
    window.csrf_token = "{{ csrf_token() }}"
    </script>

    <script src="/js/app.js"></script>
</body>

</html>