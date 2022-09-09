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
                        <a class="navbar-brand" href="#pablo">User Management</a>
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
                                <h4 class="card-title"> Add User</h4>
                            </div>

                            <div class="row" style="margin: 0;">
                            	<div class="col-md-12">
                            		<form action="" method="">
                            			<div class="form-group">
                            				<div class="row">
                            					<div class="col-md-6">
                            						<label>User name</label>
                            						<input type="text" name="username" class="form-control">
                            					</div>
                            					<div class="col-md-6">
                            						<label>Email address</label>
                            						<input type="email" name="email" class="form-control">
                            					</div>		
                            				</div>
                            			</div>
                            			<div class="form-group">
                            				<div class="row">
                            					<div class="col-md-6">
		                        						<label>Phone Number</label>
		                        						<input type="Number" name="phone_number" class="form-control">
		                        					</div>
                            					<div class="col-md-6">
		                        						<label>User type</label>
		                        						<select class="form-control" name="user_type">
		                        							<option>Admin</option>
		                        							<option>Experts only</option>
		                        							<option>Customer only</option>
		                        							<option>Customer only</option>
		                        						</select>
		                        					</div>
		                        				</div>
                            			</div>
                            			<div class="form-group">
                        						<label>Password</label>
                        						<input type="password" name="username" class="form-control">
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
