    <div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">
            <div class="list-group" style="background-color: #f9f9f9;">
            @foreach($posts as $post)
                <a href="#" class="list-group-item">
                    <h5 class="list-group-item-heading">{{ $post->title }}</h5>
                    <p>Posted by {{ $post->name }} </p>
                    <p class="list-group-item-text">{{ str_limit($post->description, 100) }}</p>
                </a>
            @endforeach
            </div>
            
            <?php echo $posts->render() ?>
        </div>
    </div>