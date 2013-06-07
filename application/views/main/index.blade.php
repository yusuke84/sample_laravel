@layout('layouts.master')
@section('content')
<div class="container">
    <p>ATND BETA のイベントを検索する事ができます。</p>
    <div class="row">
        <div class="span3">
            {{ Form::open('main/search', 'POST') }}
                <div class="control-group {{ $errors->has('keyword') ? 'error' : '' }}">
                    <div class="controls controls-row">
                        {{ Form::text('keyword', $keyword, array('class' => 'input-medium', 'placeholder' => '検索キーワード（必須）') ) }}
                        <span class="help-inline">hint:半角スペースで複数入力可</span>
                    </div>
                </div>
                <div class="control-group {{ $errors->has('area') ? 'error' : '' }}">
                    <div class="controls controls-row">
                        {{ Form::text('area', $area , array('class' => 'input-medium', 'placeholder' => '開催エリア（任意）') ) }}
                    </div>
                </div>
                <div class="control-group {{ $errors->has('date') ? 'error' : '' }}">
                    <div class="controls controls-row">
                        <div class="bfh-datepicker">
                            <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                                <span class="add-on"><i class="icon-calendar"></i></span>
                                {{ Form::text('date', $date , array('class' => 'input-medium', 'placeholder' => '開催日（任意）') ) }}
                            </div>
                            <div class="bfh-datepicker-calendar">
                                <table class="calendar table table-bordered">
                                    <thead>
                                    <tr class="months-header">
                                        <th class="month" colspan="4">
                                            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                            <span></span>
                                            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                        </th>
                                        <th class="year" colspan="3">
                                            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                            <span></span>
                                            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                        </th>
                                    </tr>
                                    <tr class="days-header">
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <span class="help-inline">hint：20130501 or 201305</span>
                    </div>
                </div>
                <div class="control-group {{ $errors->has('area') ? 'error' : '' }}">
                    <div class="controls controls-row">
                        {{ Form::checkbox('nogoback', 1 , $nogoback ) }}
                        過去のイベントを検索しない
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls controls-row">
                        {{ Form::submit('この条件で検索する',array('class'=>'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
        <div class="span9">
            <legend>検索結果{{ $number }}</legend>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>開催日</th>
                    <th>タイトル</th>
                    <th>参加登録者数</th>
                    <th>主催者</th>
                </tr>
                </thead>
                <tbody>
                @if ($results != null)
                    @for ($i = 0; $i < count($results); $i++)
                    <tr><td>{{ $results[$i]['date'] }}</td><td>{{ HTML::link($results[$i]['url'],$results[$i]['title']) }}</td><td>{{ $results[$i]['recruiting'] }}</td><td>{{ HTML::link($results[$i]['ownerurl'],$results[$i]['owner']) }}</td></tr>
                    @endfor
                @endif
                </tbody>
            </table>
        </div>
</div>
</div>
@endsection