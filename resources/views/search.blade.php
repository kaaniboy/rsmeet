@extends('template')

@section('content')
    <div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">
            <form class="form-horizontal" method="get" action="search">
                <h4>Search for friends</h4>
                
                <div class="form-group">
                    <label for="filter" class="col-lg-1 control-label">Filter</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="filter" placeholder="A word or short phrase to filter" value="{{ Input::get('filter') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="category" class="col-lg-1 control-label">Category</label>
                        <div class="col-lg-11">
                         {!! Form::select('category', array_merge(['Any' => 'Any'], $categories), Input::get('category'), ['class' => 'form-control']) !!}
                        </div>
                </div>
                
                <div id="extras" aria-expanded="false" class="collapse" style="height: 0px;">
                    
                    <div class="form-group">
                    <label for="combat" class="col-lg-1 control-label">Combat Level</label>
                        <div class="col-lg-11">
                         {!! Form::select('combat', $combats, Input::get('combat'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="age" class="col-lg-1 control-label">Age</label>
                        <div class="col-lg-11">
                         {!! Form::select('age', $ages, Input::get('age'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                
                <br>
                <div class="form-group">
                    <input type="submit" id="submit-search" class="btn btn-primary" value="Search">
                    <a class="btn btn-link" data-toggle="collapse" data-target="#extras">Extra options</a>
                </div>
            </form>
        </div>
    </div>
    
        <div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">
            @if(count($posts) > 0)
                <div class="list-group" style="background-color: #f9f9f9;">
                    @foreach($posts as $post)
                        <a href="{{ URL::to('/post/' . $post->id) }}" class="list-group-item">
                            <h5 class="list-group-item-heading">{{ $post->title }}</h5>
                            <p><b>Posted by {{ $post->name }} {!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() !!}</b></p>
                            <p class="list-group-item-text larger">{{ str_limit($post->description, 100) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="larger">There are no posts that match this search. Please try another search. </p>
            @endif       
            <div style="text-align: center">
                <?php echo $posts->appends(Input::except('page'))->render() ?>
            </div>
        </div>
    </div>
    
@endsection