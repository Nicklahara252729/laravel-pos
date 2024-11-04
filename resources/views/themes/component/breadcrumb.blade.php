<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Backoffice</a></li>
        <li class="breadcrumb-item @if(!isset($subTitle)) active @endif" aria-current="page">{{ $title }}</li>
        @if(isset($subTitle)) <li class="breadcrumb-item active" aria-current="page">{{ $subTitle }}</li> @endif
    </ol>
</nav>