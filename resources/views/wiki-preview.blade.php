@isset($data['html'])
<div class="wiki-preview card">

    <div class="row ">
            <div class="clearfix">
                @isset($data['img_url'])
                    <img src="{{$data['img_url']}}" class="col-4 float-end mb-3 ms-1 ms-md-3" alt="...">
                @endisset

                <p class="card-text mb-auto">{!! $data['html'] !!}</p>

            </div>
    </div>
</div>
@endisset
