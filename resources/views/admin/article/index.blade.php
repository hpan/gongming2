@extends('layouts.admin')
@section('title', '市政爆料管理系统')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 10px 10px;">爆料管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    {{--<a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>--}}

                    @foreach ($articles as $article)
                        <hr>
                        <div class="article">
                            <h6>
                                <span><b>爆料人姓名：</b></span><span>
                            @if($article->anonymous == 1)
                                        匿名
                                    @else
                                        {{$article->name}}
                                    @endif
                            </span>&nbsp;
                                <span><b>手机号：</b></span><span>{{$article->mobile}}</span>&nbsp;
                                <span><b>地址：</b></span><span>{{$article->address}}</span>&nbsp;

                            </h6>
                            <div class="content">
                                {{ $article->body }}
                                <?php
                                    $imgArray = explode(",", $article->images);
//                                    var_dump($imgArray);
                                ?>
                                <div >
                                    @foreach($imgArray as $img)
                                        <a href="{{$img}}" rel="lightbox-{{$article->id}}}}"><img src="{{$img}}" class="cover_small" "></a>
                                    @endforeach
                                <form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline; float:right; padding: 20px 10px;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        {{--<a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>--}}
                        <div style="font-size:9pt; color: #999;">

                        </div>

                    @endforeach
                </div>
            </div>
            <div style="width:100%; text-align:center; margin-top: -30px;">{!! $articles->links() !!}</div>

        </div>
    </div>
</div>

@endsection
