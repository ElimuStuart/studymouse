@extends('layouts.app')

@section('content')

<div class="intro-section single-cover" id="home-section">
      
    <div class="slide-1 " style="background-image: url({{ asset('images/img_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-12">
            <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6">
                <h1 data-aos="fade-up" data-aos-delay="0">{{$context['course']->name}}</h1>
                <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p>
            </div>

            
            </div>
        </div>
        
        </div>
    </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mb-5">

        <div class="mb-5">
            <h3 class="text-black">Course Description</h3>
            <p class="mb-4">
            <strong class="text-black mr-3">Schedule: </strong> {{$context['course']->start_date}} - {{$context['course']->end_date}}
            </p>
            <p>{{$context['course']->description}}</p>
            @if ($context['materials']->count() > 0)
            <div class="row mb-4 mt-4">
            <div class="col-lg-12">
            
            <div class="mb-5 text-center border rounded course-instructor">
                <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Course Material</h3>
                @foreach($context['materials'] as $material)
                <div class="mb-2 d-flex justify-content-between align-items-center">
                  
                <span class="h5 text-black mb-4">{{$material->description}}</span>
                @if (Auth::user()->role == "tutor")
                <div class="d-flex">
                <a class="mr-2 btn btn-outline-success" href="{{$material->material}}" download><i class="fas fa-file-download"></i></a>
                <form method="POST" action="{{ action('MaterialsController@destroy', $material->id) }}">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                
                
                @endif
                
                </div>
                
                </div>
                @endforeach
            </div>
            
            </div>
            <!--
            <div class="col-md-6">
                <img src="images/img_1.jpg" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <img src="images/img_2.jpg" alt="Image" class="img-fluid rounded">
            </div>
            -->
            </div>
            @else
            <p>No course material yet</p>
            @endif

            <!-- <p class="mt-4"><a href="#" class="btn btn-primary">Admission</a></p> -->
        </div>
        <!--
        <div class="pt-5">
            <h3 class="mb-5">6 Comments</h3>
            <ul class="comment-list">
            <li class="comment">
                <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                <h3>Jean Doe</h3>
                <div class="meta">January 9, 2018 at 2:21pm</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                <p><a href="#" class="reply">Reply</a></p>
                </div>
            </li>

            <li class="comment">
                <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                <h3>Jean Doe</h3>
                <div class="meta">January 9, 2018 at 2:21pm</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                <p><a href="#" class="reply">Reply</a></p>
                </div>

                <ul class="children">
                <li class="comment">
                    <div class="vcard bio">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                    </div>


                    <ul class="children">
                    <li class="comment">
                        <div class="vcard bio">
                        <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                        <h3>Jean Doe</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                        </div>

                        <ul class="children">
                            <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                            </li>
                        </ul>
                    </li>
                    </ul>
                </li>
                </ul>
            </li>

            <li class="comment">
                <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                <h3>Jean Doe</h3>
                <div class="meta">January 9, 2018 at 2:21pm</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                <p><a href="#" class="reply">Reply</a></p>
                </div>
            </li>
            </ul> -->
            <!-- END comment-list -->
            <!--
            <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="#" class="p-5 bg-light">
                <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                <label for="message">Message</label>
                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

            </form>
            </div>
        </div>

        -->

        </div>

        
        <div class="col-lg-4 pl-lg-5">
        @foreach($context['tutors'] as $tutor)
        <div class="mb-5 text-center border rounded course-instructor">
            <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Course Instructor</h3>
            <div class="mb-4 text-center">
            <img src="{{ asset('images/person_2.jpg') }}" alt="Image" class="w-25 rounded-circle mb-4">  
            <h3 class="h5 text-black mb-4">{{$tutor->name}}</h3>
            <p>Lorem ipsum dolor sit amet sectetur adipisicing elit. Ipsa porro expedita libero pariatur vero eos.</p>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    </div>
</div>




<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{$context['course']->name}}</div>

                <div class="card-body">
                    <p>{{$context['course']->description}}</p>
                    
            </div>

            
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Course Material
            </div>
            @if ($context['materials']->count() > 0)
            <ul class="list-group list-group-flush">
                @foreach($context['materials'] as $material)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span >{{$material->description}}</span>
                    @if (Auth::user()->role == "tutor")
                    <form method="POST" action="{{ action('MaterialsController@destroy', $material->id) }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    @endif
                    
                </li>
                @endforeach
            </ul>
            @else
            <li class="list-group-item">No course material for this course</li>
            @endif
            @if (Auth::user()->role == "tutor")
            <div class="card-footer">
                <a href="/materials/create" class="btn btn-primary" role="button" aria-disabled="true">Create</a>
            </div>
            @endif

        </div>
    </div>
    @if (Auth::user()->role == "tutor")
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Colleges
            </div>
            <ul class="list-group list-group-flush">
                @foreach($context['tutors'] as $tutor)
                <li class="list-group-item">{{$tutor->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div> -->
@endsection 
