@if(Session::has('success'))
   <div class="alert alert-success">

       <!-- Get flash message stored in Session memomry in controller:store method -->
       <strong>Success:</strong> {{ Session::get('success') }}

   </div>
@endif

@if(count($errors) >0 )
    <div class="alert alert-danger">
        <strong>Errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>

    </div>
@endif
