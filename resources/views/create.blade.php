@extends('template')

@section('content')
    <div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">
            
            
            <form class="form-horizontal" action="{{ action('PostController@store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h4>Create a post</h4>
                
                <p class="larger">
                    Describe the activity you would like to participate in so you can quickly meet other players. If you don't care about a
                    certain option, leave 'Any' selected. Also, make sure to have your <b>private chat enabled in-game</b> so that you can receive messages from
                    players using RS Meet. 
                </p>
                
                @if(count($errors) > 0)
                    <div class="alert alert-dismissible alert-info">
                        <h5 style="color: white">Please fill in all required fields: </h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="title" class="col-lg-1 control-label">Title</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="title" placeholder="Enter a title" value="{{ old('title') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-lg-1 control-label">RS Name (RSN)</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="name" placeholder="So you can meet-up online" value="{{ old('name') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="col-lg-1 control-label">Description</label>
                    <div class="col-lg-11">
                        <textarea name="description" class="form-control" placeholder="Add additional information that may be useful">{{ old('description') }}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="category" class="col-lg-1 control-label">Category</label>
                        <div class="col-lg-11">
                            {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
                        </div>
                </div>
                
                <div class="form-group">
                    <label for="combat" class="col-lg-1 control-label">Combat Level</label>
                        <div class="col-lg-11">
                            {!! Form::select('combat', $combats, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="age" class="col-lg-1 control-label">Age</label>
                        <div class="col-lg-11">
                            {!! Form::select('age', $ages, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                <br>
                <div class="form-group">
                    <input type="submit" id="submit-post" class="btn btn-primary" value="Create">
                </div>
            </form>
        </div>
    </div>
@endsection