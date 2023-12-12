@extends('layout')
@section('content')
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img src="{{ asset('assets/images/profile-1.jpg') }}" alt="">
                    </div>
                    <div class="info">
                        <p><b>{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</b> </p>
                        <small class="text-muted">student Id : {{ auth()->user()->id }}</small>
                    </div>
                </div>
                <div class="about">
                    <h2>Profile</h2>
                    <p>BTech. Computer Science & Engineering</p>
                    <h5>DOB</h5>
                    <p>{{ auth()->user()->dateofbirth }}</p>
                    <h5>Contact</h5>
                    <p>{{ auth()->user()->phone }}</p>
                    <p>{{ auth()->user()->email }}</p>
                    <p>{{ auth()->user()->current_address }}</p>

                </div>
            </div>
        </aside>

        <main>
            <h1>All My Classes</h1>
            <div class="subjects">
                @forelse ($classes as $class)
                    <div class="eg">
                        <span class="material-icons-sharp">architecture</span>
                        <h3>{{ $class->Course->CourseName }}</h3>
                        <h4>{{ $class->ClassName }}</h4>
                        <small class="text-muted">
                            {{ substr($class->ClassDay, 0, 3) . ' ' . \Carbon\Carbon::createFromFormat('H:i:s', $class->ClassTime)->format('g:i A') }}
                        </small>
                        <small class="text-muted">location: {{ $class->ClassLocation }}</small>
                    </div>
                @empty
                    <div class="eg">
                        <h3>No class found</h3>
                    </div>
                @endforelse
            </div>

            <div class="timetable" id="timetable">
                <div>
                    <h2>Today's Classes</h2>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Time and day</th>
                            <th>Room</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classes as $class)
                            @if (date('l') == $class->ClassDay)
                                <tr>
                                    <td>{{ $class->Course->CourseName }}</td>
                                    <td>{{ $class->ClassName }}</td>
                                    <td>{{ substr($class->ClassDay, 0, 3) }}
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $class->ClassTime)->format('g:i A') }}
                                    </td>
                                    <td>{{ $class->ClassLocation }}</td>
                                    <td></td> <!-- You can add more columns as needed -->
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4">No classes found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </main>

        <div class="right">
            <div class="announcements">
                <h2>Latest Workshops</h2>
                <div class="updates">
                    <div class="message">
                        <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                        <small class="text-muted">2 Minutes Ago</small>
                    </div>

                </div>
            </div>

            <div class="leaves">
                <h2>Teachers on leave</h2>
                <div class="teacher">
                    <div class="profile-photo"><img src="{{ asset('assets/images/profile-2.jpeg') }}" alt=""></div>
                    <div class="info">
                        <h3>The Professor</h3>
                        <small class="text-muted">Full Day</small>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
