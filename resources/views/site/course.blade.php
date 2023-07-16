@extends('site.master')

@section('title', 'Courses | ' . env('APP_NAME'))

@section('styles')

<style>

.rating {
  margin-top: 40px;
  border: none;
  float: left;
}

.rating > label {
  color: #90A0A3;
  float: right;
}

.rating > label:before {
  margin: 5px;
  font-size: 1.5em;
  font-family: FontAwesome;
  content: "\f005";
  display: inline-block;
}

.rating > input {
  display: none;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #F79426;
}

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {
  color: #FECE31;
}

.clear {
    clear: both;
}

textarea {
    resize: none
}
</style>

@endsection

@section('content')

    @include('site.header', ['title' => $course->title])

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">All Courses</h1>
                <p>{{ $course->content }}</p>



                @if (Auth::check())

                    @if ( Auth::user()->courses->find($course->id) )

                        <form class="text-start w-50 mx-auto" action="{{ route('site.review', $course->id) }}" method="POST">
                            @csrf


                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                        </div>

                        <div class="clear"></div>

                        <div class="mb-3">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control" placeholder="Comment" rows="4"></textarea>
                        </div>

                        <button class="btn btn-primary">Submit</button>

                        </form>

                    @endif

                @else
                <a href="{{ route('site.enroll', $course->id) }}" class="btn btn-primary">Enroll</a>
                @endif

            </div>

        </div>
    </div>

@stop

@section('scripts')
<script src="https://use.fontawesome.com/7ad89d9866.js"></script>
@endsection
