<div class="nav">
   <ul class="nav-list">
      <li class="nav-item"><a class="nav-item-a active-user" href="{{ route('manage.users.index') }}"><i class="nav-item-i fa-solid fa-user"></i>Quản lí học viên</a>
      </li>
      <li class="nav-item"><a class="nav-item-a active-lesson" href=""><i class="nav-item-i fa-solid fa-book"></i></i>Quản lí khóa học</a>
         <ul class="nav-item-list">
            <li class="nav-item-list-li"><a href="{{ route('manage.html.index') }}">HTML - CSS</a> </li>
            <li class="nav-item-list-li"><a href="{{ route('manage.js.index') }}">JavaScript</a> </li>
            <li class="nav-item-list-li"><a href="{{ route('manage.php.index') }}">PHP</a> </li>
            <li class="nav-item-list-li"><a href="{{ route('manage.laravel.index') }}">Laravel Framework</a></li>
            <li class="nav-item-list-li"><a href="{{ route('manage.react.index') }}">React-JS</a></li>
         </ul>
      </li>
      <li class="nav-item""><a class="nav-item-a  active-comment" href="{{ route('admin.comments.index')}}"><i class="nav-item-i fa-solid fa-comment"></i>Hỏi đáp</a></li>
   </ul>
</div>