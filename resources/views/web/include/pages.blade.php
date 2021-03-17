@php
    $start = 1;
    $end = $Pages->lastPage();
    $HasPages = $HasFirst = $HasLast = $HasPrevious = $HasNext = false;
    if($Pages->lastPage() > 1) $HasPages = true;
    if($Pages->currentPage() != 1) $HasPrevious = true;
    if($Pages->currentPage()>4){
        $HasFirst = true;
        $start = $Pages->currentPage() - 2;
    }
    if($Pages->lastPage() - $Pages->currentPage()>3){
        $HasLast = true;
        $end = $Pages->currentPage() + 2;
    }
    if($Pages->currentPage() != $Pages->lastPage()) $HasNext = true;
@endphp
@if($HasPages)
    <ul class="pagination font-17 d-table clearfix mx-auto barlowCondensed my-md-5 my-4" data-aos="fade-up">
        @if($HasPrevious)
        <li><a class="icon-2 left" href="{{$Pages->url(1)}}"></a></li>
        <li><a class="icon left" href="{{$Pages->previousPageUrl()}}"></a></li>
        @endif
        @for($i=$start;$i<=$end;$i++)
        <li class="{{($i == $Pages->currentPage())?"active":""}}"><a href="{{$Pages->url($i)}}">{{sprintf("%02d",$i)}}</a></li>
        @endfor
        @if($HasNext)
        <li><a class="icon right" href="{{$Pages->nextPageUrl()}}"></a></li>
        <li><a class="icon-2 right" href="{{$Pages->url($end)}}"></a></li>
        @endif
    </ul>
@endif