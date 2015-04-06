@if ($breadcrumbs)
    <nav class="breadcrumbs">
    	<ul>
	        @foreach ($breadcrumbs as $breadcrumb)
	            @if (!$breadcrumb->last)
	                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
	            @else
	                <li>{{{ $breadcrumb->title }}}</li>
	            @endif
	        @endforeach
        </ul>
    </nav>
@endif