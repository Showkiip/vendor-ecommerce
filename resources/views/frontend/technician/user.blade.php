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
          <a class="navbar-brand" href="#pablo">Profile Management</a>
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
              <h4 class="card-title"> Partner Accounts</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Partner_id</th>
                    <th>Name</th>
                    <th>Date_of_joining</th>
                    <th>Status</th>
                    <th>City</th>
                    <!-- <th>Country</th> -->
                    <th>Total_quotes</th>
                    <th>Won_quotes</th>
                    <th>In_Progress</th>
                    <th>Lost</th>
                    <th>Total_quotes_price</th>
                    <th>Won_quotes_price</th>
                    <th>In_progress_price</th>
                    <th>Lost_quote_price</th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    @foreach($partner_data as $partner)
                    <tr>
                      <td> {{$partner->p_id}}</td>
                      <td> {{$partner->name}}</td>
                      <td> {{$partner->created_at}}</td>
                      <td> {{$partner->status}}</td>
                      <td> {{$partner->city}}</td>
                      <td class="text-center"><a data-toggle="modal" href='#modal-id1{{$partner->p_id}}'> View (<?php echo count($partner->qoute) ?>)</a> 
                        <div class="modal fade" id="modal-id1{{$partner->p_id}}">
                          <div class="modal-dialog modal-lg quote-modal">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">{{$partner->name}} quotes</h4>
                              </div>
                              <div class="modal-body">
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Quote by</th>
                                        <th>Quote_date</th>
                                        <th>Quote_Services</th>
                                        <th>Quote_price</th>
                                        <th>Status</th>
                                        <th>View</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($partner->qoute as $qoutes)
                                      <tr>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $qoutes->created_at }}</td>
                                        <td><?php
                                        foreach(@json_decode($qoutes->q_services) as $service){
                                          echo $service. '</br>';
                                        }
                                      ?></td>
                                        <td><?php
                                        foreach(@json_decode($qoutes->quote_price) as $price){
                                          echo $price. '</br>';
                                        }
                                      ?></td>
                                        <td>{{ $qoutes->status }}</td>
                                        <td><a href="{{url('partner/template_detail/'.$qoutes->job_id)}}">View Quote</a></td>
                                      </tr>
                                     @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-center"><a data-toggle="modal" href='#modal-id2{{$partner->p_id}}'> View (<?php echo count($partner->wonqoute) ?>)</a> 
                        <div class="modal fade" id="modal-id2{{$partner->p_id}}">
                          <div class="modal-dialog modal-lg quote-modal">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">{{$partner->name}} quotes</h4>
                              </div>
                              <div class="modal-body">
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Quote by</th>
                                        <th>Quote_date</th>
                                        <th>Quote_Services</th>
                                        <th>Quote_price</th>
                                        <th>Status</th>
                                        <th>View</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($partner->wonqoute as $qoutes)
                                      <tr>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $qoutes->created_at }}</td>
                                        <td><?php
                                        foreach(@json_decode($qoutes->q_services) as $service){
                                          echo $service. '</br>';
                                        }
                                      ?></td>
                                        <td><?php
                                        foreach(@json_decode($qoutes->quote_price) as $price){
                                          echo $price. '</br>';
                                        }
                                      ?></td>
                                        <td>{{ $qoutes->status }}</td>
                                        <td><a href="{{url('partner/template_detail/'.$qoutes->job_id)}}">View Quote</a></td>
                                      </tr>
                                     @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                       <td class="text-center"><a data-toggle="modal" href='#modal-id3{{$partner->p_id}}'> View (<?php echo count($partner->peddingqoute) ?>)</a> 
                        <div class="modal fade" id="modal-id3{{$partner->p_id}}">
                          <div class="modal-dialog modal-lg quote-modal">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">{{$partner->name}} quotes</h4>
                              </div>
                              <div class="modal-body">
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Quote by</th>
                                        <th>Quote_date</th>
                                        <th>Quote_Services</th>
                                        <th>Quote_price</th>
                                        <th>Status</th>
                                        <th>View</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php $val=0; ?>
                                      @foreach($partner->peddingqoute as $qoutes)
                                      <tr>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $qoutes->created_at }}</td>
                                        <td><?php
                                        foreach(@json_decode($qoutes->q_services) as $service){
                                          echo $service. '</br>';
                                        }
                                      ?></td>
                                        <td><?php
                                        $val=$val + array_sum(@json_decode($qoutes->quote_price));
                                        //echo array_sum(@json_decode($qoutes->quote_price));
                                        foreach(@json_decode($qoutes->quote_price) as $price){
                                          echo $price. '</br>';
                                        }
                                      ?></td>
                                        <td>{{ $qoutes->status }}</td>
                                        <td><a href="{{url('partner/template_detail/'.$qoutes->job_id)}}">View Quote</a></td>
                                      </tr>
                                     @endforeach
                                     <?php echo $val.'heeeeeeeeeeeeeeeeeeeeee'; ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                       <td class="text-center"><a data-toggle="modal" href='#modal-id4{{$partner->p_id}}'> View (<?php echo count($partner->lossqoute) ?>)</a> 
                        <div class="modal fade" id="modal-id4{{$partner->p_id}}">
                          <div class="modal-dialog modal-lg quote-modal">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">{{$partner->name}} quotes</h4>
                              </div>
                              <div class="modal-body">
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Quote by</th>
                                        <th>Quote_date</th>
                                        <th>Quote_Services</th>
                                        <th>Quote_price</th>
                                        <th>Status</th>
                                        <th>View</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($partner->lossqoute as $qoutes)
                                      <tr>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $qoutes->created_at }}</td>
                                        <td><?php
                                       
                                        foreach(@json_decode($qoutes->q_services) as $service){
                                          echo $service. '</br>';
                                        }
                                      ?></td>
                                        <td><?php
                                         
                                        foreach(@json_decode($qoutes->quote_price) as $price){
                                          echo $price. '</br>';
                                        }
                                      ?></td>
                                        <td>{{ $qoutes->status }}</td>
                                        <td><a href="{{url('partner/template_detail/'.$qoutes->job_id)}}">View Quote</a></td>
                                      </tr>
                                     @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-center">  
                                     <?php $val=0; ?>
                                      @foreach($partner->qoute as $qoutes)
                                      <?php
                                        $val=$val + array_sum(@json_decode($qoutes->quote_price));
                                        ?>
                                      @endforeach
                                     <?php echo '£ '.number_format($val, 2); ?>
                                      </td>
                      <td class="text-center"> 
                                    <?php $val1=0; ?>
                                      @foreach($partner->wonqoute as $qoutes)
                                      <?php
                                        $val1=$val1 + array_sum(@json_decode($qoutes->quote_price));
                                        ?>
                                      @endforeach
                                     <?php echo '£ '.number_format($val1, 2); ?></td>
                      <td class="text-center">
                       <?php $val2=0; ?>
                                      @foreach($partner->peddingqoute as $qoutes)
                                      <?php
                                        $val2=$val2 + array_sum(@json_decode($qoutes->quote_price));
                                        ?>
                                      @endforeach
                                     <?php echo '£ '.number_format($val2, 2); ?></td>
                      <td class="text-center"> 
                       <?php $val3=0; ?>
                                      @foreach($partner->lossqoute as $qoutes)
                                      <?php
                                        $val3=$val3 + array_sum(@json_decode($qoutes->quote_price));
                                        ?>
                                      @endforeach
                                     <?php echo '£ '.number_format($val3, 2); ?>
                      </td>
                      <td class="text-center">
                        <i class="fa fa-edit text-primary"></i>
                        <a href=""> <i class="fa fa-trash text-danger"></i> </a>
                        <i class="fa fa-eye text-success"></i>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
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