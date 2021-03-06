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
        <li>
            <a href="{{route('roles.index')}}">
                <span class="icon color7">
                    <i class="fa fa-tag"></i>
                </span>
                Roles
                <span class="label label-default">
                    {{ App\Role::all()->count() }}
                </span>
            </a>
        </li>
        <li>
            <a href="{{route('tv_plans.index')}}">
                <span class="icon color7">
                    <i class="fa fa-eye"></i>
                </span>
                Planos de TV
                <span class="label label-default">
                    {{ App\Planos::all()->count() }}
                </span>
            </a>
        </li>
        <li>
            <a href="{{route('banners.index')}}">
                <span class="icon color7">
                    <i class="fa fa-image"></i>
                </span>
                Banners
<!--                <span class="label label-default">
                    {{ App\Planos::all()->count() }}
                </span>-->
            </a>
        </li>
    </ul>

</div>