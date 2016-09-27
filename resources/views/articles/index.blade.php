@extends("layouts.application")
@section("content")
  <div>{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success')) !!}</div>
  @foreach ($articles as $article)
    <div>
      <h1>{{$article->title}}</h1>
      <p>{{$article->content}}</p>
      <i>By {{$article->author}}</i>
      <div>
      {!! link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info')) !!}
      {!! link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning')) !!}
      {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}
        {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
      {!! Form::close() !!}
      </div>
    </div>
  @endforeach

@stop