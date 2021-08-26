<div class="sidebar clearfix">

    <ul class="sidebar-panel nav flex-column">
        <li class="sidetitle">MAIN</li>
        <li>
            <a href="{{route('users.index')}}">
                <span class="icon color7">
                    <i class="fa fa-users"></i>
                </span>
                Users
                <span class="label label-default">
                    {{ App\User::all()->count() }}
                </span>
            </a>
        </li>
        <li>
            <a href="{{route('tasks.index')}}">
                <span class="icon color7">
                    <i class="fa fa-briefcase"></i>
                </span>
                Tasks
                <span class="label label-default">
                    {{ App\Tasks::all()->count() }}
                </span>
            </a>
        </li>
    </ul>

</div>