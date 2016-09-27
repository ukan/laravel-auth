@extends("layouts.application")
@section("content")
  <div class="section">
	@foreach($datas as $data)

	<div class="row">
		<div class="col s12">
			<h1>{!! $data->title !!}</h1>

            <div class="divider"></div>
            
            <p>{!!substr($data->content,0,200)!!}...</p>      
            <i>By {!! $data->writer !!}</i>          
            <br>
            <a href="{{ url('articles', $data->id) }}" class="btn btn-primary">Readmore</a>            
            <a href="{{ url('articles/create') }}" class="btn btn-primary">Add </a>
            <a href="{{ url('articles', $data->id,'/edit') }}" class="btn btn-primary">Edit </a>
            <a href="{{ url('articles/delete', $data->id) }}" onclick="return confirm('Yakin mau hapus data ini sob?')" class="btn btn-danger">Delete</a>
		</div>
	</div>
	@endforeach

</div>

{{ $datas->render() }}

@stop