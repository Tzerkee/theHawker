@if ($paginator->hasPages())
    <div class="pagination-style mt-30 text-center">
        <ul>
            <!-- Previous Page Link-->
            @if ($paginator->onFirstPage())
                <li><a><i class="ti-angle-left"></i></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="ti-angle-left"></i></a></li>
            @endif

            @php
                $link = "";
                $currentPageNo = $paginator->currentPage();
                $lastPageNo = $paginator->lastPage();

                $limit = 6;
                $adjacents = 1;
                $secondlastpage = $lastPageNo-1;

                if($lastPageNo >= $limit) {
                    if($currentPageNo < 1 + ($adjacents *3))
                    {
                        for ($item=1; $item <= 4; $item++)
                        {
                            if ($currentPageNo == $item)
                                $link .= '<li class="active">'.$item.'</li>';
                            else
                                $link .= '<li><a href="'.$paginator->url($item).'">'.$item.'</a></li>';
                        }
                        $link .= '<li>...</li>';
                        $link .= '<li><a href="'.$paginator->url($secondlastpage).'">'.$secondlastpage.'</a></li>';
                        $link .= '<li><a href="'.$paginator->url($lastPageNo).'">'.$lastPageNo.'</a></li>';
                    }
                    else if ($lastPageNo - ($adjacents * 2) > $currentPageNo && $currentPageNo > ($adjacents * 2))
                    {
                        $link .= '<li><a href="'.$paginator->url(1).'">1</a></li>';
                        $link .= '<li>...</li>';
                        for ($i = $currentPageNo - $adjacents; $i <= $currentPageNo + $adjacents; $i++)
                        {
                            if($currentPageNo == $i)
                                $link .= '<li class="active">'.$i.'</li>';
                            else
                                $link .= '<li><a href="'.$paginator->url($i).'">'.$i.'</a></li>';
                        }
                        $link .= '<li>...</li>';
                        $link .= '<li><a href="'.$paginator->url($lastPageNo).'">'.$lastPageNo.'</a></li>';
                    }
                    else
                    {
                        $link .= '<li><a href="'.$paginator->url(1).'">1</a></li>';
                        $link .= '<li><a href="'.$paginator->url(2).'">2</a></li>';
                        $link .= '<li>...</li>';
                        for ($i = $lastPageNo - (1 + ($adjacents * 3)); $i <= $lastPageNo; $i++)
                        {
                            if($currentPageNo == $i)
                                $link .= '<li class="active"><a href="#">'.$i.'</a></li>';
                            else
                                $link .= '<li><a href="'.$paginator->url($i).'">'.$i.'</a></li>';
                        }
                    }
                } else {
                    for ($i=1; $i <= $lastPageNo; $i++)
                    {
                        if ($currentPageNo === $i) {
                            echo '<li class="active"><a href="#">'.$i.'</a></li>';
                        } else {
                            echo '<li><a href="'.$paginator->url($i).'">'.$i.'</a></li>';
                        }
                    }
                }

                echo $link;

            @endphp

            <!-- Next Page Link-->
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>
            @else
                <li><a><i class="ti-angle-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif
