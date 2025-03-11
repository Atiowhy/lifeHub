@extends('layout.app')
@section('content')
          <div id="app">
            <div class="main-wrapper main-wrapper-1">
              <!-- Main Content -->
              <div class="main-content">
                <section class="section">
                  <div class="section-header">
                    <h1>Posts</h1>
                    <div class="section-header-button">
                      <a href="features-post-create.html" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Posts</a></div>
                      <div class="breadcrumb-item">All Posts</div>
                    </div>
                  </div>
                  <div class="section-body">
                    <h2 class="section-title">Posts</h2>
                    <p class="section-lead">
                      You can manage all posts, such as editing, deleting and more.
                    </p>
                    <div class="row">
                      <div class="col-12">
                        <div class="card mb-0">
                          <div class="card-body">
                            <ul class="nav nav-pills">
                              <li class="nav-item">
                                <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>All Posts</h4>
                          </div>
                          <div class="card-body">
                            <div class="float-left">
                              <select class="form-control selectric">
                                <option>Action For Selected</option>
                                <option>Move to Draft</option>
                                <option>Move to Pending</option>
                                <option>Delete Pemanently</option>
                              </select>
                            </div>
                            <div class="float-right">
                              <form>
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                  <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                  </div>
                                </div>
                              </form>
                            </div>

                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                              <table class="table table-striped">
                                <tr>
                                  <th class="text-center pt-2">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                      <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </th>
                                  <th>Title</th>
                                  <th>Category</th>
                                  <th>Author</th>
                                  <th>Created At</th>
                                  <th>Status</th>
                                </tr>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        {{-- title --}}
                                      <td>{{$article->titile}}
                                        <div class="table-links">
                                          <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
                                          <div class="bullet"></div>
                                          <a href="#">Edit</a>
                                          <div class="bullet"></div>
                                          <a href="#" class="text-danger">Trash</a>
                                        </div>
                                      </td>
                                      {{-- category --}}
                                      <td>
                                        <a href="#">{{$article->category->category_name}}</a>,
                                      </td>
                                      {{-- name --}}
                                      <td>
                                        <a href="#">
                                          <img alt="image" src="{{$article->user->photo}}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">{{$article->user->first_name}}</div>
                                        </a>
                                      </td>
                                      {{-- created_at --}}
                                      <td>{{$article->created_at}}</td>
                                      <td><div class="badge badge-primary">Published</div></td>
                                    </tr>
                                @endforeach
                              </table>
                            </div>
                            <div class="float-right">
                              <nav>
                                <ul class="pagination">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                  </li>
                                  <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                  </li>
                                  <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                  </li>
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
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

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

@endsection
