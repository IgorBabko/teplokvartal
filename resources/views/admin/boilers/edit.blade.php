@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="row">
            <h1>Редактировать котел</h1>
            <div class="divider"></div>
            <div class="col-xs-12">
                @include ('partials.errors')
                <form action="/admin/boilers/{{ $boiler->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $boiler->name }}"> 
                    </div>
                    <div class="form-group">
                        <label for="desc">Описание</label>
                        <textarea type="text" class="form-control" id="desc" name="desc">{!! $boiler->desc !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea type="text" class="form-control" id="content" name="content">{!! $boiler->content !!}</textarea>
                    </div>
                    <!--<select class="form-control" name="type">
                        <option value="одностенный" {{ $boiler->type == 'одностенный' ? 'selected' :'' }}>одностенный</option>
                        <option value="утепленный" {{ $boiler->type == 'утепленный' ? 'selected' : '' }}>утепленный</option>
                        <option value="алюком" {{ $boiler->type == 'алюком' ? 'selected' : '' }}>алюком</option>
                        <option value="керамический" {{ $boiler->type == 'керамический' ? 'selected' : '' }}>керамический</option>
                    </select>-->
                    <div class="form-group" style="margin: 20px 0">
                        <label for="image">Изменить изображение</label>
                        <input type="file" id="image" name="image">
                        <img src="{{ $boiler->image }}" class="thumb">
                    </div>
                    <button type="submit" class="btn Button Button--green" style="float: right">Редактировать</button>
                    <a href="/admin/boilers" type="submit" class="btn Button Button--blue right-margin">Назад <span class="glyphicon glyphicon-chevron-left"></span></a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
