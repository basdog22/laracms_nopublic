<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-file-o"></i>
        <span class="hidden-xs">{{ Lang::get('laracms::strings.pages') }}</span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{url('backend/pages')}}" class="ajax-link">{{ Lang::get('strings.list') }}</a></li>
        <li><a href="{{url('backend/newpage')}}" class="ajax-link">{{ Lang::get('strings.new') }}</a></li>
    </ul>
</li>