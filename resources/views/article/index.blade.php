@extends('layout.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Post Create &mdash; Stisla</title>


    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

    <body>
      <div id="app">
        <div class="main-wrapper main-wrapper-1">

          <!-- Main Content -->
          <div class="main-content">
            <section class="section">
              <div class="section-header">
                <div class="section-header-back">
                  <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Post</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                  <div class="breadcrumb-item"><a href="#">Posts</a></div>
                  <div class="breadcrumb-item">Create New Post</div>
                </div>
              </div>

              <div class="section-body">
                <h2 class="section-title">Create New Post</h2>
                <p class="section-lead">
                  On this page you can create a new post and fill in all fields.
                </p>

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Write Your Post</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" name="title" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                          <div class="col-sm-12 col-md-7">
                            <select name="category_id" class="form-control selectric">
                              <option>Pilih Kategori</option>
                              @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                          <div class="col-sm-12 col-md-7">
                            <textarea name="content" class="summernote-simple"></textarea>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                          <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                              <label for="image-upload" id="image-label">Choose File</label>
                              <input type="file" name="photo" id="image-upload" />
                              <img src="{{asset()}}" alt="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control inputtags">
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                          <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Create Post</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>


    </body>
    </html>
@endsection
