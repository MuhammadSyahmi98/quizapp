@extends('backend.layout.master')

	@section('title','create quiz')

	@section('content')

	<div class="span9">
     <div class="content">

     	@if(session('message'))

     		<div class="alert alert-success">{{session('message')}}</div>
     	@endif



     <form action="{{route('exam-store')}}" method="POST">@csrf
			
	<div class="module">
            <div class="module-head">
                <h3>Assign quiz</h3>
            </div>


            <div class="module-body">
                 <div class="control-group">
				<label class="control-lable" for="name">Choose Quiz</label>
				<div class="controls"> 
					<select name="quiz_id" class="span8 ">
						@foreach($quizes as $quiz)
						<option value="{{$quiz->id}}">{{$quiz->name}}</option>
						@endforeach

					</select>
				</div>
			     @error('question')
			    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
			@enderror      

			</div>
                 <div class="control-group">
				<label class="control-lable" for="name">Choose User</label>
				<div class="controls"> 
					<select name="user_id" class="span8 ">
						@foreach($users as $user)
						<option value="{{$user->id}}">{{$user->name}}</option>
						@endforeach

					</select>
				</div>
			     @error('question')
			    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
			@enderror      

			</div>
            



			




			


			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>

		    </div>


   		</div>
	</div>

</form>


</div>
</div>
                      
                    
@endsection