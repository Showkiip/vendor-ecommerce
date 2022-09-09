@extends('admin.layouts.master')
@section('content')
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">Add Template</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    {{ csrf_field() }}
                                    @if(count($errors))
                                        <div class="form-group">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if(session()->has('message'))
                                        <div class="row">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                <strong>Message:</strong>{{session()->get('message')}}
                                            </div>
                                        </div>
                                    @endif
                                    <h4 class="field-title">Contact Information</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="number" class="form-control" min="0" placeholder="Phone Number" name="phone_number" value="+92-214542454" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="number" name="mbl_number" min="0" class="form-control" placeholder="Mobile Number" value="+92-15442154" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" placeholder="Location" value="London" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Business Address</label>
                                                <input type="text" name="business_address" class="form-control" placeholder="Business Address" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Comapny Name</label>
                                                <input type="text" name="company_name" class="form-control" placeholder="Comapny Name" value="XYZ" >
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="field-title">Case Highlights</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Legal Structure</label>
                                                <select class="form-control" name="legal_structure">
                                                    <option>Ltd Company (UK)</option>
                                                    <option>Ltd Company (other)</option>
                                                    <option>Sole Trader</option>
                                                    <option>LLP</option>
                                                    <option>Charity</option>
                                                    <option>Trust</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Currency</label>
                                                <input type="text" name="currency" class="form-control" placeholder="Country" value="Australia">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Turnover</label>
                                                <input type="number" name="turnover" class="form-control" placeholder="Turnover">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Year end</label>
                                                <input type="date" name="year_end" class="form-control" placeholder="Comapny Name" value="XYZ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deadline</label>
                                                <input type="date" name="deadline" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Number of Locations</label>
                                                <input type="number" name="nmber_location" min="0" class="form-control" placeholder="Comapny Location" value="XYZ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Current Bookkeeping Status</label>
                                                <select class="form-control" name="bookkeeping_status">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Software Use</label>
                                                <input type="text" name="software_use" class="form-control" placeholder="Software Use" value="XYZ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Budget</label>
                                                <input type="text" name="budget" class="form-control" placeholder="82484524" value="XYZ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other</label>
                                                <input type="text" name="other" class="form-control" placeholder="Other" value="XYZ">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="field-title">Services Needed</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Registration</label>
                                                <select name="company_resgiter_number" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Annual Accounts</label>
                                                <select name="annual_accounts" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Corporation tax return</label>
                                                <select name="tax_return" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Self Assessment tax Return</label>
                                                <select name="self_tax_return" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bookkeeping</label>
                                                <select name="bookkeeping" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirmation Statement</label>
                                                <select name="confirmation_statement" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>VAT Returns</label>
                                                <select name="vat_returns" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Payroll</label>
                                                <select name="payroll" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tax Advice</label>
                                                <select name="tax_advice" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>HMRC registration (VAT, PAYE etc)</label>
                                                <select name="hmre_register" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Management Accounts</label>
                                                <select name="management_accounts" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Audit</label>
                                                <select name="audit" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other</label>
                                                <textarea name="other_service" class="form-control" rows="4" cols="8"></textarea>
                                                <!-- <select name="other_service" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                    <option>Not Sure</option>
                                                    <option>N/A</option>
                                                </select> -->
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="field-title">About the Client</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Industry</label>
                                                <input type="text" name="industry" class="form-control" placeholder="Industry">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Experience as a Business Owner</label>
                                                <select name="owner_experience" class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Reason for Change (if applicable)</label>
                                                <input type="text" name="reason_change" class="form-control" placeholder="Reason of Change">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Any other Requirements</label>
                                                <input type="text" name="other_requirement" class="form-control" placeholder="Reason of Change">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="field-title">Client Contact Preference?</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mode</label>
                                                <select name="mode" class="form-control">
                                                    <option>Email</option>
                                                    <option>Call</option>
                                                    <option>Text message</option>
                                                    <option>Whatsapp mesage</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <input type="text" name="time" class="form-control" placeholder="Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>When Looking to Hire?</label>
                                                <input type="text" name="when_hire" class="form-control" placeholder="When looking to hire?">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Any deadlines Approaching?</label>
                                                <input type="text" name="deadlines_approch" class="form-control" placeholder="Any deadlines approaching?">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="field-title">Expert Preferences</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Any Preferred Expert Requirements? </label>
                                                <input type="text" name="expert_requiremnt" class="form-control" placeholder="Any preferred expert requirements? ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>1 </label>
                                                <input type="text" name="expert_1" class="form-control" placeholder="Expert 2 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>2 </label>
                                                <input type="text" name="expert_2" class="form-control" placeholder="Expert 2 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>3 </label>
                                                <input type="text" name="expert_3" class="form-control" placeholder="Expert 3 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Local Expert? </label>
                                                <input type="text" name="local_expert" class="form-control" placeholder="Local expert? ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Working style with chosen Expert </label>
                                                <input type="text" name="expert_choice" class="form-control" placeholder="Working style with chosen Expert? Digital, Manual ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary btn-round">Add Template</button>
                                        </div>
                                    </div>
                                </form>
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
