<div class="ibox-body">
    <div class="row">
        <?php $counter = 0; ?>
        @foreach ($news as $item)
            <div class="col-md-4 col-lg-3 col-sm-6 mb-3">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/image.png') }}" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->adminName->name }}</h5>
                            <div class="text-muted card-subtitle">{{ $item->adminName->email }}
                            </div>
                            <div>{{ $item->text }}</div>
                        </div>
                        <div class="card-footer">
                            {{-- link show single news --}}
                            <a class="link-blue" href="{{ route('news.show', $item->id) }}"><i
                                    class="fa fa-comments"></i> تعليات
                                {{ $comment_news_count[$counter] }}</a>
                            <span class="pull-left text-muted font-13">{{ $item->date_news }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php $counter++; ?>
        @endforeach
    </div>
</div>

<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
<ul class="pagination justify-content-end m-t-0 m-l-10 p-4">
    {{ $news->links() }}
</ul>
