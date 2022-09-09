@extends('admin.layouts.master')
@section('content')
    <div class="wrapper">
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Job Status Update</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">

                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Session::get('fa_admin')->name}}
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ url('dashboard/logout') }}">Logout</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- <div class="panel-header panel-header-sm">


      </div> -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Job Status Update</h4>
                            </div>

                            <div class="row" style="margin: 0;">
                            	<div class="col-md-12">
                            		<form action="" method="post">
                            			  {{ csrf_field() }}
                            			<div class="form-group">
                        						<label>Case Status</label>
                        							<select class="form-control" name="status_from_admin">
                                                    <option <?php echo ($update->status_from_admin == 'Awaiting customer info') ? 'selected' : ''; ?>>Awaiting customer info</option>
                                                    <option <?php echo ($update->status_from_admin == 'Awaiting proposal') ? 'selected' : ''; ?>>Awaiting proposal</option>
                                                    <option <?php echo ($update->status_from_admin == 'Awaiting customer reply') ? 'selected' : ''; ?>>Awaiting customer reply</option>
                                                    <option <?php echo ($update->status_from_admin == 'Invalid case') ? 'selected' : ''; ?>>Invalid case</option>
                                                    <option <?php echo ($update->status_from_admin == 'Other') ? 'selected' : ''; ?>>Other</option>
                                                    
                        						</select>
                            			</div>
                            			<div class="form-group">
                        						<label>Outcome</label>
                        						<select class="form-control" name="outcome">
                                                <option <?php echo ($update->outcome == 'Match found') ? 'selected' : ''; ?>>Match found</option>
                                                <option <?php echo ($update->outcome == 'Work in progress') ? 'selected' : ''; ?>>Work in progress</option>
                                                <option <?php echo ($update->outcome == 'Case closed because customer irresponsive') ? 'selected' : ''; ?>>Case closed because customer irresponsive</option>
                                                <option <?php echo ($update->outcome == 'Case closed because not enough proposals') ? 'selected' : ''; ?>>Case closed because not enough proposals</option>
                                                <option <?php echo ($update->outcome == 'Invalid case') ? 'selected' : ''; ?>>Invalid case</option>
                                                <option <?php echo ($update->outcome == 'Other') ? 'selected' : ''; ?>>Other</option>
                                                </select>
                            			</div>
                                        <div class="form-group">
                                        <label>Comment</label>
                            				  <textarea class="form-control" name="admin_comment" rows="5" id="comment">{{$update->admin_comment}}</textarea>
                            			</div>
                            			<div class="form-group">
                            				<button type="submit" class="btn btn-success">Update </button>
                            			</div>
                            		</form>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
