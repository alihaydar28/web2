@extends('layout')
@section('content')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <div class="container">
    <aside>
    </aside>
    <main>
        <div class="timetable" id="timetable">
            <br>
            <h2>Attendance: (Absences)</h2>
            <br>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>Day and Time</th>

                    </tr>
                </thead>
                <tbody>
                        <@php
                            $i=1;
                        @endphp
                       @foreach ($attendance as $att)
                        <tr>
                            <td class="nowrap">{{$i}}</td>
                            <td class="nowrap">{{ $att->CourseClass->course->CourseName }}</td>
                            <td class="nowrap">
                                {{ substr($att->CourseClass->ClassDay, 0, 3) . ' ' . \Carbon\Carbon::createFromFormat('H:i:s', $att->CourseClass->ClassTime)->format('g:i A') }}
                            </td>

                        </tr>
                        <@php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>

    <div class="right" style="max-width: 300px">
    </div>
    </div>



@endsection






<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 50px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    td.nowrap {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    a {
        display: contents;
        text-decoration: none;

    }

    p {
        font-size: 15px;
        display: contents;
    }

    b {
        display: contents;
    }

    .statuss {
        padding: 5px;
        border-radius: 20%;

    }
</style>
