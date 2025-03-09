
@if ($date->isToday())
    Today at {{ $date->format('H:i') }}
@elseif ($date->isYesterday())
    Yesterday at {{ $date->format('H:i') }}
@elseif ($date->diffInDays(now()) <= 7)
    {{ $date->diffForHumans() }}
@elseif ($date->year === now()->year)
    {{ $date->format('j F at H:i') }}
@else
    {{ $date->format('F Y') }}
@endif