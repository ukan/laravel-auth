@extends('layouts.application')
@section('content')

<div class="section">
	
	<div class="row">
		<div class="col s12">
			<h1>{{ $tampilkan->title }}</h1>

            <div class="divider"></div>
            <p>{!! $tampilkan->content !!}</p>
            <i>By {!! $tampilkan->writer !!}</i>
            {!! Form::open(['url' => 'comments/', 'class' => 'form-horizontal', 'role' => 'form']) !!}
			  <!-- Comments Form -->
			  <div class="form-group">
			    {!! Form::label('comment', 'Comment', array('class' => 'col-lg-1 control-label')) !!}
			    <div class="col-lg-9">
			      {!! Form::textarea('comment', null, array('class' => 'form-control', 'rows' => 5)) !!}
			      {!! $errors->first('comment') !!}
			    </div>
			    <div class="clear"></div>
			  </div>

			  <!-- Submit -->
			  <div class="form-group">
			    <div class="col-lg-1"></div>
			    <div class="col-lg-9">
			      {!! Form::submit('Send', array('class' => 'btn btn-primary')) !!}
			    </div>
			    <div class="clear"></div>
			  </div>
			{!! Form::close() !!}

                
		</div>
	</div>

</div>

@endsection