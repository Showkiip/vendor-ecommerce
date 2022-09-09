@extends('admin.layouts.master')
@section('content')
<?php $service=[]; if(!empty($template)){ $service=json_decode($template->service_needed, true); }
      $service_required=[]; if(!empty($template)){ $service_required=json_decode($template->service_required, true); }

?>
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
					  @if(!empty($template))
		          	<h4 class="field-title">Contact Information</h4>
		            <div class="row">
		              <!-- <div class="col-md-12">
		                <div class="form-group">
		                  <label>Name <span class="required" style="color: red;">*</span></label>
		                  <input type="number" class="form-control" min="0" placeholder="Phone Number"  name="phone_number" @if(!empty($template))value="{{$template->phone_number}}" @endif>
		                </div>
		              </div> -->
                  <div class="col-md-12">
                    <label>Phone Number <span class="required" style="color: red;">*</span></label>
                    <div class="form-group" style="display:flex">
                      <span class="input-group-addon" id="basic-addon1" style="padding: 0px 3px !important;">
                        <select name="phone_code" id="input" class="phone-nmbr form-control" style="width:205px;">
                          <option value="93" @if(!empty($template)) {{$template->phone_code=='93'? 'selected="selected"':''}} @endif>Afghanistan (+93)</option>
                          <option value="355" @if(!empty($template)) {{$template->phone_code=='355'? 'selected="selected"':''}} @endif>Albania (+355)</option>
                          <option value="213" @if(!empty($template)) {{$template->phone_code=='213'? 'selected="selected"':''}} @endif>Algeria (+213)</option>
                          <option value="1684" @if(!empty($template)) {{$template->phone_code=='1684'? 'selected="selected"':''}} @endif>American Samoa (+1684)</option>
                          <option value="376" @if(!empty($template)) {{$template->phone_code=='376'? 'selected="selected"':''}} @endif>Andorra (+376)</option>
                          <option value="244" @if(!empty($template)) {{$template->phone_code=='244'? 'selected="selected"':''}} @endif>Angola (+244)</option>
                          <option value="1264" @if(!empty($template)) {{$template->phone_code=='1264'? 'selected="selected"':''}} @endif>Anguilla (+1264)</option>
                          <option value="672" @if(!empty($template)) {{$template->phone_code=='672'? 'selected="selected"':''}} @endif>Antarctica (+672)</option>
                          <option value="1268" @if(!empty($template)) {{$template->phone_code=='1268'? 'selected="selected"':''}} @endif>Antigua and Barbuda (+1268)</option>
                          <option value="54" @if(!empty($template)) {{$template->phone_code=='54'? 'selected="selected"':''}} @endif>Argentina (+54)</option>
                          <option value="374" @if(!empty($template)) {{$template->phone_code=='374'? 'selected="selected"':''}} @endif>Armenia (+374)</option>
                          <option value="297" @if(!empty($template)) {{$template->phone_code=='297'? 'selected="selected"':''}} @endif>Aruba (+297)</option>
                          <option value="61" @if(!empty($template)) {{$template->phone_code=='61'? 'selected="selected"':''}} @endif>Australia (+61)</option>
                          <option value="43" @if(!empty($template)) {{$template->phone_code=='43'? 'selected="selected"':''}} @endif>Austria (+43)</option>
                          <option value="994" @if(!empty($template)) {{$template->phone_code=='994'? 'selected="selected"':''}} @endif>Azerbaijan (+994)</option>
                          <option value="1242" @if(!empty($template)) {{$template->phone_code=='1242'? 'selected="selected"':''}} @endif>Bahamas (+1242)</option>
                          <option value="973" @if(!empty($template)) {{$template->phone_code=='973'? 'selected="selected"':''}} @endif>Bahrain (+973)</option>
                          <option value="880" @if(!empty($template)) {{$template->phone_code=='880'? 'selected="selected"':''}} @endif>Bangladesh (+880)</option>
                          <option value="1246" @if(!empty($template)) {{$template->phone_code=='1246'? 'selected="selected"':''}} @endif>Barbados (+1246)</option>
                          <option value="375" @if(!empty($template)) {{$template->phone_code=='375'? 'selected="selected"':''}} @endif>Belarus (+375)</option>
                          <option value="32" @if(!empty($template)) {{$template->phone_code=='32'? 'selected="selected"':''}} @endif>Belgium (+32)</option>
                          <option value="501" @if(!empty($template)) {{$template->phone_code=='501'? 'selected="selected"':''}} @endif>Belize (+501)</option>
                          <option value="229" @if(!empty($template)) {{$template->phone_code=='229'? 'selected="selected"':''}} @endif>Benin (+229)</option>
                          <option value="1441" @if(!empty($template)) {{$template->phone_code=='1441'? 'selected="selected"':''}} @endif>Bermuda (+1441)</option>
                          <option value="975" @if(!empty($template)) {{$template->phone_code=='975'? 'selected="selected"':''}} @endif>Bhutan (+975)</option>
                          <option value="591" @if(!empty($template)) {{$template->phone_code=='591'? 'selected="selected"':''}} @endif>Bolivia (+591)</option>
                          <option value="387" @if(!empty($template)) {{$template->phone_code=='387'? 'selected="selected"':''}} @endif>Bosnia and Herzegovina (+387)</option>
                          <option value="267" @if(!empty($template)) {{$template->phone_code=='267'? 'selected="selected"':''}} @endif>Botswana (+267)</option>
                          <option value="47" @if(!empty($template)) {{$template->phone_code=='47'? 'selected="selected"':''}} @endif>Bouvet Island (+47)</option>
                          <option value="55" @if(!empty($template)) {{$template->phone_code=='55'? 'selected="selected"':''}} @endif>Brazil (+55)</option>
                          <option value="246" @if(!empty($template)) {{$template->phone_code=='246'? 'selected="selected"':''}} @endif>British Indian Ocean Territories (+246)</option>
                          <option value="673" @if(!empty($template)) {{$template->phone_code=='673'? 'selected="selected"':''}} @endif>Brunei Darussalam (+673)</option>
                          <option value="359" @if(!empty($template)) {{$template->phone_code=='359'? 'selected="selected"':''}} @endif>Bulgaria (+359)</option>
                          <option value="226" @if(!empty($template)) {{$template->phone_code=='226'? 'selected="selected"':''}} @endif>Burkina Faso (+226)</option>
                          <option value="257" @if(!empty($template)) {{$template->phone_code=='257'? 'selected="selected"':''}} @endif>Burundi (+257)</option>
                          <option value="855" @if(!empty($template)) {{$template->phone_code=='855'? 'selected="selected"':''}} @endif>Cambodia (+855)</option>
                          <option value="237" @if(!empty($template)) {{$template->phone_code=='237'? 'selected="selected"':''}} @endif>Cameroon (+237)</option>
                          <option value="1" @if(!empty($template)) {{$template->phone_code=='1'? 'selected="selected"':''}} @endif>Canada (+1)</option>
                          <option value="238" @if(!empty($template)) {{$template->phone_code=='238'? 'selected="selected"':''}} @endif>Cape Verde (+238)</option>
                          <option value="1345" @if(!empty($template)) {{$template->phone_code=='1345'? 'selected="selected"':''}} @endif>Cayman Islands (+1345)</option>
                          <option value="236" @if(!empty($template)) {{$template->phone_code=='236'? 'selected="selected"':''}} @endif>Central African Republic (+236)</option>
                          <option value="235" @if(!empty($template)) {{$template->phone_code=='235'? 'selected="selected"':''}} @endif>Chad (+235)</option>
                          <option value="56" @if(!empty($template)) {{$template->phone_code=='56'? 'selected="selected"':''}} @endif>Chile (+56)</option>
                          <option value="86" @if(!empty($template)) {{$template->phone_code=='86'? 'selected="selected"':''}} @endif>China, People's Republic of (+86)</option>
                          <option value="61" @if(!empty($template)) {{$template->phone_code=='61'? 'selected="selected"':''}} @endif>Christmas Island (+61)</option>
                          <option value="61" @if(!empty($template)) {{$template->phone_code=='61'? 'selected="selected"':''}} @endif>Cocos Islands (+61)</option>
                          <option value="57" @if(!empty($template)) {{$template->phone_code=='57'? 'selected="selected"':''}} @endif>Colombia (+57)</option>
                          <option value="269" @if(!empty($template)) {{$template->phone_code=='269'? 'selected="selected"':''}} @endif>Comoros (+269)</option>
                          <option value="243" @if(!empty($template)) {{$template->phone_code=='243'? 'selected="selected"':''}} @endif>Congo (+243)</option>
                          <option value="682" @if(!empty($template)) {{$template->phone_code=='682'? 'selected="selected"':''}} @endif>Cook Islands (+682)</option>
                          <option value="506" @if(!empty($template)) {{$template->phone_code=='506'? 'selected="selected"':''}} @endif>Costa Rica (+506)</option>
                          <option value="225" @if(!empty($template)) {{$template->phone_code=='225'? 'selected="selected"':''}} @endif>Cote D'ivoire (+225)</option>
                          <option value="385" @if(!empty($template)) {{$template->phone_code=='385'? 'selected="selected"':''}} @endif>Croatia (+385)</option>
                          <option value="53" @if(!empty($template)) {{$template->phone_code=='53'? 'selected="selected"':''}} @endif>Cuba (+53)</option>
                          <option value="357" @if(!empty($template)) {{$template->phone_code=='357'? 'selected="selected"':''}} @endif>Cyprus (+357)</option>
                          <option value="420" @if(!empty($template)) {{$template->phone_code=='420'? 'selected="selected"':''}} @endif>Czech Republic (+420)</option>
                          <option value="45" @if(!empty($template)) {{$template->phone_code=='45'? 'selected="selected"':''}} @endif>Denmark (+45)</option>
                          <option value="253" @if(!empty($template)) {{$template->phone_code=='253'? 'selected="selected"':''}} @endif>Djibouti (+253)</option>
                          <option value="1767" @if(!empty($template)) {{$template->phone_code=='1767'? 'selected="selected"':''}} @endif>Dominica (+1767)</option>
                          <option value="1809" @if(!empty($template)) {{$template->phone_code=='1809'? 'selected="selected"':''}} @endif>Dominican Republic (+1809)</option>
                          <option value="670" @if(!empty($template)) {{$template->phone_code=='670'? 'selected="selected"':''}} @endif>East Timor (+670)</option>
                          <option value="593" @if(!empty($template)) {{$template->phone_code=='593'? 'selected="selected"':''}} @endif>Ecuador (+593)</option>
                          <option value="20" @if(!empty($template)) {{$template->phone_code=='20'? 'selected="selected"':''}} @endif>Egypt (+20)</option>
                          <option value="503" @if(!empty($template)) {{$template->phone_code=='503'? 'selected="selected"':''}} @endif>El Salvador (+503)</option>
                          <option value="240" @if(!empty($template)) {{$template->phone_code=='240'? 'selected="selected"':''}} @endif>Equatorial Guinea (+240)</option>
                          <option value="291" @if(!empty($template)) {{$template->phone_code=='291'? 'selected="selected"':''}} @endif>Eritrea (+291)</option>
                          <option value="372" @if(!empty($template)) {{$template->phone_code=='372'? 'selected="selected"':''}} @endif>Estonia (+372)</option>
                          <option value="251" @if(!empty($template)) {{$template->phone_code=='251'? 'selected="selected"':''}} @endif>Ethiopia (+251)</option>
                          <option value="500" @if(!empty($template)) {{$template->phone_code=='500'? 'selected="selected"':''}} @endif>Falkland Islands (+500)</option>
                          <option value="298" @if(!empty($template)) {{$template->phone_code=='298'? 'selected="selected"':''}} @endif>Faroe Islands (+298)</option>
                          <option value="679" @if(!empty($template)) {{$template->phone_code=='679'? 'selected="selected"':''}} @endif>Fiji (+679)</option>
                          <option value="358" @if(!empty($template)) {{$template->phone_code=='358'? 'selected="selected"':''}} @endif>Finland (+358)</option>
                          <option value="33" @if(!empty($template)) {{$template->phone_code=='33'? 'selected="selected"':''}} @endif>France (+33)</option>
                          <option value="33" @if(!empty($template)) {{$template->phone_code=='33'? 'selected="selected"':''}} @endif>France, Metropolitan (+33)</option>
                          <option value="594" @if(!empty($template)) {{$template->phone_code=='594'? 'selected="selected"':''}} @endif>French Guiana (+594)</option>
                          <option value="689" @if(!empty($template)) {{$template->phone_code=='689'? 'selected="selected"':''}} @endif>French Polynesia (+689)</option>
                          <option value="33" @if(!empty($template)) {{$template->phone_code=='33'? 'selected="selected"':''}} @endif>French Southern Territories (+33)</option>
                          <option value="389" @if(!empty($template)) {{$template->phone_code=='389'? 'selected="selected"':''}} @endif>FYROM (+389)</option>
                          <option value="241" @if(!empty($template)) {{$template->phone_code=='241'? 'selected="selected"':''}} @endif>Gabon (+241)</option>
                          <option value="220" @if(!empty($template)) {{$template->phone_code=='220'? 'selected="selected"':''}} @endif>Gambia (+220)</option>
                          <option value="995" @if(!empty($template)) {{$template->phone_code=='995'? 'selected="selected"':''}} @endif>Georgia (+995)</option>
                          <option value="49" @if(!empty($template)) {{$template->phone_code=='49'? 'selected="selected"':''}} @endif>Germany (+49)</option>
                          <option value="233" @if(!empty($template)) {{$template->phone_code=='233'? 'selected="selected"':''}} @endif>Ghana (+233)</option>
                          <option value="350" @if(!empty($template)) {{$template->phone_code=='350'? 'selected="selected"':''}} @endif>Gibraltar (+350)</option>
                          <option value="30" @if(!empty($template)) {{$template->phone_code=='30'? 'selected="selected"':''}} @endif>Greece (+30)</option>
                          <option value="299" @if(!empty($template)) {{$template->phone_code=='299'? 'selected="selected"':''}} @endif>Greenland (+299)</option>
                          <option value="1473" @if(!empty($template)) {{$template->phone_code=='1473'? 'selected="selected"':''}} @endif>Grenada (+1473)</option>
                          <option value="590" @if(!empty($template)) {{$template->phone_code=='590'? 'selected="selected"':''}} @endif>Guadeloupe (+590)</option>
                          <option value="1671" @if(!empty($template)) {{$template->phone_code=='1671'? 'selected="selected"':''}} @endif>Guam (+1671)</option>
                          <option value="32" @if(!empty($template)) {{$template->phone_code=='502'? 'selected="selected"':''}} @endif>Guatemala (+502)</option>
                          <option value="224" @if(!empty($template)) {{$template->phone_code=='224'? 'selected="selected"':''}} @endif>Guinea (+224)</option>
                          <option value="245" @if(!empty($template)) {{$template->phone_code=='245'? 'selected="selected"':''}} @endif>Guinea-Bissau (+245)</option>
                          <option value="592" @if(!empty($template)) {{$template->phone_code=='592'? 'selected="selected"':''}} @endif>Guyana (+592)</option>
                          <option value="509" @if(!empty($template)) {{$template->phone_code=='509'? 'selected="selected"':''}} @endif>Haiti (+509)</option>
                          <option value="61" @if(!empty($template)) {{$template->phone_code=='61'? 'selected="selected"':''}} @endif>Heard Island And Mcdonald Islands (+61)</option>
                          <option value="504" @if(!empty($template)) {{$template->phone_code=='504'? 'selected="selected"':''}} @endif>Honduras (+504)</option>
                          <option value="852" @if(!empty($template)) {{$template->phone_code=='852'? 'selected="selected"':''}} @endif>Hong Kong (+852)</option>
                          <option value="36" @if(!empty($template)) {{$template->phone_code=='36'? 'selected="selected"':''}} @endif>Hungary (+36)</option>
                          <option value="354" @if(!empty($template)) {{$template->phone_code=='354'? 'selected="selected"':''}} @endif>Iceland (+354)</option>
                          <option value="91" @if(!empty($template)) {{$template->phone_code=='91'? 'selected="selected"':''}} @endif>India (+91)</option>
                          <option value="62" @if(!empty($template)) {{$template->phone_code=='62'? 'selected="selected"':''}} @endif>Indonesia (+62)</option>
                          <option value="98" @if(!empty($template)) {{$template->phone_code=='98'? 'selected="selected"':''}} @endif>Iran (+98)</option>
                          <option value="964" @if(!empty($template)) {{$template->phone_code=='964'? 'selected="selected"':''}} @endif>Iraq (+964)</option>
                          <option value="353" @if(!empty($template)) {{$template->phone_code=='353'? 'selected="selected"':''}} @endif>Ireland (+353)</option>
                          <option value="972" @if(!empty($template)) {{$template->phone_code=='972'? 'selected="selected"':''}} @endif>Israel (+972)</option>
                          <option value="39" @if(!empty($template)) {{$template->phone_code=='39'? 'selected="selected"':''}} @endif>Italy (+39)</option>
                          <option value="1876" @if(!empty($template)) {{$template->phone_code=='1876'? 'selected="selected"':''}} @endif>Jamaica (+1876)</option>
                          <option value="81" @if(!empty($template)) {{$template->phone_code=='81'? 'selected="selected"':''}} @endif>Japan (+81)</option>
                          <option value="962" @if(!empty($template)) {{$template->phone_code=='962'? 'selected="selected"':''}} @endif>Jordan (+962)</option>
                          <option value="7" @if(!empty($template)) {{$template->phone_code=='7'? 'selected="selected"':''}} @endif>Kazakhstan (+7)</option>
                          <option value="254" @if(!empty($template)) {{$template->phone_code=='254'? 'selected="selected"':''}} @endif>Kenya (+254)</option>
                          <option value="686" @if(!empty($template)) {{$template->phone_code=='686'? 'selected="selected"':''}} @endif>Kiribati (+686)</option>
                          <option value="965" @if(!empty($template)) {{$template->phone_code=='965'? 'selected="selected"':''}} @endif>Kuwait (+965)</option>
                          <option value="996" @if(!empty($template)) {{$template->phone_code=='996'? 'selected="selected"':''}} @endif>Kyrgyzstan (+996)</option>
                          <option value="856" @if(!empty($template)) {{$template->phone_code=='856'? 'selected="selected"':''}} @endif>Lao Peoples Democratic Republic (+856)</option>
                          <option value="371" @if(!empty($template)) {{$template->phone_code=='371'? 'selected="selected"':''}} @endif>Latvia (+371)</option>
                          <option value="961" @if(!empty($template)) {{$template->phone_code=='961'? 'selected="selected"':''}} @endif>Lebanon (+961)</option>
                          <option value="266" @if(!empty($template)) {{$template->phone_code=='266'? 'selected="selected"':''}} @endif>Lesotho (+266)</option>
                          <option value="231" @if(!empty($template)) {{$template->phone_code=='231'? 'selected="selected"':''}} @endif>Liberia (+231)</option>
                          <option value="218" @if(!empty($template)) {{$template->phone_code=='218'? 'selected="selected"':''}} @endif>Libyan Arab Jamahiriya (+218)</option>
                          <option value="423" @if(!empty($template)) {{$template->phone_code=='423423'? 'selected="selected"':''}} @endif>Liechtenstein (+423)</option>
                          <option value="423" @if(!empty($template)) {{$template->phone_code=='370'? 'selected="selected"':''}} @endif>Lithuania (+370)</option>
                          <option value="352" @if(!empty($template)) {{$template->phone_code=='352'? 'selected="selected"':''}} @endif>Luxembourg (+352)</option>
                          <option value="853" @if(!empty($template)) {{$template->phone_code=='853'? 'selected="selected"':''}} @endif>Macau (+853)</option>
                          <option value="261" @if(!empty($template)) {{$template->phone_code=='261'? 'selected="selected"':''}} @endif>Madagascar (+261)</option>
                          <option value="265" @if(!empty($template)) {{$template->phone_code=='265'? 'selected="selected"':''}} @endif>Malawi (+265)</option>
                          <option value="60" @if(!empty($template)) {{$template->phone_code=='60'? 'selected="selected"':''}} @endif>Malaysia (+60)</option>
                          <option value="960" @if(!empty($template)) {{$template->phone_code=='960'? 'selected="selected"':''}} @endif>Maldives (+960)</option>
                          <option value="223" @if(!empty($template)) {{$template->phone_code=='223'? 'selected="selected"':''}} @endif>Mali (+223)</option>
                          <option value="356" @if(!empty($template)) {{$template->phone_code=='356'? 'selected="selected"':''}} @endif>Malta (+356)</option>
                          <option value="692" @if(!empty($template)) {{$template->phone_code=='692'? 'selected="selected"':''}} @endif>Marshall Islands (+692)</option>
                          <option value="596" @if(!empty($template)) {{$template->phone_code=='596'? 'selected="selected"':''}} @endif>Martinique (+596)</option>
                          <option value="222" @if(!empty($template)) {{$template->phone_code=='222'? 'selected="selected"':''}} @endif>Mauritania (+222)</option>
                          <option value="230" @if(!empty($template)) {{$template->phone_code=='230'? 'selected="selected"':''}} @endif>Mauritius (+230)</option>
                          <option value="262" @if(!empty($template)) {{$template->phone_code=='262'? 'selected="selected"':''}} @endif>Mayotte (+262)</option>
                          <option value="52" @if(!empty($template)) {{$template->phone_code=='52'? 'selected="selected"':''}} @endif>Mexico (+52)</option>
                          <option value="691" @if(!empty($template)) {{$template->phone_code=='691'? 'selected="selected"':''}} @endif>Micronesia (+691)</option>
                          <option value="373" @if(!empty($template)) {{$template->phone_code=='373'? 'selected="selected"':''}} @endif>Moldova (+373)</option>
                          <option value="377" @if(!empty($template)) {{$template->phone_code=='377'? 'selected="selected"':''}} @endif>Monaco (+377)</option>
                          <option value="976" @if(!empty($template)) {{$template->phone_code=='976'? 'selected="selected"':''}} @endif>Mongolia (+976)</option>
                          <option value="1664" @if(!empty($template)) {{$template->phone_code=='1664'? 'selected="selected"':''}} @endif>Montserrat (+1664)</option>
                          <option value="212" @if(!empty($template)) {{$template->phone_code=='212'? 'selected="selected"':''}} @endif>Morocco (+212)</option>
                          <option value="258" @if(!empty($template)) {{$template->phone_code=='258'? 'selected="selected"':''}} @endif>Mozambique (+258)</option>
                          <option value="95" @if(!empty($template)) {{$template->phone_code=='95'? 'selected="selected"':''}} @endif>Myanmar (+95)</option>
                          <option value="264" @if(!empty($template)) {{$template->phone_code=='264'? 'selected="selected"':''}} @endif>Namibia (+264)</option>
                          <option value="674" @if(!empty($template)) {{$template->phone_code=='674'? 'selected="selected"':''}} @endif>Nauru (+674)</option>
                          <option value="977" @if(!empty($template)) {{$template->phone_code=='977'? 'selected="selected"':''}} @endif>Nepal (+977)</option>
                          <option value="31" @if(!empty($template)) {{$template->phone_code=='31'? 'selected="selected"':''}} @endif>Netherlands (+31)</option>
                          <option value="599" @if(!empty($template)) {{$template->phone_code=='599'? 'selected="selected"':''}} @endif>Netherlands Antilles (+599)</option>
                          <option value="687" @if(!empty($template)) {{$template->phone_code=='687'? 'selected="selected"':''}} @endif>New Caledonia (+687)</option>
                          <option value="64" @if(!empty($template)) {{$template->phone_code=='64'? 'selected="selected"':''}} @endif>New Zealand (+64)</option>
                          <option value="505" @if(!empty($template)) {{$template->phone_code=='505'? 'selected="selected"':''}} @endif>Nicaragua (+505)</option>
                          <option value="227" @if(!empty($template)) {{$template->phone_code=='227'? 'selected="selected"':''}} @endif>Niger (+227)</option>
                          <option value="234" @if(!empty($template)) {{$template->phone_code=='234'? 'selected="selected"':''}} @endif>Nigeria (+234)</option>
                          <option value="683" @if(!empty($template)) {{$template->phone_code=='683'? 'selected="selected"':''}} @endif>Niue (+683)</option>
                          <option value="672" @if(!empty($template)) {{$template->phone_code=='672'? 'selected="selected"':''}} @endif>Norfolk Island (+672)</option>
                          <option value="1670" @if(!empty($template)) {{$template->phone_code=='1670'? 'selected="selected"':''}} @endif>Northern Mariana Islands (+1670)</option>
                          <option value="47" @if(!empty($template)) {{$template->phone_code=='47'? 'selected="selected"':''}} @endif>Norway (+47)</option>
                          <option value="968" @if(!empty($template)) {{$template->phone_code=='968'? 'selected="selected"':''}} @endif>Oman (+968)</option>
                          <option value="92" @if(!empty($template)) {{$template->phone_code=='92'? 'selected="selected"':''}} @endif>Pakistan (+92)</option>
                          <option value="680" @if(!empty($template)) {{$template->phone_code=='680'? 'selected="selected"':''}} @endif>Palau (+680)</option>
                          <option value="507" @if(!empty($template)) {{$template->phone_code=='507'? 'selected="selected"':''}} @endif>Panama (+507)</option>
                          <option value="675" @if(!empty($template)) {{$template->phone_code=='675'? 'selected="selected"':''}} @endif>Papua New Guinea (+675)</option>
                          <option value="595" @if(!empty($template)) {{$template->phone_code=='595'? 'selected="selected"':''}} @endif>Paraguay (+595)</option>
                          <option value="51" @if(!empty($template)) {{$template->phone_code=='51'? 'selected="selected"':''}} @endif>Peru (+51)</option>
                          <option value="63" @if(!empty($template)) {{$template->phone_code=='63'? 'selected="selected"':''}} @endif>Philippines (+63)</option>
                          <option value="870" @if(!empty($template)) {{$template->phone_code=='870'? 'selected="selected"':''}} @endif>Pitcairn (+870)</option>
                          <option value="48" @if(!empty($template)) {{$template->phone_code=='48'? 'selected="selected"':''}} @endif>Poland (+48)</option>
                          <option value="351" @if(!empty($template)) {{$template->phone_code=='351'? 'selected="selected"':''}} @endif>Portugal (+351)</option>
                          <option value="1" @if(!empty($template)) {{$template->phone_code=='1'? 'selected="selected"':''}} @endif>Puerto Rico (+1)</option>
                          <option value="974" @if(!empty($template)) {{$template->phone_code=='974'? 'selected="selected"':''}} @endif>Qatar (+974)</option>
                          <option value="262" @if(!empty($template)) {{$template->phone_code=='262'? 'selected="selected"':''}} @endif>Reunion (+262)</option>
                          <option value="40" @if(!empty($template)) {{$template->phone_code=='40'? 'selected="selected"':''}} @endif>Romania (+40)</option>
                          <option value="7" @if(!empty($template)) {{$template->phone_code=='7'? 'selected="selected"':''}} @endif>Russian Federation (+7)</option>
                          <option value="250" @if(!empty($template)) {{$template->phone_code=='250'? 'selected="selected"':''}} @endif>Rwanda (+250)</option>
                          <option value="290" @if(!empty($template)) {{$template->phone_code=='290'? 'selected="selected"':''}} @endif>Saint Helena (+290)</option>
                          <option value="1869" @if(!empty($template)) {{$template->phone_code=='1869'? 'selected="selected"':''}} @endif>Saint Kitts and Nevis (+1869)</option>
                          <option value="1758" @if(!empty($template)) {{$template->phone_code=='1758'? 'selected="selected"':''}} @endif>Saint Lucia (+1758)</option>
                          <option value="508" @if(!empty($template)) {{$template->phone_code=='508'? 'selected="selected"':''}} @endif>Saint Pierre and Miquelon (+508)</option>
                          <option value="1784" @if(!empty($template)) {{$template->phone_code=='1784'? 'selected="selected"':''}} @endif>Saint Vincent and The Grenadines (+1784)</option>
                          <option value="685" @if(!empty($template)) {{$template->phone_code=='685'? 'selected="selected"':''}} @endif>Samoa (+685)</option>
                          <option value="378" @if(!empty($template)) {{$template->phone_code=='378'? 'selected="selected"':''}} @endif>San Marino (+378)</option>
                          <option value="239" @if(!empty($template)) {{$template->phone_code=='239'? 'selected="selected"':''}} @endif>Sao Tome and Principe (+239)</option>
                          <option value="966" @if(!empty($template)) {{$template->phone_code=='966'? 'selected="selected"':''}} @endif>Saudi Arabia (+966)</option>
                          <option value="221" @if(!empty($template)) {{$template->phone_code=='221'? 'selected="selected"':''}} @endif>Senegal (+221)</option>
                          <option value="248" @if(!empty($template)) {{$template->phone_code=='248'? 'selected="selected"':''}} @endif>Seychelles (+248)</option>
                          <option value="232" @if(!empty($template)) {{$template->phone_code=='232'? 'selected="selected"':''}} @endif>Sierra Leone (+232)</option>
                          <option value="65" @if(!empty($template)) {{$template->phone_code=='65'? 'selected="selected"':''}} @endif>Singapore (+65)</option>
                          <option value="421" @if(!empty($template)) {{$template->phone_code=='421'? 'selected="selected"':''}} @endif>Slovakia (+421)</option>
                          <option value="386" @if(!empty($template)) {{$template->phone_code=='386'? 'selected="selected"':''}} @endif>Slovenia (+386)</option>
                          <option value="677" @if(!empty($template)) {{$template->phone_code=='677'? 'selected="selected"':''}} @endif>Solomon Islands (+677)</option>
                          <option value="252" @if(!empty($template)) {{$template->phone_code=='252'? 'selected="selected"':''}} @endif>Somalia (+252)</option>
                          <option value="27" @if(!empty($template)) {{$template->phone_code=='27'? 'selected="selected"':''}} @endif>South Africa (+27)</option>
                          <option value="500" @if(!empty($template)) {{$template->phone_code=='500'? 'selected="selected"':''}} @endif>South Georgia and Sandwich Islands (+500)</option>
                          <option value="82" @if(!empty($template)) {{$template->phone_code=='82'? 'selected="selected"':''}} @endif>South Korea (+82)</option>
                          <option value="34" @if(!empty($template)) {{$template->phone_code=='34'? 'selected="selected"':''}} @endif>Spain (+34)</option>
                          <option value="94" @if(!empty($template)) {{$template->phone_code=='94'? 'selected="selected"':''}} @endif>Sri Lanka (+94)</option>
                          <option value="249" @if(!empty($template)) {{$template->phone_code=='249'? 'selected="selected"':''}} @endif>Sudan (+249)</option>
                          <option value="597" @if(!empty($template)) {{$template->phone_code=='597'? 'selected="selected"':''}} @endif>Suriname (+597)</option>
                          <option value="47" @if(!empty($template)) {{$template->phone_code=='47'? 'selected="selected"':''}} @endif>Svalbard and Jan Mayen (+47)</option>
                          <option value="268" @if(!empty($template)) {{$template->phone_code=='268'? 'selected="selected"':''}} @endif>Swaziland (+268)</option>
                          <option value="46" @if(!empty($template)) {{$template->phone_code=='46'? 'selected="selected"':''}} @endif>Sweden (+46)</option>
                          <option value="41" @if(!empty($template)) {{$template->phone_code=='41'? 'selected="selected"':''}} @endif>Switzerland (+41)</option>
                          <option value="963" @if(!empty($template)) {{$template->phone_code=='963'? 'selected="selected"':''}} @endif>Syrian Arab Republic (+963)</option>
                          <option value="886" @if(!empty($template)) {{$template->phone_code=='886'? 'selected="selected"':''}} @endif>Taiwan (+886)</option>
                          <option value="992" @if(!empty($template)) {{$template->phone_code=='992'? 'selected="selected"':''}} @endif>Tajikistan (+992)</option>
                          <option value="255" @if(!empty($template)) {{$template->phone_code=='255'? 'selected="selected"':''}} @endif>Tanzania (+255)</option>
                          <option value="66" @if(!empty($template)) {{$template->phone_code=='66'? 'selected="selected"':''}} @endif>Thailand (+66)</option>
                          <option value="228" @if(!empty($template)) {{$template->phone_code=='228'? 'selected="selected"':''}} @endif>Togo (+228)</option>
                          <option value="690" @if(!empty($template)) {{$template->phone_code=='690'? 'selected="selected"':''}} @endif>Tokelau (+690)</option>
                          <option value="676" @if(!empty($template)) {{$template->phone_code=='676'? 'selected="selected"':''}} @endif>Tonga (+676)</option>
                          <option value="1868" @if(!empty($template)) {{$template->phone_code=='1868'? 'selected="selected"':''}} @endif>Trinidad and Tobago (+1868)</option>
                          <option value="216" @if(!empty($template)) {{$template->phone_code=='216'? 'selected="selected"':''}} @endif>Tunisia (+216)</option>
                          <option value="90" @if(!empty($template)) {{$template->phone_code=='90'? 'selected="selected"':''}} @endif>Turkey (+90)</option>
                          <option value="993" @if(!empty($template)) {{$template->phone_code=='993'? 'selected="selected"':''}} @endif>Turkmenistan (+993)</option>
                          <option value="1649" @if(!empty($template)) {{$template->phone_code=='1649'? 'selected="selected"':''}} @endif>Turks and Caicos Islands (+1649)</option>
                          <option value="688" @if(!empty($template)) {{$template->phone_code=='688'? 'selected="selected"':''}} @endif>Tuvalu (+688)</option>
                          <option value="256" @if(!empty($template)) {{$template->phone_code=='256'? 'selected="selected"':''}} @endif>Uganda (+256)</option>
                          <option value="380" @if(!empty($template)) {{$template->phone_code=='380'? 'selected="selected"':''}} @endif>Ukraine (+380)</option>
                          <option value="971" @if(!empty($template)) {{$template->phone_code=='971'? 'selected="selected"':''}} @endif>United Arab Emirates (+971)</option>
                          <option value="44" @if(!empty($template)) {{$template->phone_code=='44'? 'selected="selected"':''}} @endif>United Kingdom (+44)</option>
                          <option value="1" @if(!empty($template)) {{$template->phone_code=='1'? 'selected="selected"':''}} @endif>United States (+1)</option>
                          <option value="699" @if(!empty($template)) {{$template->phone_code=='699'? 'selected="selected"':''}} @endif>United States Minor Outlying Islands (+699)</option>
                          <option value="598" @if(!empty($template)) {{$template->phone_code=='598'? 'selected="selected"':''}} @endif>Uruguay (+598)</option>
                          <option value="998" @if(!empty($template)) {{$template->phone_code=='998'? 'selected="selected"':''}} @endif>Uzbekistan (+998)</option>
                          <option value="678" @if(!empty($template)) {{$template->phone_code=='678'? 'selected="selected"':''}} @endif>Vanuatu (+678)</option>
                          <option value="39" @if(!empty($template)) {{$template->phone_code=='39'? 'selected="selected"':''}} @endif>Vatican City State (+39)</option>
                          <option value="58" @if(!empty($template)) {{$template->phone_code=='58'? 'selected="selected"':''}} @endif>Venezuela (+58)</option>
                          <option value="84" @if(!empty($template)) {{$template->phone_code=='84'? 'selected="selected"':''}} @endif>Vietnam (+84)</option>
                          <option value="1284" @if(!empty($template)) {{$template->phone_code=='1284'? 'selected="selected"':''}} @endif>Virgin Islands (British) (+1284)</option>
                          <option value="1340" @if(!empty($template)) {{$template->phone_code=='1340'? 'selected="selected"':''}} @endif>Virgin Islands (U.S.) (+1340)</option>
                          <option value="681" @if(!empty($template)) {{$template->phone_code=='681'? 'selected="selected"':''}} @endif>Wallis And Futuna Islands (+681)</option>
                          <option value="212" @if(!empty($template)) {{$template->phone_code=='212'? 'selected="selected"':''}} @endif>Western Sahara (+212)</option>
                          <option value="967" @if(!empty($template)) {{$template->phone_code=='967'? 'selected="selected"':''}} @endif>Yemen (+967)</option>
                          <option value="381" @if(!empty($template)) {{$template->phone_code=='381'? 'selected="selected"':''}} @endif>Yugoslavia (+381)</option>
                          <option value="243" @if(!empty($template)) {{$template->phone_code=='243'? 'selected="selected"':''}} @endif>Zaire (+243)</option>
                          <option value="260" @if(!empty($template)) {{$template->phone_code=='260'? 'selected="selected"':''}} @endif>Zambia (+260)</option>
                          <option value="263" @if(!empty($template)) {{$template->phone_code=='263'? 'selected="selected"':''}} @endif>Zimbabwe (+263)</option>
                        </select>
                      </span>
                      <input type="number" name="phone_number" min="7" class="form-control" @if(!empty($template))value="{{$template->phone_number}}" @endif placeholder="Phone Number" required/>
                    </div>
                  </div>
		              <!-- <div class="col-md-12">
		                <div class="form-group">
		                  <label>Phone Number <span class="required" style="color: red;">*</span></label>
		                  <input type="number" class="form-control" min="7" placeholder="Phone Number"  name="phone_number" @if(!empty($template))value="{{$template->phone_number}}" @endif required />
		                </div>
		              </div> -->
                  <div class="col-md-12">
                    <label>Mobile Number <span class="required" style="color: red;">*</span></label>
                    <div class="form-group" style="display:flex">
                      <span class="input-group-addon" id="basic-addon1" style="padding: 0px 3px !important;">
                        <select name="mobile_code" id="input" class="phone-nmbr form-control" style="width:205px;">
                          <option value="93" @if(!empty($template)) {{$template->mobile_code=='93'? 'selected="selected"':''}} @endif>Afghanistan (+93)</option>
                          <option value="355" @if(!empty($template)) {{$template->mobile_code=='355'? 'selected="selected"':''}} @endif>Albania (+355)</option>
                          <option value="213" @if(!empty($template)) {{$template->mobile_code=='213'? 'selected="selected"':''}} @endif>Algeria (+213)</option>
                          <option value="1684" @if(!empty($template)) {{$template->mobile_code=='1684'? 'selected="selected"':''}} @endif>American Samoa (+1684)</option>
                          <option value="376" @if(!empty($template)) {{$template->mobile_code=='376'? 'selected="selected"':''}} @endif>Andorra (+376)</option>
                          <option value="244" @if(!empty($template)) {{$template->mobile_code=='244'? 'selected="selected"':''}} @endif>Angola (+244)</option>
                          <option value="1264" @if(!empty($template)) {{$template->mobile_code=='1264'? 'selected="selected"':''}} @endif>Anguilla (+1264)</option>
                          <option value="672" @if(!empty($template)) {{$template->mobile_code=='672'? 'selected="selected"':''}} @endif>Antarctica (+672)</option>
                          <option value="1268" @if(!empty($template)) {{$template->mobile_code=='1268'? 'selected="selected"':''}} @endif>Antigua and Barbuda (+1268)</option>
                          <option value="54" @if(!empty($template)) {{$template->mobile_code=='54'? 'selected="selected"':''}} @endif>Argentina (+54)</option>
                          <option value="374" @if(!empty($template)) {{$template->mobile_code=='374'? 'selected="selected"':''}} @endif>Armenia (+374)</option>
                          <option value="297" @if(!empty($template)) {{$template->mobile_code=='297'? 'selected="selected"':''}} @endif>Aruba (+297)</option>
                          <option value="61" @if(!empty($template)) {{$template->mobile_code=='61'? 'selected="selected"':''}} @endif>Australia (+61)</option>
                          <option value="43" @if(!empty($template)) {{$template->mobile_code=='43'? 'selected="selected"':''}} @endif>Austria (+43)</option>
                          <option value="994" @if(!empty($template)) {{$template->mobile_code=='994'? 'selected="selected"':''}} @endif>Azerbaijan (+994)</option>
                          <option value="1242" @if(!empty($template)) {{$template->mobile_code=='1242'? 'selected="selected"':''}} @endif>Bahamas (+1242)</option>
                          <option value="973" @if(!empty($template)) {{$template->mobile_code=='973'? 'selected="selected"':''}} @endif>Bahrain (+973)</option>
                          <option value="880" @if(!empty($template)) {{$template->mobile_code=='880'? 'selected="selected"':''}} @endif>Bangladesh (+880)</option>
                          <option value="1246" @if(!empty($template)) {{$template->mobile_code=='1246'? 'selected="selected"':''}} @endif>Barbados (+1246)</option>
                          <option value="375" @if(!empty($template)) {{$template->mobile_code=='375'? 'selected="selected"':''}} @endif>Belarus (+375)</option>
                          <option value="32" @if(!empty($template)) {{$template->mobile_code=='32'? 'selected="selected"':''}} @endif>Belgium (+32)</option>
                          <option value="501" @if(!empty($template)) {{$template->mobile_code=='501'? 'selected="selected"':''}} @endif>Belize (+501)</option>
                          <option value="229" @if(!empty($template)) {{$template->mobile_code=='229'? 'selected="selected"':''}} @endif>Benin (+229)</option>
                          <option value="1441" @if(!empty($template)) {{$template->mobile_code=='1441'? 'selected="selected"':''}} @endif>Bermuda (+1441)</option>
                          <option value="975" @if(!empty($template)) {{$template->mobile_code=='975'? 'selected="selected"':''}} @endif>Bhutan (+975)</option>
                          <option value="591" @if(!empty($template)) {{$template->mobile_code=='591'? 'selected="selected"':''}} @endif>Bolivia (+591)</option>
                          <option value="387" @if(!empty($template)) {{$template->mobile_code=='387'? 'selected="selected"':''}} @endif>Bosnia and Herzegovina (+387)</option>
                          <option value="267" @if(!empty($template)) {{$template->mobile_code=='267'? 'selected="selected"':''}} @endif>Botswana (+267)</option>
                          <option value="47" @if(!empty($template)) {{$template->mobile_code=='47'? 'selected="selected"':''}} @endif>Bouvet Island (+47)</option>
                          <option value="55" @if(!empty($template)) {{$template->mobile_code=='55'? 'selected="selected"':''}} @endif>Brazil (+55)</option>
                          <option value="246" @if(!empty($template)) {{$template->mobile_code=='246'? 'selected="selected"':''}} @endif>British Indian Ocean Territories (+246)</option>
                          <option value="673" @if(!empty($template)) {{$template->mobile_code=='673'? 'selected="selected"':''}} @endif>Brunei Darussalam (+673)</option>
                          <option value="359" @if(!empty($template)) {{$template->mobile_code=='359'? 'selected="selected"':''}} @endif>Bulgaria (+359)</option>
                          <option value="226" @if(!empty($template)) {{$template->mobile_code=='226'? 'selected="selected"':''}} @endif>Burkina Faso (+226)</option>
                          <option value="257" @if(!empty($template)) {{$template->mobile_code=='257'? 'selected="selected"':''}} @endif>Burundi (+257)</option>
                          <option value="855" @if(!empty($template)) {{$template->mobile_code=='855'? 'selected="selected"':''}} @endif>Cambodia (+855)</option>
                          <option value="237" @if(!empty($template)) {{$template->mobile_code=='237'? 'selected="selected"':''}} @endif>Cameroon (+237)</option>
                          <option value="1" @if(!empty($template)) {{$template->mobile_code=='1'? 'selected="selected"':''}} @endif>Canada (+1)</option>
                          <option value="238" @if(!empty($template)) {{$template->mobile_code=='238'? 'selected="selected"':''}} @endif>Cape Verde (+238)</option>
                          <option value="1345" @if(!empty($template)) {{$template->mobile_code=='1345'? 'selected="selected"':''}} @endif>Cayman Islands (+1345)</option>
                          <option value="236" @if(!empty($template)) {{$template->mobile_code=='236'? 'selected="selected"':''}} @endif>Central African Republic (+236)</option>
                          <option value="235" @if(!empty($template)) {{$template->mobile_code=='235'? 'selected="selected"':''}} @endif>Chad (+235)</option>
                          <option value="56" @if(!empty($template)) {{$template->mobile_code=='56'? 'selected="selected"':''}} @endif>Chile (+56)</option>
                          <option value="86" @if(!empty($template)) {{$template->mobile_code=='86'? 'selected="selected"':''}} @endif>China, People's Republic of (+86)</option>
                          <option value="61" @if(!empty($template)) {{$template->mobile_code=='61'? 'selected="selected"':''}} @endif>Christmas Island (+61)</option>
                          <option value="61" @if(!empty($template)) {{$template->mobile_code=='61'? 'selected="selected"':''}} @endif>Cocos Islands (+61)</option>
                          <option value="57" @if(!empty($template)) {{$template->mobile_code=='57'? 'selected="selected"':''}} @endif>Colombia (+57)</option>
                          <option value="269" @if(!empty($template)) {{$template->mobile_code=='269'? 'selected="selected"':''}} @endif>Comoros (+269)</option>
                          <option value="243" @if(!empty($template)) {{$template->mobile_code=='243'? 'selected="selected"':''}} @endif>Congo (+243)</option>
                          <option value="682" @if(!empty($template)) {{$template->mobile_code=='682'? 'selected="selected"':''}} @endif>Cook Islands (+682)</option>
                          <option value="506" @if(!empty($template)) {{$template->mobile_code=='506'? 'selected="selected"':''}} @endif>Costa Rica (+506)</option>
                          <option value="225" @if(!empty($template)) {{$template->mobile_code=='225'? 'selected="selected"':''}} @endif>Cote D'ivoire (+225)</option>
                          <option value="385" @if(!empty($template)) {{$template->mobile_code=='385'? 'selected="selected"':''}} @endif>Croatia (+385)</option>
                          <option value="53" @if(!empty($template)) {{$template->mobile_code=='53'? 'selected="selected"':''}} @endif>Cuba (+53)</option>
                          <option value="357" @if(!empty($template)) {{$template->mobile_code=='357'? 'selected="selected"':''}} @endif>Cyprus (+357)</option>
                          <option value="420" @if(!empty($template)) {{$template->mobile_code=='420'? 'selected="selected"':''}} @endif>Czech Republic (+420)</option>
                          <option value="45" @if(!empty($template)) {{$template->mobile_code=='45'? 'selected="selected"':''}} @endif>Denmark (+45)</option>
                          <option value="253" @if(!empty($template)) {{$template->mobile_code=='253'? 'selected="selected"':''}} @endif>Djibouti (+253)</option>
                          <option value="1767" @if(!empty($template)) {{$template->mobile_code=='1767'? 'selected="selected"':''}} @endif>Dominica (+1767)</option>
                          <option value="1809" @if(!empty($template)) {{$template->mobile_code=='1809'? 'selected="selected"':''}} @endif>Dominican Republic (+1809)</option>
                          <option value="670" @if(!empty($template)) {{$template->mobile_code=='670'? 'selected="selected"':''}} @endif>East Timor (+670)</option>
                          <option value="593" @if(!empty($template)) {{$template->mobile_code=='593'? 'selected="selected"':''}} @endif>Ecuador (+593)</option>
                          <option value="20" @if(!empty($template)) {{$template->mobile_code=='20'? 'selected="selected"':''}} @endif>Egypt (+20)</option>
                          <option value="503" @if(!empty($template)) {{$template->mobile_code=='503'? 'selected="selected"':''}} @endif>El Salvador (+503)</option>
                          <option value="240" @if(!empty($template)) {{$template->mobile_code=='240'? 'selected="selected"':''}} @endif>Equatorial Guinea (+240)</option>
                          <option value="291" @if(!empty($template)) {{$template->mobile_code=='291'? 'selected="selected"':''}} @endif>Eritrea (+291)</option>
                          <option value="372" @if(!empty($template)) {{$template->mobile_code=='372'? 'selected="selected"':''}} @endif>Estonia (+372)</option>
                          <option value="251" @if(!empty($template)) {{$template->mobile_code=='251'? 'selected="selected"':''}} @endif>Ethiopia (+251)</option>
                          <option value="500" @if(!empty($template)) {{$template->mobile_code=='500'? 'selected="selected"':''}} @endif>Falkland Islands (+500)</option>
                          <option value="298" @if(!empty($template)) {{$template->mobile_code=='298'? 'selected="selected"':''}} @endif>Faroe Islands (+298)</option>
                          <option value="679" @if(!empty($template)) {{$template->mobile_code=='679'? 'selected="selected"':''}} @endif>Fiji (+679)</option>
                          <option value="358" @if(!empty($template)) {{$template->mobile_code=='358'? 'selected="selected"':''}} @endif>Finland (+358)</option>
                          <option value="33" @if(!empty($template)) {{$template->mobile_code=='33'? 'selected="selected"':''}} @endif>France (+33)</option>
                          <option value="33" @if(!empty($template)) {{$template->mobile_code=='33'? 'selected="selected"':''}} @endif>France, Metropolitan (+33)</option>
                          <option value="594" @if(!empty($template)) {{$template->mobile_code=='594'? 'selected="selected"':''}} @endif>French Guiana (+594)</option>
                          <option value="689" @if(!empty($template)) {{$template->mobile_code=='689'? 'selected="selected"':''}} @endif>French Polynesia (+689)</option>
                          <option value="33" @if(!empty($template)) {{$template->mobile_code=='33'? 'selected="selected"':''}} @endif>French Southern Territories (+33)</option>
                          <option value="389" @if(!empty($template)) {{$template->mobile_code=='389'? 'selected="selected"':''}} @endif>FYROM (+389)</option>
                          <option value="241" @if(!empty($template)) {{$template->mobile_code=='241'? 'selected="selected"':''}} @endif>Gabon (+241)</option>
                          <option value="220" @if(!empty($template)) {{$template->mobile_code=='220'? 'selected="selected"':''}} @endif>Gambia (+220)</option>
                          <option value="995" @if(!empty($template)) {{$template->mobile_code=='995'? 'selected="selected"':''}} @endif>Georgia (+995)</option>
                          <option value="49" @if(!empty($template)) {{$template->mobile_code=='49'? 'selected="selected"':''}} @endif>Germany (+49)</option>
                          <option value="233" @if(!empty($template)) {{$template->mobile_code=='233'? 'selected="selected"':''}} @endif>Ghana (+233)</option>
                          <option value="350" @if(!empty($template)) {{$template->mobile_code=='350'? 'selected="selected"':''}} @endif>Gibraltar (+350)</option>
                          <option value="30" @if(!empty($template)) {{$template->mobile_code=='30'? 'selected="selected"':''}} @endif>Greece (+30)</option>
                          <option value="299" @if(!empty($template)) {{$template->mobile_code=='299'? 'selected="selected"':''}} @endif>Greenland (+299)</option>
                          <option value="1473" @if(!empty($template)) {{$template->mobile_code=='1473'? 'selected="selected"':''}} @endif>Grenada (+1473)</option>
                          <option value="590" @if(!empty($template)) {{$template->mobile_code=='590'? 'selected="selected"':''}} @endif>Guadeloupe (+590)</option>
                          <option value="1671" @if(!empty($template)) {{$template->mobile_code=='1671'? 'selected="selected"':''}} @endif>Guam (+1671)</option>
                          <option value="32" @if(!empty($template)) {{$template->mobile_code=='502'? 'selected="selected"':''}} @endif>Guatemala (+502)</option>
                          <option value="224" @if(!empty($template)) {{$template->mobile_code=='224'? 'selected="selected"':''}} @endif>Guinea (+224)</option>
                          <option value="245" @if(!empty($template)) {{$template->mobile_code=='245'? 'selected="selected"':''}} @endif>Guinea-Bissau (+245)</option>
                          <option value="592" @if(!empty($template)) {{$template->mobile_code=='592'? 'selected="selected"':''}} @endif>Guyana (+592)</option>
                          <option value="509" @if(!empty($template)) {{$template->mobile_code=='509'? 'selected="selected"':''}} @endif>Haiti (+509)</option>
                          <option value="61" @if(!empty($template)) {{$template->mobile_code=='61'? 'selected="selected"':''}} @endif>Heard Island And Mcdonald Islands (+61)</option>
                          <option value="504" @if(!empty($template)) {{$template->mobile_code=='504'? 'selected="selected"':''}} @endif>Honduras (+504)</option>
                          <option value="852" @if(!empty($template)) {{$template->mobile_code=='852'? 'selected="selected"':''}} @endif>Hong Kong (+852)</option>
                          <option value="36" @if(!empty($template)) {{$template->mobile_code=='36'? 'selected="selected"':''}} @endif>Hungary (+36)</option>
                          <option value="354" @if(!empty($template)) {{$template->mobile_code=='354'? 'selected="selected"':''}} @endif>Iceland (+354)</option>
                          <option value="91" @if(!empty($template)) {{$template->mobile_code=='91'? 'selected="selected"':''}} @endif>India (+91)</option>
                          <option value="62" @if(!empty($template)) {{$template->mobile_code=='62'? 'selected="selected"':''}} @endif>Indonesia (+62)</option>
                          <option value="98" @if(!empty($template)) {{$template->mobile_code=='98'? 'selected="selected"':''}} @endif>Iran (+98)</option>
                          <option value="964" @if(!empty($template)) {{$template->mobile_code=='964'? 'selected="selected"':''}} @endif>Iraq (+964)</option>
                          <option value="353" @if(!empty($template)) {{$template->mobile_code=='353'? 'selected="selected"':''}} @endif>Ireland (+353)</option>
                          <option value="972" @if(!empty($template)) {{$template->mobile_code=='972'? 'selected="selected"':''}} @endif>Israel (+972)</option>
                          <option value="39" @if(!empty($template)) {{$template->mobile_code=='39'? 'selected="selected"':''}} @endif>Italy (+39)</option>
                          <option value="1876" @if(!empty($template)) {{$template->mobile_code=='1876'? 'selected="selected"':''}} @endif>Jamaica (+1876)</option>
                          <option value="81" @if(!empty($template)) {{$template->mobile_code=='81'? 'selected="selected"':''}} @endif>Japan (+81)</option>
                          <option value="962" @if(!empty($template)) {{$template->mobile_code=='962'? 'selected="selected"':''}} @endif>Jordan (+962)</option>
                          <option value="7" @if(!empty($template)) {{$template->mobile_code=='7'? 'selected="selected"':''}} @endif>Kazakhstan (+7)</option>
                          <option value="254" @if(!empty($template)) {{$template->mobile_code=='254'? 'selected="selected"':''}} @endif>Kenya (+254)</option>
                          <option value="686" @if(!empty($template)) {{$template->mobile_code=='686'? 'selected="selected"':''}} @endif>Kiribati (+686)</option>
                          <option value="965" @if(!empty($template)) {{$template->mobile_code=='965'? 'selected="selected"':''}} @endif>Kuwait (+965)</option>
                          <option value="996" @if(!empty($template)) {{$template->mobile_code=='996'? 'selected="selected"':''}} @endif>Kyrgyzstan (+996)</option>
                          <option value="856" @if(!empty($template)) {{$template->mobile_code=='856'? 'selected="selected"':''}} @endif>Lao Peoples Democratic Republic (+856)</option>
                          <option value="371" @if(!empty($template)) {{$template->mobile_code=='371'? 'selected="selected"':''}} @endif>Latvia (+371)</option>
                          <option value="961" @if(!empty($template)) {{$template->mobile_code=='961'? 'selected="selected"':''}} @endif>Lebanon (+961)</option>
                          <option value="266" @if(!empty($template)) {{$template->mobile_code=='266'? 'selected="selected"':''}} @endif>Lesotho (+266)</option>
                          <option value="231" @if(!empty($template)) {{$template->mobile_code=='231'? 'selected="selected"':''}} @endif>Liberia (+231)</option>
                          <option value="218" @if(!empty($template)) {{$template->mobile_code=='218'? 'selected="selected"':''}} @endif>Libyan Arab Jamahiriya (+218)</option>
                          <option value="423" @if(!empty($template)) {{$template->mobile_code=='423423'? 'selected="selected"':''}} @endif>Liechtenstein (+423)</option>
                          <option value="423" @if(!empty($template)) {{$template->mobile_code=='370'? 'selected="selected"':''}} @endif>Lithuania (+370)</option>
                          <option value="352" @if(!empty($template)) {{$template->mobile_code=='352'? 'selected="selected"':''}} @endif>Luxembourg (+352)</option>
                          <option value="853" @if(!empty($template)) {{$template->mobile_code=='853'? 'selected="selected"':''}} @endif>Macau (+853)</option>
                          <option value="261" @if(!empty($template)) {{$template->mobile_code=='261'? 'selected="selected"':''}} @endif>Madagascar (+261)</option>
                          <option value="265" @if(!empty($template)) {{$template->mobile_code=='265'? 'selected="selected"':''}} @endif>Malawi (+265)</option>
                          <option value="60" @if(!empty($template)) {{$template->mobile_code=='60'? 'selected="selected"':''}} @endif>Malaysia (+60)</option>
                          <option value="960" @if(!empty($template)) {{$template->mobile_code=='960'? 'selected="selected"':''}} @endif>Maldives (+960)</option>
                          <option value="223" @if(!empty($template)) {{$template->mobile_code=='223'? 'selected="selected"':''}} @endif>Mali (+223)</option>
                          <option value="356" @if(!empty($template)) {{$template->mobile_code=='356'? 'selected="selected"':''}} @endif>Malta (+356)</option>
                          <option value="692" @if(!empty($template)) {{$template->mobile_code=='692'? 'selected="selected"':''}} @endif>Marshall Islands (+692)</option>
                          <option value="596" @if(!empty($template)) {{$template->mobile_code=='596'? 'selected="selected"':''}} @endif>Martinique (+596)</option>
                          <option value="222" @if(!empty($template)) {{$template->mobile_code=='222'? 'selected="selected"':''}} @endif>Mauritania (+222)</option>
                          <option value="230" @if(!empty($template)) {{$template->mobile_code=='230'? 'selected="selected"':''}} @endif>Mauritius (+230)</option>
                          <option value="262" @if(!empty($template)) {{$template->mobile_code=='262'? 'selected="selected"':''}} @endif>Mayotte (+262)</option>
                          <option value="52" @if(!empty($template)) {{$template->mobile_code=='52'? 'selected="selected"':''}} @endif>Mexico (+52)</option>
                          <option value="691" @if(!empty($template)) {{$template->mobile_code=='691'? 'selected="selected"':''}} @endif>Micronesia (+691)</option>
                          <option value="373" @if(!empty($template)) {{$template->mobile_code=='373'? 'selected="selected"':''}} @endif>Moldova (+373)</option>
                          <option value="377" @if(!empty($template)) {{$template->mobile_code=='377'? 'selected="selected"':''}} @endif>Monaco (+377)</option>
                          <option value="976" @if(!empty($template)) {{$template->mobile_code=='976'? 'selected="selected"':''}} @endif>Mongolia (+976)</option>
                          <option value="1664" @if(!empty($template)) {{$template->mobile_code=='1664'? 'selected="selected"':''}} @endif>Montserrat (+1664)</option>
                          <option value="212" @if(!empty($template)) {{$template->mobile_code=='212'? 'selected="selected"':''}} @endif>Morocco (+212)</option>
                          <option value="258" @if(!empty($template)) {{$template->mobile_code=='258'? 'selected="selected"':''}} @endif>Mozambique (+258)</option>
                          <option value="95" @if(!empty($template)) {{$template->mobile_code=='95'? 'selected="selected"':''}} @endif>Myanmar (+95)</option>
                          <option value="264" @if(!empty($template)) {{$template->mobile_code=='264'? 'selected="selected"':''}} @endif>Namibia (+264)</option>
                          <option value="674" @if(!empty($template)) {{$template->mobile_code=='674'? 'selected="selected"':''}} @endif>Nauru (+674)</option>
                          <option value="977" @if(!empty($template)) {{$template->mobile_code=='977'? 'selected="selected"':''}} @endif>Nepal (+977)</option>
                          <option value="31" @if(!empty($template)) {{$template->mobile_code=='31'? 'selected="selected"':''}} @endif>Netherlands (+31)</option>
                          <option value="599" @if(!empty($template)) {{$template->mobile_code=='599'? 'selected="selected"':''}} @endif>Netherlands Antilles (+599)</option>
                          <option value="687" @if(!empty($template)) {{$template->mobile_code=='687'? 'selected="selected"':''}} @endif>New Caledonia (+687)</option>
                          <option value="64" @if(!empty($template)) {{$template->mobile_code=='64'? 'selected="selected"':''}} @endif>New Zealand (+64)</option>
                          <option value="505" @if(!empty($template)) {{$template->mobile_code=='505'? 'selected="selected"':''}} @endif>Nicaragua (+505)</option>
                          <option value="227" @if(!empty($template)) {{$template->mobile_code=='227'? 'selected="selected"':''}} @endif>Niger (+227)</option>
                          <option value="234" @if(!empty($template)) {{$template->mobile_code=='234'? 'selected="selected"':''}} @endif>Nigeria (+234)</option>
                          <option value="683" @if(!empty($template)) {{$template->mobile_code=='683'? 'selected="selected"':''}} @endif>Niue (+683)</option>
                          <option value="672" @if(!empty($template)) {{$template->mobile_code=='672'? 'selected="selected"':''}} @endif>Norfolk Island (+672)</option>
                          <option value="1670" @if(!empty($template)) {{$template->mobile_code=='1670'? 'selected="selected"':''}} @endif>Northern Mariana Islands (+1670)</option>
                          <option value="47" @if(!empty($template)) {{$template->mobile_code=='47'? 'selected="selected"':''}} @endif>Norway (+47)</option>
                          <option value="968" @if(!empty($template)) {{$template->mobile_code=='968'? 'selected="selected"':''}} @endif>Oman (+968)</option>
                          <option value="92" @if(!empty($template)) {{$template->mobile_code=='92'? 'selected="selected"':''}} @endif>Pakistan (+92)</option>
                          <option value="680" @if(!empty($template)) {{$template->mobile_code=='680'? 'selected="selected"':''}} @endif>Palau (+680)</option>
                          <option value="507" @if(!empty($template)) {{$template->mobile_code=='507'? 'selected="selected"':''}} @endif>Panama (+507)</option>
                          <option value="675" @if(!empty($template)) {{$template->mobile_code=='675'? 'selected="selected"':''}} @endif>Papua New Guinea (+675)</option>
                          <option value="595" @if(!empty($template)) {{$template->mobile_code=='595'? 'selected="selected"':''}} @endif>Paraguay (+595)</option>
                          <option value="51" @if(!empty($template)) {{$template->mobile_code=='51'? 'selected="selected"':''}} @endif>Peru (+51)</option>
                          <option value="63" @if(!empty($template)) {{$template->mobile_code=='63'? 'selected="selected"':''}} @endif>Philippines (+63)</option>
                          <option value="870" @if(!empty($template)) {{$template->mobile_code=='870'? 'selected="selected"':''}} @endif>Pitcairn (+870)</option>
                          <option value="48" @if(!empty($template)) {{$template->mobile_code=='48'? 'selected="selected"':''}} @endif>Poland (+48)</option>
                          <option value="351" @if(!empty($template)) {{$template->mobile_code=='351'? 'selected="selected"':''}} @endif>Portugal (+351)</option>
                          <option value="1" @if(!empty($template)) {{$template->mobile_code=='1'? 'selected="selected"':''}} @endif>Puerto Rico (+1)</option>
                          <option value="974" @if(!empty($template)) {{$template->mobile_code=='974'? 'selected="selected"':''}} @endif>Qatar (+974)</option>
                          <option value="262" @if(!empty($template)) {{$template->mobile_code=='262'? 'selected="selected"':''}} @endif>Reunion (+262)</option>
                          <option value="40" @if(!empty($template)) {{$template->mobile_code=='40'? 'selected="selected"':''}} @endif>Romania (+40)</option>
                          <option value="7" @if(!empty($template)) {{$template->mobile_code=='7'? 'selected="selected"':''}} @endif>Russian Federation (+7)</option>
                          <option value="250" @if(!empty($template)) {{$template->mobile_code=='250'? 'selected="selected"':''}} @endif>Rwanda (+250)</option>
                          <option value="290" @if(!empty($template)) {{$template->mobile_code=='290'? 'selected="selected"':''}} @endif>Saint Helena (+290)</option>
                          <option value="1869" @if(!empty($template)) {{$template->mobile_code=='1869'? 'selected="selected"':''}} @endif>Saint Kitts and Nevis (+1869)</option>
                          <option value="1758" @if(!empty($template)) {{$template->mobile_code=='1758'? 'selected="selected"':''}} @endif>Saint Lucia (+1758)</option>
                          <option value="508" @if(!empty($template)) {{$template->mobile_code=='508'? 'selected="selected"':''}} @endif>Saint Pierre and Miquelon (+508)</option>
                          <option value="1784" @if(!empty($template)) {{$template->mobile_code=='1784'? 'selected="selected"':''}} @endif>Saint Vincent and The Grenadines (+1784)</option>
                          <option value="685" @if(!empty($template)) {{$template->mobile_code=='685'? 'selected="selected"':''}} @endif>Samoa (+685)</option>
                          <option value="378" @if(!empty($template)) {{$template->mobile_code=='378'? 'selected="selected"':''}} @endif>San Marino (+378)</option>
                          <option value="239" @if(!empty($template)) {{$template->mobile_code=='239'? 'selected="selected"':''}} @endif>Sao Tome and Principe (+239)</option>
                          <option value="966" @if(!empty($template)) {{$template->mobile_code=='966'? 'selected="selected"':''}} @endif>Saudi Arabia (+966)</option>
                          <option value="221" @if(!empty($template)) {{$template->mobile_code=='221'? 'selected="selected"':''}} @endif>Senegal (+221)</option>
                          <option value="248" @if(!empty($template)) {{$template->mobile_code=='248'? 'selected="selected"':''}} @endif>Seychelles (+248)</option>
                          <option value="232" @if(!empty($template)) {{$template->mobile_code=='232'? 'selected="selected"':''}} @endif>Sierra Leone (+232)</option>
                          <option value="65" @if(!empty($template)) {{$template->mobile_code=='65'? 'selected="selected"':''}} @endif>Singapore (+65)</option>
                          <option value="421" @if(!empty($template)) {{$template->mobile_code=='421'? 'selected="selected"':''}} @endif>Slovakia (+421)</option>
                          <option value="386" @if(!empty($template)) {{$template->mobile_code=='386'? 'selected="selected"':''}} @endif>Slovenia (+386)</option>
                          <option value="677" @if(!empty($template)) {{$template->mobile_code=='677'? 'selected="selected"':''}} @endif>Solomon Islands (+677)</option>
                          <option value="252" @if(!empty($template)) {{$template->mobile_code=='252'? 'selected="selected"':''}} @endif>Somalia (+252)</option>
                          <option value="27" @if(!empty($template)) {{$template->mobile_code=='27'? 'selected="selected"':''}} @endif>South Africa (+27)</option>
                          <option value="500" @if(!empty($template)) {{$template->mobile_code=='500'? 'selected="selected"':''}} @endif>South Georgia and Sandwich Islands (+500)</option>
                          <option value="82" @if(!empty($template)) {{$template->mobile_code=='82'? 'selected="selected"':''}} @endif>South Korea (+82)</option>
                          <option value="34" @if(!empty($template)) {{$template->mobile_code=='34'? 'selected="selected"':''}} @endif>Spain (+34)</option>
                          <option value="94" @if(!empty($template)) {{$template->mobile_code=='94'? 'selected="selected"':''}} @endif>Sri Lanka (+94)</option>
                          <option value="249" @if(!empty($template)) {{$template->mobile_code=='249'? 'selected="selected"':''}} @endif>Sudan (+249)</option>
                          <option value="597" @if(!empty($template)) {{$template->mobile_code=='597'? 'selected="selected"':''}} @endif>Suriname (+597)</option>
                          <option value="47" @if(!empty($template)) {{$template->mobile_code=='47'? 'selected="selected"':''}} @endif>Svalbard and Jan Mayen (+47)</option>
                          <option value="268" @if(!empty($template)) {{$template->mobile_code=='268'? 'selected="selected"':''}} @endif>Swaziland (+268)</option>
                          <option value="46" @if(!empty($template)) {{$template->mobile_code=='46'? 'selected="selected"':''}} @endif>Sweden (+46)</option>
                          <option value="41" @if(!empty($template)) {{$template->mobile_code=='41'? 'selected="selected"':''}} @endif>Switzerland (+41)</option>
                          <option value="963" @if(!empty($template)) {{$template->mobile_code=='963'? 'selected="selected"':''}} @endif>Syrian Arab Republic (+963)</option>
                          <option value="886" @if(!empty($template)) {{$template->mobile_code=='886'? 'selected="selected"':''}} @endif>Taiwan (+886)</option>
                          <option value="992" @if(!empty($template)) {{$template->mobile_code=='992'? 'selected="selected"':''}} @endif>Tajikistan (+992)</option>
                          <option value="255" @if(!empty($template)) {{$template->mobile_code=='255'? 'selected="selected"':''}} @endif>Tanzania (+255)</option>
                          <option value="66" @if(!empty($template)) {{$template->mobile_code=='66'? 'selected="selected"':''}} @endif>Thailand (+66)</option>
                          <option value="228" @if(!empty($template)) {{$template->mobile_code=='228'? 'selected="selected"':''}} @endif>Togo (+228)</option>
                          <option value="690" @if(!empty($template)) {{$template->mobile_code=='690'? 'selected="selected"':''}} @endif>Tokelau (+690)</option>
                          <option value="676" @if(!empty($template)) {{$template->mobile_code=='676'? 'selected="selected"':''}} @endif>Tonga (+676)</option>
                          <option value="1868" @if(!empty($template)) {{$template->mobile_code=='1868'? 'selected="selected"':''}} @endif>Trinidad and Tobago (+1868)</option>
                          <option value="216" @if(!empty($template)) {{$template->mobile_code=='216'? 'selected="selected"':''}} @endif>Tunisia (+216)</option>
                          <option value="90" @if(!empty($template)) {{$template->mobile_code=='90'? 'selected="selected"':''}} @endif>Turkey (+90)</option>
                          <option value="993" @if(!empty($template)) {{$template->mobile_code=='993'? 'selected="selected"':''}} @endif>Turkmenistan (+993)</option>
                          <option value="1649" @if(!empty($template)) {{$template->mobile_code=='1649'? 'selected="selected"':''}} @endif>Turks and Caicos Islands (+1649)</option>
                          <option value="688" @if(!empty($template)) {{$template->mobile_code=='688'? 'selected="selected"':''}} @endif>Tuvalu (+688)</option>
                          <option value="256" @if(!empty($template)) {{$template->mobile_code=='256'? 'selected="selected"':''}} @endif>Uganda (+256)</option>
                          <option value="380" @if(!empty($template)) {{$template->mobile_code=='380'? 'selected="selected"':''}} @endif>Ukraine (+380)</option>
                          <option value="971" @if(!empty($template)) {{$template->mobile_code=='971'? 'selected="selected"':''}} @endif>United Arab Emirates (+971)</option>
                          <option value="44" @if(!empty($template)) {{$template->mobile_code=='44'? 'selected="selected"':''}} @endif>United Kingdom (+44)</option>
                          <option value="1" @if(!empty($template)) {{$template->mobile_code=='1'? 'selected="selected"':''}} @endif>United States (+1)</option>
                          <option value="699" @if(!empty($template)) {{$template->mobile_code=='699'? 'selected="selected"':''}} @endif>United States Minor Outlying Islands (+699)</option>
                          <option value="598" @if(!empty($template)) {{$template->mobile_code=='598'? 'selected="selected"':''}} @endif>Uruguay (+598)</option>
                          <option value="998" @if(!empty($template)) {{$template->mobile_code=='998'? 'selected="selected"':''}} @endif>Uzbekistan (+998)</option>
                          <option value="678" @if(!empty($template)) {{$template->mobile_code=='678'? 'selected="selected"':''}} @endif>Vanuatu (+678)</option>
                          <option value="39" @if(!empty($template)) {{$template->mobile_code=='39'? 'selected="selected"':''}} @endif>Vatican City State (+39)</option>
                          <option value="58" @if(!empty($template)) {{$template->mobile_code=='58'? 'selected="selected"':''}} @endif>Venezuela (+58)</option>
                          <option value="84" @if(!empty($template)) {{$template->mobile_code=='84'? 'selected="selected"':''}} @endif>Vietnam (+84)</option>
                          <option value="1284" @if(!empty($template)) {{$template->mobile_code=='1284'? 'selected="selected"':''}} @endif>Virgin Islands (British) (+1284)</option>
                          <option value="1340" @if(!empty($template)) {{$template->mobile_code=='1340'? 'selected="selected"':''}} @endif>Virgin Islands (U.S.) (+1340)</option>
                          <option value="681" @if(!empty($template)) {{$template->mobile_code=='681'? 'selected="selected"':''}} @endif>Wallis And Futuna Islands (+681)</option>
                          <option value="212" @if(!empty($template)) {{$template->mobile_code=='212'? 'selected="selected"':''}} @endif>Western Sahara (+212)</option>
                          <option value="967" @if(!empty($template)) {{$template->mobile_code=='967'? 'selected="selected"':''}} @endif>Yemen (+967)</option>
                          <option value="381" @if(!empty($template)) {{$template->mobile_code=='381'? 'selected="selected"':''}} @endif>Yugoslavia (+381)</option>
                          <option value="243" @if(!empty($template)) {{$template->mobile_code=='243'? 'selected="selected"':''}} @endif>Zaire (+243)</option>
                          <option value="260" @if(!empty($template)) {{$template->mobile_code=='260'? 'selected="selected"':''}} @endif>Zambia (+260)</option>
                          <option value="263" @if(!empty($template)) {{$template->mobile_code=='263'? 'selected="selected"':''}} @endif>Zimbabwe (+263)</option>
                        </select>
                      </span>
                      <input type="number" class="form-control" min="7" name="mbl_number" @if(!empty($template)) value="{{$template->mbl_number}}" @endif placeholder="Mobile Number(1025xxxxxx)" required>
                    </div>
                  </div>
		              <!-- <div class="col-md-12">
		                <div class="form-group">
		                  <label>Mobile Number <span class="required" style="color: red;">*</span></label>
		                  <input type="number" name="mbl_number" min="7"class="form-control"  placeholder="Mobile Number" @if(!empty($template)) value="{{$template->mbl_number}}" @endif required>
		                </div>
		              </div> -->
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Email address <span class="required" style="color: red;">*</span></label>
		                  <input type="email" name="email" class="form-control"  placeholder="Email" @if(!empty($template)) value="{{$template->email}}" @endif >
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Location <span class="required" style="color: red;">*</span></label>
		                  <input type="text" name="location" class="form-control"  placeholder="Location"  @if(!empty($template)) value="{{$template->location}}" @endif >
		                </div>
		              </div>
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Business Address <span class="required" style="color: red;">*</span></label>
		                  <input type="text" name="business_address" class="form-control" required  placeholder="Business Address"  @if(!empty($template)) value="{{$template->business_address}}" @endif />
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Comapny Name</label>
		                  <input type="text" name="company_name" class="form-control"  placeholder="Comapny Name"  @if(!empty($template)) value="{{$template->company_name}}" @endif >
		                </div>
		              </div>
		            </div>
					  @else

						  <h4 class="field-title">Contact Information</h4>
						  <div class="row">
                <div class="col-md-12">
                  <label>Phone Number <span class="required" style="color: red;">*</span></label>
                  <div class="form-group" style="display:flex">
                    <span class="input-group-addon" id="basic-addon1" style="padding: 0px 3px !important;">
                      <select name="phone_code" id="input" class="phone-nmbr form-control" style="width:205px;">
                        <option value="93" {{$autofil->mobile_code=='93'? 'selected="selected"':''}}>Afghanistan (+93)</option>
                        <option value="355" {{$autofil->mobile_code=='355'? 'selected="selected"':''}}>Albania (+355)</option>
                        <option value="213" {{$autofil->mobile_code=='213'? 'selected="selected"':''}}>Algeria (+213)</option>
                        <option value="1684" {{$autofil->mobile_code=='1684'? 'selected="selected"':''}}>American Samoa (+1684)</option>
                        <option value="376" {{$autofil->mobile_code=='376'? 'selected="selected"':''}}>Andorra (+376)</option>
                        <option value="244" {{$autofil->mobile_code=='244'? 'selected="selected"':''}}>Angola (+244)</option>
                        <option value="1264" {{$autofil->mobile_code=='1264'? 'selected="selected"':''}}>Anguilla (+1264)</option>
                        <option value="672" {{$autofil->mobile_code=='672'? 'selected="selected"':''}}>Antarctica (+672)</option>
                        <option value="1268" {{$autofil->mobile_code=='1268'? 'selected="selected"':''}}>Antigua and Barbuda (+1268)</option>
                        <option value="54" {{$autofil->mobile_code=='54'? 'selected="selected"':''}}>Argentina (+54)</option>
                        <option value="374" {{$autofil->mobile_code=='374'? 'selected="selected"':''}}>Armenia (+374)</option>
                        <option value="297" {{$autofil->mobile_code=='297'? 'selected="selected"':''}}>Aruba (+297)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Australia (+61)</option>
                        <option value="43" {{$autofil->mobile_code=='43'? 'selected="selected"':''}}>Austria (+43)</option>
                        <option value="994" {{$autofil->mobile_code=='994'? 'selected="selected"':''}}>Azerbaijan (+994)</option>
                        <option value="1242" {{$autofil->mobile_code=='1242'? 'selected="selected"':''}}>Bahamas (+1242)</option>
                        <option value="973" {{$autofil->mobile_code=='973'? 'selected="selected"':''}}>Bahrain (+973)</option>
                        <option value="880" {{$autofil->mobile_code=='880'? 'selected="selected"':''}}>Bangladesh (+880)</option>
                        <option value="1246" {{$autofil->mobile_code=='1246'? 'selected="selected"':''}}>Barbados (+1246)</option>
                        <option value="375" {{$autofil->mobile_code=='375'? 'selected="selected"':''}}>Belarus (+375)</option>
                        <option value="32" {{$autofil->mobile_code=='32'? 'selected="selected"':''}}>Belgium (+32)</option>
                        <option value="501" {{$autofil->mobile_code=='501'? 'selected="selected"':''}}>Belize (+501)</option>
                        <option value="229" {{$autofil->mobile_code=='229'? 'selected="selected"':''}}>Benin (+229)</option>
                        <option value="1441" {{$autofil->mobile_code=='1441'? 'selected="selected"':''}}>Bermuda (+1441)</option>
                        <option value="975" {{$autofil->mobile_code=='975'? 'selected="selected"':''}}>Bhutan (+975)</option>
                        <option value="591" {{$autofil->mobile_code=='591'? 'selected="selected"':''}}>Bolivia (+591)</option>
                        <option value="387" {{$autofil->mobile_code=='387'? 'selected="selected"':''}}>Bosnia and Herzegovina (+387)</option>
                        <option value="267" {{$autofil->mobile_code=='267'? 'selected="selected"':''}}>Botswana (+267)</option>
                        <option value="47" {{$autofil->mobile_code=='47'? 'selected="selected"':''}}>Bouvet Island (+47)</option>
                        <option value="55" {{$autofil->mobile_code=='55'? 'selected="selected"':''}}>Brazil (+55)</option>
                        <option value="246" {{$autofil->mobile_code=='246'? 'selected="selected"':''}}>British Indian Ocean Territories (+246)</option>
                        <option value="673" {{$autofil->mobile_code=='673'? 'selected="selected"':''}}>Brunei Darussalam (+673)</option>
                        <option value="359" {{$autofil->mobile_code=='359'? 'selected="selected"':''}}>Bulgaria (+359)</option>
                        <option value="226" {{$autofil->mobile_code=='226'? 'selected="selected"':''}}>Burkina Faso (+226)</option>
                        <option value="257" {{$autofil->mobile_code=='257'? 'selected="selected"':''}}>Burundi (+257)</option>
                        <option value="855" {{$autofil->mobile_code=='855'? 'selected="selected"':''}}>Cambodia (+855)</option>
                        <option value="237" {{$autofil->mobile_code=='237'? 'selected="selected"':''}}>Cameroon (+237)</option>
                        <option value="1" {{$autofil->mobile_code=='1'? 'selected="selected"':''}}>Canada (+1)</option>
                        <option value="238" {{$autofil->mobile_code=='238'? 'selected="selected"':''}}>Cape Verde (+238)</option>
                        <option value="1345" {{$autofil->mobile_code=='1345'? 'selected="selected"':''}}>Cayman Islands (+1345)</option>
                        <option value="236" {{$autofil->mobile_code=='236'? 'selected="selected"':''}}>Central African Republic (+236)</option>
                        <option value="235" {{$autofil->mobile_code=='235'? 'selected="selected"':''}}>Chad (+235)</option>
                        <option value="56" {{$autofil->mobile_code=='56'? 'selected="selected"':''}}>Chile (+56)</option>
                        <option value="86" {{$autofil->mobile_code=='86'? 'selected="selected"':''}}>China, People's Republic of (+86)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Christmas Island (+61)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Cocos Islands (+61)</option>
                        <option value="57" {{$autofil->mobile_code=='57'? 'selected="selected"':''}}>Colombia (+57)</option>
                        <option value="269" {{$autofil->mobile_code=='269'? 'selected="selected"':''}}>Comoros (+269)</option>
                        <option value="243" {{$autofil->mobile_code=='243'? 'selected="selected"':''}}>Congo (+243)</option>
                        <option value="682" {{$autofil->mobile_code=='682'? 'selected="selected"':''}}>Cook Islands (+682)</option>
                        <option value="506" {{$autofil->mobile_code=='506'? 'selected="selected"':''}}>Costa Rica (+506)</option>
                        <option value="225" {{$autofil->mobile_code=='225'? 'selected="selected"':''}}>Cote D'ivoire (+225)</option>
                        <option value="385" {{$autofil->mobile_code=='385'? 'selected="selected"':''}}>Croatia (+385)</option>
                        <option value="53" {{$autofil->mobile_code=='53'? 'selected="selected"':''}}>Cuba (+53)</option>
                        <option value="357" {{$autofil->mobile_code=='357'? 'selected="selected"':''}}>Cyprus (+357)</option>
                        <option value="420" {{$autofil->mobile_code=='420'? 'selected="selected"':''}}>Czech Republic (+420)</option>
                        <option value="45" {{$autofil->mobile_code=='45'? 'selected="selected"':''}}>Denmark (+45)</option>
                        <option value="253" {{$autofil->mobile_code=='253'? 'selected="selected"':''}}>Djibouti (+253)</option>
                        <option value="1767" {{$autofil->mobile_code=='1767'? 'selected="selected"':''}}>Dominica (+1767)</option>
                        <option value="1809" {{$autofil->mobile_code=='1809'? 'selected="selected"':''}}>Dominican Republic (+1809)</option>
                        <option value="670" {{$autofil->mobile_code=='670'? 'selected="selected"':''}}>East Timor (+670)</option>
                        <option value="593" {{$autofil->mobile_code=='593'? 'selected="selected"':''}}>Ecuador (+593)</option>
                        <option value="20" {{$autofil->mobile_code=='20'? 'selected="selected"':''}}>Egypt (+20)</option>
                        <option value="503" {{$autofil->mobile_code=='503'? 'selected="selected"':''}}>El Salvador (+503)</option>
                        <option value="240" {{$autofil->mobile_code=='240'? 'selected="selected"':''}}>Equatorial Guinea (+240)</option>
                        <option value="291" {{$autofil->mobile_code=='291'? 'selected="selected"':''}}>Eritrea (+291)</option>
                        <option value="372" {{$autofil->mobile_code=='372'? 'selected="selected"':''}}>Estonia (+372)</option>
                        <option value="251" {{$autofil->mobile_code=='251'? 'selected="selected"':''}}>Ethiopia (+251)</option>
                        <option value="500" {{$autofil->mobile_code=='500'? 'selected="selected"':''}}>Falkland Islands (+500)</option>
                        <option value="298" {{$autofil->mobile_code=='298'? 'selected="selected"':''}}>Faroe Islands (+298)</option>
                        <option value="679" {{$autofil->mobile_code=='679'? 'selected="selected"':''}}>Fiji (+679)</option>
                        <option value="358" {{$autofil->mobile_code=='358'? 'selected="selected"':''}}>Finland (+358)</option>
                        <option value="33" {{$autofil->mobile_code=='33'? 'selected="selected"':''}}>France (+33)</option>
                        <option value="33" {{$autofil->mobile_code=='33'? 'selected="selected"':''}}>France, Metropolitan (+33)</option>
                        <option value="594" {{$autofil->mobile_code=='594'? 'selected="selected"':''}}>French Guiana (+594)</option>
                        <option value="689" {{$autofil->mobile_code=='689'? 'selected="selected"':''}}>French Polynesia (+689)</option>
                        <option value="33" {{$autofil->mobile_code=='33'? 'selected="selected"':''}}>French Southern Territories (+33)</option>
                        <option value="389" {{$autofil->mobile_code=='389'? 'selected="selected"':''}}>FYROM (+389)</option>
                        <option value="241" {{$autofil->mobile_code=='241'? 'selected="selected"':''}}>Gabon (+241)</option>
                        <option value="220" {{$autofil->mobile_code=='220'? 'selected="selected"':''}}>Gambia (+220)</option>
                        <option value="995" {{$autofil->mobile_code=='995'? 'selected="selected"':''}}>Georgia (+995)</option>
                        <option value="49" {{$autofil->mobile_code=='49'? 'selected="selected"':''}}>Germany (+49)</option>
                        <option value="233" {{$autofil->mobile_code=='233'? 'selected="selected"':''}}>Ghana (+233)</option>
                        <option value="350" {{$autofil->mobile_code=='350'? 'selected="selected"':''}}>Gibraltar (+350)</option>
                        <option value="30" {{$autofil->mobile_code=='30'? 'selected="selected"':''}}>Greece (+30)</option>
                        <option value="299" {{$autofil->mobile_code=='299'? 'selected="selected"':''}}>Greenland (+299)</option>
                        <option value="1473" {{$autofil->mobile_code=='1473'? 'selected="selected"':''}}>Grenada (+1473)</option>
                        <option value="590" {{$autofil->mobile_code=='590'? 'selected="selected"':''}}>Guadeloupe (+590)</option>
                        <option value="1671" {{$autofil->mobile_code=='1671'? 'selected="selected"':''}}>Guam (+1671)</option>
                        <option value="32" {{$autofil->mobile_code=='502'? 'selected="selected"':''}}>Guatemala (+502)</option>
                        <option value="224" {{$autofil->mobile_code=='224'? 'selected="selected"':''}}>Guinea (+224)</option>
                        <option value="245" {{$autofil->mobile_code=='245'? 'selected="selected"':''}}>Guinea-Bissau (+245)</option>
                        <option value="592" {{$autofil->mobile_code=='592'? 'selected="selected"':''}}>Guyana (+592)</option>
                        <option value="509" {{$autofil->mobile_code=='509'? 'selected="selected"':''}}>Haiti (+509)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Heard Island And Mcdonald Islands (+61)</option>
                        <option value="504" {{$autofil->mobile_code=='504'? 'selected="selected"':''}}>Honduras (+504)</option>
                        <option value="852" {{$autofil->mobile_code=='852'? 'selected="selected"':''}}>Hong Kong (+852)</option>
                        <option value="36" {{$autofil->mobile_code=='36'? 'selected="selected"':''}}>Hungary (+36)</option>
                        <option value="354" {{$autofil->mobile_code=='354'? 'selected="selected"':''}}>Iceland (+354)</option>
                        <option value="91" {{$autofil->mobile_code=='91'? 'selected="selected"':''}}>India (+91)</option>
                        <option value="62" {{$autofil->mobile_code=='62'? 'selected="selected"':''}}>Indonesia (+62)</option>
                        <option value="98" {{$autofil->mobile_code=='98'? 'selected="selected"':''}}>Iran (+98)</option>
                        <option value="964" {{$autofil->mobile_code=='964'? 'selected="selected"':''}}>Iraq (+964)</option>
                        <option value="353" {{$autofil->mobile_code=='353'? 'selected="selected"':''}}>Ireland (+353)</option>
                        <option value="972" {{$autofil->mobile_code=='972'? 'selected="selected"':''}}>Israel (+972)</option>
                        <option value="39" {{$autofil->mobile_code=='39'? 'selected="selected"':''}}>Italy (+39)</option>
                        <option value="1876" {{$autofil->mobile_code=='1876'? 'selected="selected"':''}}>Jamaica (+1876)</option>
                        <option value="81" {{$autofil->mobile_code=='81'? 'selected="selected"':''}}>Japan (+81)</option>
                        <option value="962" {{$autofil->mobile_code=='962'? 'selected="selected"':''}}>Jordan (+962)</option>
                        <option value="7" {{$autofil->mobile_code=='7'? 'selected="selected"':''}}>Kazakhstan (+7)</option>
                        <option value="254" {{$autofil->mobile_code=='254'? 'selected="selected"':''}}>Kenya (+254)</option>
                        <option value="686" {{$autofil->mobile_code=='686'? 'selected="selected"':''}}>Kiribati (+686)</option>
                        <option value="965" {{$autofil->mobile_code=='965'? 'selected="selected"':''}}>Kuwait (+965)</option>
                        <option value="996" {{$autofil->mobile_code=='996'? 'selected="selected"':''}}>Kyrgyzstan (+996)</option>
                        <option value="856" {{$autofil->mobile_code=='856'? 'selected="selected"':''}}>Lao Peoples Democratic Republic (+856)</option>
                        <option value="371" {{$autofil->mobile_code=='371'? 'selected="selected"':''}}>Latvia (+371)</option>
                        <option value="961" {{$autofil->mobile_code=='961'? 'selected="selected"':''}}>Lebanon (+961)</option>
                        <option value="266" {{$autofil->mobile_code=='266'? 'selected="selected"':''}}>Lesotho (+266)</option>
                        <option value="231" {{$autofil->mobile_code=='231'? 'selected="selected"':''}}>Liberia (+231)</option>
                        <option value="218" {{$autofil->mobile_code=='218'? 'selected="selected"':''}}>Libyan Arab Jamahiriya (+218)</option>
                        <option value="423" {{$autofil->mobile_code=='423423'? 'selected="selected"':''}}>Liechtenstein (+423)</option>
                        <option value="423" {{$autofil->mobile_code=='370'? 'selected="selected"':''}}>Lithuania (+370)</option>
                        <option value="352" {{$autofil->mobile_code=='352'? 'selected="selected"':''}}>Luxembourg (+352)</option>
                        <option value="853" {{$autofil->mobile_code=='853'? 'selected="selected"':''}}>Macau (+853)</option>
                        <option value="261" {{$autofil->mobile_code=='261'? 'selected="selected"':''}}>Madagascar (+261)</option>
                        <option value="265" {{$autofil->mobile_code=='265'? 'selected="selected"':''}}>Malawi (+265)</option>
                        <option value="60" {{$autofil->mobile_code=='60'? 'selected="selected"':''}}>Malaysia (+60)</option>
                        <option value="960" {{$autofil->mobile_code=='960'? 'selected="selected"':''}}>Maldives (+960)</option>
                        <option value="223" {{$autofil->mobile_code=='223'? 'selected="selected"':''}}>Mali (+223)</option>
                        <option value="356" {{$autofil->mobile_code=='356'? 'selected="selected"':''}}>Malta (+356)</option>
                        <option value="692" {{$autofil->mobile_code=='692'? 'selected="selected"':''}}>Marshall Islands (+692)</option>
                        <option value="596" {{$autofil->mobile_code=='596'? 'selected="selected"':''}}>Martinique (+596)</option>
                        <option value="222" {{$autofil->mobile_code=='222'? 'selected="selected"':''}}>Mauritania (+222)</option>
                        <option value="230" {{$autofil->mobile_code=='230'? 'selected="selected"':''}}>Mauritius (+230)</option>
                        <option value="262" {{$autofil->mobile_code=='262'? 'selected="selected"':''}}>Mayotte (+262)</option>
                        <option value="52" {{$autofil->mobile_code=='52'? 'selected="selected"':''}}>Mexico (+52)</option>
                        <option value="691" {{$autofil->mobile_code=='691'? 'selected="selected"':''}}>Micronesia (+691)</option>
                        <option value="373" {{$autofil->mobile_code=='373'? 'selected="selected"':''}}>Moldova (+373)</option>
                        <option value="377" {{$autofil->mobile_code=='377'? 'selected="selected"':''}}>Monaco (+377)</option>
                        <option value="976" {{$autofil->mobile_code=='976'? 'selected="selected"':''}}>Mongolia (+976)</option>
                        <option value="1664" {{$autofil->mobile_code=='1664'? 'selected="selected"':''}}>Montserrat (+1664)</option>
                        <option value="212" {{$autofil->mobile_code=='212'? 'selected="selected"':''}}>Morocco (+212)</option>
                        <option value="258" {{$autofil->mobile_code=='258'? 'selected="selected"':''}}>Mozambique (+258)</option>
                        <option value="95" {{$autofil->mobile_code=='95'? 'selected="selected"':''}}>Myanmar (+95)</option>
                        <option value="264" {{$autofil->mobile_code=='264'? 'selected="selected"':''}}>Namibia (+264)</option>
                        <option value="674" {{$autofil->mobile_code=='674'? 'selected="selected"':''}}>Nauru (+674)</option>
                        <option value="977" {{$autofil->mobile_code=='977'? 'selected="selected"':''}}>Nepal (+977)</option>
                        <option value="31" {{$autofil->mobile_code=='31'? 'selected="selected"':''}}>Netherlands (+31)</option>
                        <option value="599" {{$autofil->mobile_code=='599'? 'selected="selected"':''}}>Netherlands Antilles (+599)</option>
                        <option value="687" {{$autofil->mobile_code=='687'? 'selected="selected"':''}}>New Caledonia (+687)</option>
                        <option value="64" {{$autofil->mobile_code=='64'? 'selected="selected"':''}}>New Zealand (+64)</option>
                        <option value="505" {{$autofil->mobile_code=='505'? 'selected="selected"':''}}>Nicaragua (+505)</option>
                        <option value="227" {{$autofil->mobile_code=='227'? 'selected="selected"':''}}>Niger (+227)</option>
                        <option value="234" {{$autofil->mobile_code=='234'? 'selected="selected"':''}}>Nigeria (+234)</option>
                        <option value="683" {{$autofil->mobile_code=='683'? 'selected="selected"':''}}>Niue (+683)</option>
                        <option value="672" {{$autofil->mobile_code=='672'? 'selected="selected"':''}}>Norfolk Island (+672)</option>
                        <option value="1670" {{$autofil->mobile_code=='1670'? 'selected="selected"':''}}>Northern Mariana Islands (+1670)</option>
                        <option value="47" {{$autofil->mobile_code=='47'? 'selected="selected"':''}}>Norway (+47)</option>
                        <option value="968" {{$autofil->mobile_code=='968'? 'selected="selected"':''}}>Oman (+968)</option>
                        <option value="92" {{$autofil->mobile_code=='92'? 'selected="selected"':''}}>Pakistan (+92)</option>
                        <option value="680" {{$autofil->mobile_code=='680'? 'selected="selected"':''}}>Palau (+680)</option>
                        <option value="507" {{$autofil->mobile_code=='507'? 'selected="selected"':''}}>Panama (+507)</option>
                        <option value="675" {{$autofil->mobile_code=='675'? 'selected="selected"':''}}>Papua New Guinea (+675)</option>
                        <option value="595" {{$autofil->mobile_code=='595'? 'selected="selected"':''}}>Paraguay (+595)</option>
                        <option value="51" {{$autofil->mobile_code=='51'? 'selected="selected"':''}}>Peru (+51)</option>
                        <option value="63" {{$autofil->mobile_code=='63'? 'selected="selected"':''}}>Philippines (+63)</option>
                        <option value="870" {{$autofil->mobile_code=='870'? 'selected="selected"':''}}>Pitcairn (+870)</option>
                        <option value="48" {{$autofil->mobile_code=='48'? 'selected="selected"':''}}>Poland (+48)</option>
                        <option value="351" {{$autofil->mobile_code=='351'? 'selected="selected"':''}}>Portugal (+351)</option>
                        <option value="1" {{$autofil->mobile_code=='1'? 'selected="selected"':''}}>Puerto Rico (+1)</option>
                        <option value="974" {{$autofil->mobile_code=='974'? 'selected="selected"':''}}>Qatar (+974)</option>
                        <option value="262" {{$autofil->mobile_code=='262'? 'selected="selected"':''}}>Reunion (+262)</option>
                        <option value="40" {{$autofil->mobile_code=='40'? 'selected="selected"':''}}>Romania (+40)</option>
                        <option value="7" {{$autofil->mobile_code=='7'? 'selected="selected"':''}}>Russian Federation (+7)</option>
                        <option value="250" {{$autofil->mobile_code=='250'? 'selected="selected"':''}}>Rwanda (+250)</option>
                        <option value="290" {{$autofil->mobile_code=='290'? 'selected="selected"':''}}>Saint Helena (+290)</option>
                        <option value="1869" {{$autofil->mobile_code=='1869'? 'selected="selected"':''}}>Saint Kitts and Nevis (+1869)</option>
                        <option value="1758" {{$autofil->mobile_code=='1758'? 'selected="selected"':''}}>Saint Lucia (+1758)</option>
                        <option value="508" {{$autofil->mobile_code=='508'? 'selected="selected"':''}}>Saint Pierre and Miquelon (+508)</option>
                        <option value="1784" {{$autofil->mobile_code=='1784'? 'selected="selected"':''}}>Saint Vincent and The Grenadines (+1784)</option>
                        <option value="685" {{$autofil->mobile_code=='685'? 'selected="selected"':''}}>Samoa (+685)</option>
                        <option value="378" {{$autofil->mobile_code=='378'? 'selected="selected"':''}}>San Marino (+378)</option>
                        <option value="239" {{$autofil->mobile_code=='239'? 'selected="selected"':''}}>Sao Tome and Principe (+239)</option>
                        <option value="966" {{$autofil->mobile_code=='966'? 'selected="selected"':''}}>Saudi Arabia (+966)</option>
                        <option value="221" {{$autofil->mobile_code=='221'? 'selected="selected"':''}}>Senegal (+221)</option>
                        <option value="248" {{$autofil->mobile_code=='248'? 'selected="selected"':''}}>Seychelles (+248)</option>
                        <option value="232" {{$autofil->mobile_code=='232'? 'selected="selected"':''}}>Sierra Leone (+232)</option>
                        <option value="65" {{$autofil->mobile_code=='65'? 'selected="selected"':''}}>Singapore (+65)</option>
                        <option value="421" {{$autofil->mobile_code=='421'? 'selected="selected"':''}}>Slovakia (+421)</option>
                        <option value="386" {{$autofil->mobile_code=='386'? 'selected="selected"':''}}>Slovenia (+386)</option>
                        <option value="677" {{$autofil->mobile_code=='677'? 'selected="selected"':''}}>Solomon Islands (+677)</option>
                        <option value="252" {{$autofil->mobile_code=='252'? 'selected="selected"':''}}>Somalia (+252)</option>
                        <option value="27" {{$autofil->mobile_code=='27'? 'selected="selected"':''}}>South Africa (+27)</option>
                        <option value="500" {{$autofil->mobile_code=='500'? 'selected="selected"':''}}>South Georgia and Sandwich Islands (+500)</option>
                        <option value="82" {{$autofil->mobile_code=='82'? 'selected="selected"':''}}>South Korea (+82)</option>
                        <option value="34" {{$autofil->mobile_code=='34'? 'selected="selected"':''}}>Spain (+34)</option>
                        <option value="94" {{$autofil->mobile_code=='94'? 'selected="selected"':''}}>Sri Lanka (+94)</option>
                        <option value="249" {{$autofil->mobile_code=='249'? 'selected="selected"':''}}>Sudan (+249)</option>
                        <option value="597" {{$autofil->mobile_code=='597'? 'selected="selected"':''}}>Suriname (+597)</option>
                        <option value="47" {{$autofil->mobile_code=='47'? 'selected="selected"':''}}>Svalbard and Jan Mayen (+47)</option>
                        <option value="268" {{$autofil->mobile_code=='268'? 'selected="selected"':''}}>Swaziland (+268)</option>
                        <option value="46" {{$autofil->mobile_code=='46'? 'selected="selected"':''}}>Sweden (+46)</option>
                        <option value="41" {{$autofil->mobile_code=='41'? 'selected="selected"':''}}>Switzerland (+41)</option>
                        <option value="963" {{$autofil->mobile_code=='963'? 'selected="selected"':''}}>Syrian Arab Republic (+963)</option>
                        <option value="886" {{$autofil->mobile_code=='886'? 'selected="selected"':''}}>Taiwan (+886)</option>
                        <option value="992" {{$autofil->mobile_code=='992'? 'selected="selected"':''}}>Tajikistan (+992)</option>
                        <option value="255" {{$autofil->mobile_code=='255'? 'selected="selected"':''}}>Tanzania (+255)</option>
                        <option value="66" {{$autofil->mobile_code=='66'? 'selected="selected"':''}}>Thailand (+66)</option>
                        <option value="228" {{$autofil->mobile_code=='228'? 'selected="selected"':''}}>Togo (+228)</option>
                        <option value="690" {{$autofil->mobile_code=='690'? 'selected="selected"':''}}>Tokelau (+690)</option>
                        <option value="676" {{$autofil->mobile_code=='676'? 'selected="selected"':''}}>Tonga (+676)</option>
                        <option value="1868" {{$autofil->mobile_code=='1868'? 'selected="selected"':''}}>Trinidad and Tobago (+1868)</option>
                        <option value="216" {{$autofil->mobile_code=='216'? 'selected="selected"':''}}>Tunisia (+216)</option>
                        <option value="90" {{$autofil->mobile_code=='90'? 'selected="selected"':''}}>Turkey (+90)</option>
                        <option value="993" {{$autofil->mobile_code=='993'? 'selected="selected"':''}}>Turkmenistan (+993)</option>
                        <option value="1649" {{$autofil->mobile_code=='1649'? 'selected="selected"':''}}>Turks and Caicos Islands (+1649)</option>
                        <option value="688" {{$autofil->mobile_code=='688'? 'selected="selected"':''}}>Tuvalu (+688)</option>
                        <option value="256" {{$autofil->mobile_code=='256'? 'selected="selected"':''}}>Uganda (+256)</option>
                        <option value="380" {{$autofil->mobile_code=='380'? 'selected="selected"':''}}>Ukraine (+380)</option>
                        <option value="971" {{$autofil->mobile_code=='971'? 'selected="selected"':''}}>United Arab Emirates (+971)</option>
                        <option value="44" {{$autofil->mobile_code=='44'? 'selected="selected"':''}}>United Kingdom (+44)</option>
                        <option value="1" {{$autofil->mobile_code=='1'? 'selected="selected"':''}}>United States (+1)</option>
                        <option value="699" {{$autofil->mobile_code=='699'? 'selected="selected"':''}}>United States Minor Outlying Islands (+699)</option>
                        <option value="598" {{$autofil->mobile_code=='598'? 'selected="selected"':''}}>Uruguay (+598)</option>
                        <option value="998" {{$autofil->mobile_code=='998'? 'selected="selected"':''}}>Uzbekistan (+998)</option>
                        <option value="678" {{$autofil->mobile_code=='678'? 'selected="selected"':''}}>Vanuatu (+678)</option>
                        <option value="39" {{$autofil->mobile_code=='39'? 'selected="selected"':''}}>Vatican City State (+39)</option>
                        <option value="58" {{$autofil->mobile_code=='58'? 'selected="selected"':''}}>Venezuela (+58)</option>
                        <option value="84" {{$autofil->mobile_code=='84'? 'selected="selected"':''}}>Vietnam (+84)</option>
                        <option value="1284" {{$autofil->mobile_code=='1284'? 'selected="selected"':''}}>Virgin Islands (British) (+1284)</option>
                        <option value="1340" {{$autofil->mobile_code=='1340'? 'selected="selected"':''}}>Virgin Islands (U.S.) (+1340)</option>
                        <option value="681" {{$autofil->mobile_code=='681'? 'selected="selected"':''}}>Wallis And Futuna Islands (+681)</option>
                        <option value="212" {{$autofil->mobile_code=='212'? 'selected="selected"':''}}>Western Sahara (+212)</option>
                        <option value="967" {{$autofil->mobile_code=='967'? 'selected="selected"':''}}>Yemen (+967)</option>
                        <option value="381" {{$autofil->mobile_code=='381'? 'selected="selected"':''}}>Yugoslavia (+381)</option>
                        <option value="243" {{$autofil->mobile_code=='243'? 'selected="selected"':''}}>Zaire (+243)</option>
                        <option value="260" {{$autofil->mobile_code=='260'? 'selected="selected"':''}}>Zambia (+260)</option>
                        <option value="263" {{$autofil->mobile_code=='263'? 'selected="selected"':''}}>Zimbabwe (+263)</option>
                      </select>
                    </span>
                    <input type="number" name="phone_number" min="7" class="form-control" value="{{ old('phone_number') }}" placeholder="Phone Number" required/>
                  </div>
                </div>
							  <!-- <div class="col-md-12">
								  <div class="form-group">
									  <label>Phone Number <span class="required" style="color: red;">*</span></label>
									  <input type="number" class="form-control" min="0" placeholder="Phone Number" value="{{ old('phone_number') }}" name="phone_number" required/>
								  </div>
							  </div> -->
                <div class="col-md-12">
                  <label>Mobile Number <span class="required" style="color: red;">*</span></label>
                  <div class="form-group" style="display:flex">
                    <span class="input-group-addon" id="basic-addon1" style="padding: 0px 3px !important;">
                      <select name="mobile_code" id="input" class="phone-nmbr form-control" style="width:205px;">
                        <option value="93" {{$autofil->mobile_code=='93'? 'selected="selected"':''}}>Afghanistan (+93)</option>
                        <option value="355" {{$autofil->mobile_code=='355'? 'selected="selected"':''}}>Albania (+355)</option>
                        <option value="213" {{$autofil->mobile_code=='213'? 'selected="selected"':''}}>Algeria (+213)</option>
                        <option value="1684" {{$autofil->mobile_code=='1684'? 'selected="selected"':''}}>American Samoa (+1684)</option>
                        <option value="376" {{$autofil->mobile_code=='376'? 'selected="selected"':''}}>Andorra (+376)</option>
                        <option value="244" {{$autofil->mobile_code=='244'? 'selected="selected"':''}}>Angola (+244)</option>
                        <option value="1264" {{$autofil->mobile_code=='1264'? 'selected="selected"':''}}>Anguilla (+1264)</option>
                        <option value="672" {{$autofil->mobile_code=='672'? 'selected="selected"':''}}>Antarctica (+672)</option>
                        <option value="1268" {{$autofil->mobile_code=='1268'? 'selected="selected"':''}}>Antigua and Barbuda (+1268)</option>
                        <option value="54" {{$autofil->mobile_code=='54'? 'selected="selected"':''}}>Argentina (+54)</option>
                        <option value="374" {{$autofil->mobile_code=='374'? 'selected="selected"':''}}>Armenia (+374)</option>
                        <option value="297" {{$autofil->mobile_code=='297'? 'selected="selected"':''}}>Aruba (+297)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Australia (+61)</option>
                        <option value="43" {{$autofil->mobile_code=='43'? 'selected="selected"':''}}>Austria (+43)</option>
                        <option value="994" {{$autofil->mobile_code=='994'? 'selected="selected"':''}}>Azerbaijan (+994)</option>
                        <option value="1242" {{$autofil->mobile_code=='1242'? 'selected="selected"':''}}>Bahamas (+1242)</option>
                        <option value="973" {{$autofil->mobile_code=='973'? 'selected="selected"':''}}>Bahrain (+973)</option>
                        <option value="880" {{$autofil->mobile_code=='880'? 'selected="selected"':''}}>Bangladesh (+880)</option>
                        <option value="1246" {{$autofil->mobile_code=='1246'? 'selected="selected"':''}}>Barbados (+1246)</option>
                        <option value="375" {{$autofil->mobile_code=='375'? 'selected="selected"':''}}>Belarus (+375)</option>
                        <option value="32" {{$autofil->mobile_code=='32'? 'selected="selected"':''}}>Belgium (+32)</option>
                        <option value="501" {{$autofil->mobile_code=='501'? 'selected="selected"':''}}>Belize (+501)</option>
                        <option value="229" {{$autofil->mobile_code=='229'? 'selected="selected"':''}}>Benin (+229)</option>
                        <option value="1441" {{$autofil->mobile_code=='1441'? 'selected="selected"':''}}>Bermuda (+1441)</option>
                        <option value="975" {{$autofil->mobile_code=='975'? 'selected="selected"':''}}>Bhutan (+975)</option>
                        <option value="591" {{$autofil->mobile_code=='591'? 'selected="selected"':''}}>Bolivia (+591)</option>
                        <option value="387" {{$autofil->mobile_code=='387'? 'selected="selected"':''}}>Bosnia and Herzegovina (+387)</option>
                        <option value="267" {{$autofil->mobile_code=='267'? 'selected="selected"':''}}>Botswana (+267)</option>
                        <option value="47" {{$autofil->mobile_code=='47'? 'selected="selected"':''}}>Bouvet Island (+47)</option>
                        <option value="55" {{$autofil->mobile_code=='55'? 'selected="selected"':''}}>Brazil (+55)</option>
                        <option value="246" {{$autofil->mobile_code=='246'? 'selected="selected"':''}}>British Indian Ocean Territories (+246)</option>
                        <option value="673" {{$autofil->mobile_code=='673'? 'selected="selected"':''}}>Brunei Darussalam (+673)</option>
                        <option value="359" {{$autofil->mobile_code=='359'? 'selected="selected"':''}}>Bulgaria (+359)</option>
                        <option value="226" {{$autofil->mobile_code=='226'? 'selected="selected"':''}}>Burkina Faso (+226)</option>
                        <option value="257" {{$autofil->mobile_code=='257'? 'selected="selected"':''}}>Burundi (+257)</option>
                        <option value="855" {{$autofil->mobile_code=='855'? 'selected="selected"':''}}>Cambodia (+855)</option>
                        <option value="237" {{$autofil->mobile_code=='237'? 'selected="selected"':''}}>Cameroon (+237)</option>
                        <option value="1" {{$autofil->mobile_code=='1'? 'selected="selected"':''}}>Canada (+1)</option>
                        <option value="238" {{$autofil->mobile_code=='238'? 'selected="selected"':''}}>Cape Verde (+238)</option>
                        <option value="1345" {{$autofil->mobile_code=='1345'? 'selected="selected"':''}}>Cayman Islands (+1345)</option>
                        <option value="236" {{$autofil->mobile_code=='236'? 'selected="selected"':''}}>Central African Republic (+236)</option>
                        <option value="235" {{$autofil->mobile_code=='235'? 'selected="selected"':''}}>Chad (+235)</option>
                        <option value="56" {{$autofil->mobile_code=='56'? 'selected="selected"':''}}>Chile (+56)</option>
                        <option value="86" {{$autofil->mobile_code=='86'? 'selected="selected"':''}}>China, People's Republic of (+86)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Christmas Island (+61)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Cocos Islands (+61)</option>
                        <option value="57" {{$autofil->mobile_code=='57'? 'selected="selected"':''}}>Colombia (+57)</option>
                        <option value="269" {{$autofil->mobile_code=='269'? 'selected="selected"':''}}>Comoros (+269)</option>
                        <option value="243" {{$autofil->mobile_code=='243'? 'selected="selected"':''}}>Congo (+243)</option>
                        <option value="682" {{$autofil->mobile_code=='682'? 'selected="selected"':''}}>Cook Islands (+682)</option>
                        <option value="506" {{$autofil->mobile_code=='506'? 'selected="selected"':''}}>Costa Rica (+506)</option>
                        <option value="225" {{$autofil->mobile_code=='225'? 'selected="selected"':''}}>Cote D'ivoire (+225)</option>
                        <option value="385" {{$autofil->mobile_code=='385'? 'selected="selected"':''}}>Croatia (+385)</option>
                        <option value="53" {{$autofil->mobile_code=='53'? 'selected="selected"':''}}>Cuba (+53)</option>
                        <option value="357" {{$autofil->mobile_code=='357'? 'selected="selected"':''}}>Cyprus (+357)</option>
                        <option value="420" {{$autofil->mobile_code=='420'? 'selected="selected"':''}}>Czech Republic (+420)</option>
                        <option value="45" {{$autofil->mobile_code=='45'? 'selected="selected"':''}}>Denmark (+45)</option>
                        <option value="253" {{$autofil->mobile_code=='253'? 'selected="selected"':''}}>Djibouti (+253)</option>
                        <option value="1767" {{$autofil->mobile_code=='1767'? 'selected="selected"':''}}>Dominica (+1767)</option>
                        <option value="1809" {{$autofil->mobile_code=='1809'? 'selected="selected"':''}}>Dominican Republic (+1809)</option>
                        <option value="670" {{$autofil->mobile_code=='670'? 'selected="selected"':''}}>East Timor (+670)</option>
                        <option value="593" {{$autofil->mobile_code=='593'? 'selected="selected"':''}}>Ecuador (+593)</option>
                        <option value="20" {{$autofil->mobile_code=='20'? 'selected="selected"':''}}>Egypt (+20)</option>
                        <option value="503" {{$autofil->mobile_code=='503'? 'selected="selected"':''}}>El Salvador (+503)</option>
                        <option value="240" {{$autofil->mobile_code=='240'? 'selected="selected"':''}}>Equatorial Guinea (+240)</option>
                        <option value="291" {{$autofil->mobile_code=='291'? 'selected="selected"':''}}>Eritrea (+291)</option>
                        <option value="372" {{$autofil->mobile_code=='372'? 'selected="selected"':''}}>Estonia (+372)</option>
                        <option value="251" {{$autofil->mobile_code=='251'? 'selected="selected"':''}}>Ethiopia (+251)</option>
                        <option value="500" {{$autofil->mobile_code=='500'? 'selected="selected"':''}}>Falkland Islands (+500)</option>
                        <option value="298" {{$autofil->mobile_code=='298'? 'selected="selected"':''}}>Faroe Islands (+298)</option>
                        <option value="679" {{$autofil->mobile_code=='679'? 'selected="selected"':''}}>Fiji (+679)</option>
                        <option value="358" {{$autofil->mobile_code=='358'? 'selected="selected"':''}}>Finland (+358)</option>
                        <option value="33" {{$autofil->mobile_code=='33'? 'selected="selected"':''}}>France (+33)</option>
                        <option value="33" {{$autofil->mobile_code=='33'? 'selected="selected"':''}}>France, Metropolitan (+33)</option>
                        <option value="594" {{$autofil->mobile_code=='594'? 'selected="selected"':''}}>French Guiana (+594)</option>
                        <option value="689" {{$autofil->mobile_code=='689'? 'selected="selected"':''}}>French Polynesia (+689)</option>
                        <option value="33" {{$autofil->mobile_code=='33'? 'selected="selected"':''}}>French Southern Territories (+33)</option>
                        <option value="389" {{$autofil->mobile_code=='389'? 'selected="selected"':''}}>FYROM (+389)</option>
                        <option value="241" {{$autofil->mobile_code=='241'? 'selected="selected"':''}}>Gabon (+241)</option>
                        <option value="220" {{$autofil->mobile_code=='220'? 'selected="selected"':''}}>Gambia (+220)</option>
                        <option value="995" {{$autofil->mobile_code=='995'? 'selected="selected"':''}}>Georgia (+995)</option>
                        <option value="49" {{$autofil->mobile_code=='49'? 'selected="selected"':''}}>Germany (+49)</option>
                        <option value="233" {{$autofil->mobile_code=='233'? 'selected="selected"':''}}>Ghana (+233)</option>
                        <option value="350" {{$autofil->mobile_code=='350'? 'selected="selected"':''}}>Gibraltar (+350)</option>
                        <option value="30" {{$autofil->mobile_code=='30'? 'selected="selected"':''}}>Greece (+30)</option>
                        <option value="299" {{$autofil->mobile_code=='299'? 'selected="selected"':''}}>Greenland (+299)</option>
                        <option value="1473" {{$autofil->mobile_code=='1473'? 'selected="selected"':''}}>Grenada (+1473)</option>
                        <option value="590" {{$autofil->mobile_code=='590'? 'selected="selected"':''}}>Guadeloupe (+590)</option>
                        <option value="1671" {{$autofil->mobile_code=='1671'? 'selected="selected"':''}}>Guam (+1671)</option>
                        <option value="32" {{$autofil->mobile_code=='502'? 'selected="selected"':''}}>Guatemala (+502)</option>
                        <option value="224" {{$autofil->mobile_code=='224'? 'selected="selected"':''}}>Guinea (+224)</option>
                        <option value="245" {{$autofil->mobile_code=='245'? 'selected="selected"':''}}>Guinea-Bissau (+245)</option>
                        <option value="592" {{$autofil->mobile_code=='592'? 'selected="selected"':''}}>Guyana (+592)</option>
                        <option value="509" {{$autofil->mobile_code=='509'? 'selected="selected"':''}}>Haiti (+509)</option>
                        <option value="61" {{$autofil->mobile_code=='61'? 'selected="selected"':''}}>Heard Island And Mcdonald Islands (+61)</option>
                        <option value="504" {{$autofil->mobile_code=='504'? 'selected="selected"':''}}>Honduras (+504)</option>
                        <option value="852" {{$autofil->mobile_code=='852'? 'selected="selected"':''}}>Hong Kong (+852)</option>
                        <option value="36" {{$autofil->mobile_code=='36'? 'selected="selected"':''}}>Hungary (+36)</option>
                        <option value="354" {{$autofil->mobile_code=='354'? 'selected="selected"':''}}>Iceland (+354)</option>
                        <option value="91" {{$autofil->mobile_code=='91'? 'selected="selected"':''}}>India (+91)</option>
                        <option value="62" {{$autofil->mobile_code=='62'? 'selected="selected"':''}}>Indonesia (+62)</option>
                        <option value="98" {{$autofil->mobile_code=='98'? 'selected="selected"':''}}>Iran (+98)</option>
                        <option value="964" {{$autofil->mobile_code=='964'? 'selected="selected"':''}}>Iraq (+964)</option>
                        <option value="353" {{$autofil->mobile_code=='353'? 'selected="selected"':''}}>Ireland (+353)</option>
                        <option value="972" {{$autofil->mobile_code=='972'? 'selected="selected"':''}}>Israel (+972)</option>
                        <option value="39" {{$autofil->mobile_code=='39'? 'selected="selected"':''}}>Italy (+39)</option>
                        <option value="1876" {{$autofil->mobile_code=='1876'? 'selected="selected"':''}}>Jamaica (+1876)</option>
                        <option value="81" {{$autofil->mobile_code=='81'? 'selected="selected"':''}}>Japan (+81)</option>
                        <option value="962" {{$autofil->mobile_code=='962'? 'selected="selected"':''}}>Jordan (+962)</option>
                        <option value="7" {{$autofil->mobile_code=='7'? 'selected="selected"':''}}>Kazakhstan (+7)</option>
                        <option value="254" {{$autofil->mobile_code=='254'? 'selected="selected"':''}}>Kenya (+254)</option>
                        <option value="686" {{$autofil->mobile_code=='686'? 'selected="selected"':''}}>Kiribati (+686)</option>
                        <option value="965" {{$autofil->mobile_code=='965'? 'selected="selected"':''}}>Kuwait (+965)</option>
                        <option value="996" {{$autofil->mobile_code=='996'? 'selected="selected"':''}}>Kyrgyzstan (+996)</option>
                        <option value="856" {{$autofil->mobile_code=='856'? 'selected="selected"':''}}>Lao Peoples Democratic Republic (+856)</option>
                        <option value="371" {{$autofil->mobile_code=='371'? 'selected="selected"':''}}>Latvia (+371)</option>
                        <option value="961" {{$autofil->mobile_code=='961'? 'selected="selected"':''}}>Lebanon (+961)</option>
                        <option value="266" {{$autofil->mobile_code=='266'? 'selected="selected"':''}}>Lesotho (+266)</option>
                        <option value="231" {{$autofil->mobile_code=='231'? 'selected="selected"':''}}>Liberia (+231)</option>
                        <option value="218" {{$autofil->mobile_code=='218'? 'selected="selected"':''}}>Libyan Arab Jamahiriya (+218)</option>
                        <option value="423" {{$autofil->mobile_code=='423423'? 'selected="selected"':''}}>Liechtenstein (+423)</option>
                        <option value="423" {{$autofil->mobile_code=='370'? 'selected="selected"':''}}>Lithuania (+370)</option>
                        <option value="352" {{$autofil->mobile_code=='352'? 'selected="selected"':''}}>Luxembourg (+352)</option>
                        <option value="853" {{$autofil->mobile_code=='853'? 'selected="selected"':''}}>Macau (+853)</option>
                        <option value="261" {{$autofil->mobile_code=='261'? 'selected="selected"':''}}>Madagascar (+261)</option>
                        <option value="265" {{$autofil->mobile_code=='265'? 'selected="selected"':''}}>Malawi (+265)</option>
                        <option value="60" {{$autofil->mobile_code=='60'? 'selected="selected"':''}}>Malaysia (+60)</option>
                        <option value="960" {{$autofil->mobile_code=='960'? 'selected="selected"':''}}>Maldives (+960)</option>
                        <option value="223" {{$autofil->mobile_code=='223'? 'selected="selected"':''}}>Mali (+223)</option>
                        <option value="356" {{$autofil->mobile_code=='356'? 'selected="selected"':''}}>Malta (+356)</option>
                        <option value="692" {{$autofil->mobile_code=='692'? 'selected="selected"':''}}>Marshall Islands (+692)</option>
                        <option value="596" {{$autofil->mobile_code=='596'? 'selected="selected"':''}}>Martinique (+596)</option>
                        <option value="222" {{$autofil->mobile_code=='222'? 'selected="selected"':''}}>Mauritania (+222)</option>
                        <option value="230" {{$autofil->mobile_code=='230'? 'selected="selected"':''}}>Mauritius (+230)</option>
                        <option value="262" {{$autofil->mobile_code=='262'? 'selected="selected"':''}}>Mayotte (+262)</option>
                        <option value="52" {{$autofil->mobile_code=='52'? 'selected="selected"':''}}>Mexico (+52)</option>
                        <option value="691" {{$autofil->mobile_code=='691'? 'selected="selected"':''}}>Micronesia (+691)</option>
                        <option value="373" {{$autofil->mobile_code=='373'? 'selected="selected"':''}}>Moldova (+373)</option>
                        <option value="377" {{$autofil->mobile_code=='377'? 'selected="selected"':''}}>Monaco (+377)</option>
                        <option value="976" {{$autofil->mobile_code=='976'? 'selected="selected"':''}}>Mongolia (+976)</option>
                        <option value="1664" {{$autofil->mobile_code=='1664'? 'selected="selected"':''}}>Montserrat (+1664)</option>
                        <option value="212" {{$autofil->mobile_code=='212'? 'selected="selected"':''}}>Morocco (+212)</option>
                        <option value="258" {{$autofil->mobile_code=='258'? 'selected="selected"':''}}>Mozambique (+258)</option>
                        <option value="95" {{$autofil->mobile_code=='95'? 'selected="selected"':''}}>Myanmar (+95)</option>
                        <option value="264" {{$autofil->mobile_code=='264'? 'selected="selected"':''}}>Namibia (+264)</option>
                        <option value="674" {{$autofil->mobile_code=='674'? 'selected="selected"':''}}>Nauru (+674)</option>
                        <option value="977" {{$autofil->mobile_code=='977'? 'selected="selected"':''}}>Nepal (+977)</option>
                        <option value="31" {{$autofil->mobile_code=='31'? 'selected="selected"':''}}>Netherlands (+31)</option>
                        <option value="599" {{$autofil->mobile_code=='599'? 'selected="selected"':''}}>Netherlands Antilles (+599)</option>
                        <option value="687" {{$autofil->mobile_code=='687'? 'selected="selected"':''}}>New Caledonia (+687)</option>
                        <option value="64" {{$autofil->mobile_code=='64'? 'selected="selected"':''}}>New Zealand (+64)</option>
                        <option value="505" {{$autofil->mobile_code=='505'? 'selected="selected"':''}}>Nicaragua (+505)</option>
                        <option value="227" {{$autofil->mobile_code=='227'? 'selected="selected"':''}}>Niger (+227)</option>
                        <option value="234" {{$autofil->mobile_code=='234'? 'selected="selected"':''}}>Nigeria (+234)</option>
                        <option value="683" {{$autofil->mobile_code=='683'? 'selected="selected"':''}}>Niue (+683)</option>
                        <option value="672" {{$autofil->mobile_code=='672'? 'selected="selected"':''}}>Norfolk Island (+672)</option>
                        <option value="1670" {{$autofil->mobile_code=='1670'? 'selected="selected"':''}}>Northern Mariana Islands (+1670)</option>
                        <option value="47" {{$autofil->mobile_code=='47'? 'selected="selected"':''}}>Norway (+47)</option>
                        <option value="968" {{$autofil->mobile_code=='968'? 'selected="selected"':''}}>Oman (+968)</option>
                        <option value="92" {{$autofil->mobile_code=='92'? 'selected="selected"':''}}>Pakistan (+92)</option>
                        <option value="680" {{$autofil->mobile_code=='680'? 'selected="selected"':''}}>Palau (+680)</option>
                        <option value="507" {{$autofil->mobile_code=='507'? 'selected="selected"':''}}>Panama (+507)</option>
                        <option value="675" {{$autofil->mobile_code=='675'? 'selected="selected"':''}}>Papua New Guinea (+675)</option>
                        <option value="595" {{$autofil->mobile_code=='595'? 'selected="selected"':''}}>Paraguay (+595)</option>
                        <option value="51" {{$autofil->mobile_code=='51'? 'selected="selected"':''}}>Peru (+51)</option>
                        <option value="63" {{$autofil->mobile_code=='63'? 'selected="selected"':''}}>Philippines (+63)</option>
                        <option value="870" {{$autofil->mobile_code=='870'? 'selected="selected"':''}}>Pitcairn (+870)</option>
                        <option value="48" {{$autofil->mobile_code=='48'? 'selected="selected"':''}}>Poland (+48)</option>
                        <option value="351" {{$autofil->mobile_code=='351'? 'selected="selected"':''}}>Portugal (+351)</option>
                        <option value="1" {{$autofil->mobile_code=='1'? 'selected="selected"':''}}>Puerto Rico (+1)</option>
                        <option value="974" {{$autofil->mobile_code=='974'? 'selected="selected"':''}}>Qatar (+974)</option>
                        <option value="262" {{$autofil->mobile_code=='262'? 'selected="selected"':''}}>Reunion (+262)</option>
                        <option value="40" {{$autofil->mobile_code=='40'? 'selected="selected"':''}}>Romania (+40)</option>
                        <option value="7" {{$autofil->mobile_code=='7'? 'selected="selected"':''}}>Russian Federation (+7)</option>
                        <option value="250" {{$autofil->mobile_code=='250'? 'selected="selected"':''}}>Rwanda (+250)</option>
                        <option value="290" {{$autofil->mobile_code=='290'? 'selected="selected"':''}}>Saint Helena (+290)</option>
                        <option value="1869" {{$autofil->mobile_code=='1869'? 'selected="selected"':''}}>Saint Kitts and Nevis (+1869)</option>
                        <option value="1758" {{$autofil->mobile_code=='1758'? 'selected="selected"':''}}>Saint Lucia (+1758)</option>
                        <option value="508" {{$autofil->mobile_code=='508'? 'selected="selected"':''}}>Saint Pierre and Miquelon (+508)</option>
                        <option value="1784" {{$autofil->mobile_code=='1784'? 'selected="selected"':''}}>Saint Vincent and The Grenadines (+1784)</option>
                        <option value="685" {{$autofil->mobile_code=='685'? 'selected="selected"':''}}>Samoa (+685)</option>
                        <option value="378" {{$autofil->mobile_code=='378'? 'selected="selected"':''}}>San Marino (+378)</option>
                        <option value="239" {{$autofil->mobile_code=='239'? 'selected="selected"':''}}>Sao Tome and Principe (+239)</option>
                        <option value="966" {{$autofil->mobile_code=='966'? 'selected="selected"':''}}>Saudi Arabia (+966)</option>
                        <option value="221" {{$autofil->mobile_code=='221'? 'selected="selected"':''}}>Senegal (+221)</option>
                        <option value="248" {{$autofil->mobile_code=='248'? 'selected="selected"':''}}>Seychelles (+248)</option>
                        <option value="232" {{$autofil->mobile_code=='232'? 'selected="selected"':''}}>Sierra Leone (+232)</option>
                        <option value="65" {{$autofil->mobile_code=='65'? 'selected="selected"':''}}>Singapore (+65)</option>
                        <option value="421" {{$autofil->mobile_code=='421'? 'selected="selected"':''}}>Slovakia (+421)</option>
                        <option value="386" {{$autofil->mobile_code=='386'? 'selected="selected"':''}}>Slovenia (+386)</option>
                        <option value="677" {{$autofil->mobile_code=='677'? 'selected="selected"':''}}>Solomon Islands (+677)</option>
                        <option value="252" {{$autofil->mobile_code=='252'? 'selected="selected"':''}}>Somalia (+252)</option>
                        <option value="27" {{$autofil->mobile_code=='27'? 'selected="selected"':''}}>South Africa (+27)</option>
                        <option value="500" {{$autofil->mobile_code=='500'? 'selected="selected"':''}}>South Georgia and Sandwich Islands (+500)</option>
                        <option value="82" {{$autofil->mobile_code=='82'? 'selected="selected"':''}}>South Korea (+82)</option>
                        <option value="34" {{$autofil->mobile_code=='34'? 'selected="selected"':''}}>Spain (+34)</option>
                        <option value="94" {{$autofil->mobile_code=='94'? 'selected="selected"':''}}>Sri Lanka (+94)</option>
                        <option value="249" {{$autofil->mobile_code=='249'? 'selected="selected"':''}}>Sudan (+249)</option>
                        <option value="597" {{$autofil->mobile_code=='597'? 'selected="selected"':''}}>Suriname (+597)</option>
                        <option value="47" {{$autofil->mobile_code=='47'? 'selected="selected"':''}}>Svalbard and Jan Mayen (+47)</option>
                        <option value="268" {{$autofil->mobile_code=='268'? 'selected="selected"':''}}>Swaziland (+268)</option>
                        <option value="46" {{$autofil->mobile_code=='46'? 'selected="selected"':''}}>Sweden (+46)</option>
                        <option value="41" {{$autofil->mobile_code=='41'? 'selected="selected"':''}}>Switzerland (+41)</option>
                        <option value="963" {{$autofil->mobile_code=='963'? 'selected="selected"':''}}>Syrian Arab Republic (+963)</option>
                        <option value="886" {{$autofil->mobile_code=='886'? 'selected="selected"':''}}>Taiwan (+886)</option>
                        <option value="992" {{$autofil->mobile_code=='992'? 'selected="selected"':''}}>Tajikistan (+992)</option>
                        <option value="255" {{$autofil->mobile_code=='255'? 'selected="selected"':''}}>Tanzania (+255)</option>
                        <option value="66" {{$autofil->mobile_code=='66'? 'selected="selected"':''}}>Thailand (+66)</option>
                        <option value="228" {{$autofil->mobile_code=='228'? 'selected="selected"':''}}>Togo (+228)</option>
                        <option value="690" {{$autofil->mobile_code=='690'? 'selected="selected"':''}}>Tokelau (+690)</option>
                        <option value="676" {{$autofil->mobile_code=='676'? 'selected="selected"':''}}>Tonga (+676)</option>
                        <option value="1868" {{$autofil->mobile_code=='1868'? 'selected="selected"':''}}>Trinidad and Tobago (+1868)</option>
                        <option value="216" {{$autofil->mobile_code=='216'? 'selected="selected"':''}}>Tunisia (+216)</option>
                        <option value="90" {{$autofil->mobile_code=='90'? 'selected="selected"':''}}>Turkey (+90)</option>
                        <option value="993" {{$autofil->mobile_code=='993'? 'selected="selected"':''}}>Turkmenistan (+993)</option>
                        <option value="1649" {{$autofil->mobile_code=='1649'? 'selected="selected"':''}}>Turks and Caicos Islands (+1649)</option>
                        <option value="688" {{$autofil->mobile_code=='688'? 'selected="selected"':''}}>Tuvalu (+688)</option>
                        <option value="256" {{$autofil->mobile_code=='256'? 'selected="selected"':''}}>Uganda (+256)</option>
                        <option value="380" {{$autofil->mobile_code=='380'? 'selected="selected"':''}}>Ukraine (+380)</option>
                        <option value="971" {{$autofil->mobile_code=='971'? 'selected="selected"':''}}>United Arab Emirates (+971)</option>
                        <option value="44" {{$autofil->mobile_code=='44'? 'selected="selected"':''}}>United Kingdom (+44)</option>
                        <option value="1" {{$autofil->mobile_code=='1'? 'selected="selected"':''}}>United States (+1)</option>
                        <option value="699" {{$autofil->mobile_code=='699'? 'selected="selected"':''}}>United States Minor Outlying Islands (+699)</option>
                        <option value="598" {{$autofil->mobile_code=='598'? 'selected="selected"':''}}>Uruguay (+598)</option>
                        <option value="998" {{$autofil->mobile_code=='998'? 'selected="selected"':''}}>Uzbekistan (+998)</option>
                        <option value="678" {{$autofil->mobile_code=='678'? 'selected="selected"':''}}>Vanuatu (+678)</option>
                        <option value="39" {{$autofil->mobile_code=='39'? 'selected="selected"':''}}>Vatican City State (+39)</option>
                        <option value="58" {{$autofil->mobile_code=='58'? 'selected="selected"':''}}>Venezuela (+58)</option>
                        <option value="84" {{$autofil->mobile_code=='84'? 'selected="selected"':''}}>Vietnam (+84)</option>
                        <option value="1284" {{$autofil->mobile_code=='1284'? 'selected="selected"':''}}>Virgin Islands (British) (+1284)</option>
                        <option value="1340" {{$autofil->mobile_code=='1340'? 'selected="selected"':''}}>Virgin Islands (U.S.) (+1340)</option>
                        <option value="681" {{$autofil->mobile_code=='681'? 'selected="selected"':''}}>Wallis And Futuna Islands (+681)</option>
                        <option value="212" {{$autofil->mobile_code=='212'? 'selected="selected"':''}}>Western Sahara (+212)</option>
                        <option value="967" {{$autofil->mobile_code=='967'? 'selected="selected"':''}}>Yemen (+967)</option>
                        <option value="381" {{$autofil->mobile_code=='381'? 'selected="selected"':''}}>Yugoslavia (+381)</option>
                        <option value="243" {{$autofil->mobile_code=='243'? 'selected="selected"':''}}>Zaire (+243)</option>
                        <option value="260" {{$autofil->mobile_code=='260'? 'selected="selected"':''}}>Zambia (+260)</option>
                        <option value="263" {{$autofil->mobile_code=='263'? 'selected="selected"':''}}>Zimbabwe (+263)</option>
                      </select>
                    </span>
                    <input type="number" class="form-control" min="7" name="mbl_number" value="{{$autofil->mobilenumber}}" placeholder="Mobile Number(1025xxxxxx)" required>
                  </div>
                </div>
							  <!-- <div class="col-md-12">
								  <div class="form-group">
									  <label>Mobile Number <span class="required" style="color: red;">*</span></label>
									  <input type="number" name="mbl_number" min="0" class="form-control"   placeholder="Mobile Number"  value="{{$autofil->mobilenumber}}">
								  </div>
							  </div> -->
							  <div class="col-md-12">
								  <div class="form-group">
									  <label for="exampleInputEmail1">Email address <span class="required" style="color: red;">*</span></label>
									  <input type="email" name="email" class="form-control" placeholder="Email"  value="{{$autofil->job_email}}" required>
								  </div>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-md-12">
								  <div class="form-group">
									  <label>Location <span class="required" style="color: red;">*</span></label>
									  <input type="text" name="location"  class="form-control" value="{{$autofil->city}}" placeholder="Location"   value=""  >
								  </div>
							  </div>
							  <div class="col-md-12">
								  <div class="form-group">
									  <label>Business Address <span class="required" style="color: red;">*</span></label>
									  <input type="text" name="business_address" class="form-control" placeholder="Business Address" value="{{ old('business_address') }}" required/>
								  </div>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-md-12">
								  <div class="form-group">
									  <label>Comapny Name <span class="required" style="color: red;">*</span></label>
									  <input type="text" name="company_name" class="form-control" placeholder="Comapny Name"   value="{{ old('company_name') }}" required>
								  </div>
							  </div>
						  </div>


                   @endif

		            <h4 class="field-title">Case Highlights</h4>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Legal Structure <span class="required" style="color: red;">*</span></label>
		                  <select class="form-control" name="legal_structure">
		                  	<option  @if(!empty($template)) @if($template->legal_structure =="Ltd Company (UK)")selected="selected"  @endif @endif >Ltd Company (UK)</option>
		                  	<option  @if(!empty($template))  @if($template->legal_structure =="Ltd Company (other)") selected="selected" @endif @endif>Ltd Company (other)</option>
		                  	<option  @if(!empty($template)) @if($template->legal_structure =="Sole Trader") selected="selected" @endif @endif>Sole Trader</option>
		                  	<option  @if(!empty($template)) @if($template->legal_structure =="LLP") selected="selected" @endif @endif>LLP</option>
		                  	<option  @if(!empty($template)) @if($template->legal_structure =="Charity") selected="selected" @endif @endif>Charity</option>
		                  	<option @if(!empty($template)) @if($template->legal_structure =="Trust") selected="selected" @endif @endif>Trust</option>
		                  	<option  @if(!empty($template)) @if($template->legal_structure =="Other") selected="selected" @endif @endif>Other</option>
		                  </select>
		                </div>
		              </div>
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Currency <span class="required" style="color: red;">*</span></label>
		                  <input type="text" name="currency" class="form-control"  placeholder="Currency"  @if(!empty($template)) value="{{$template->currency}}" @endif required/>
		                </div>
		              </div>
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Turnover <span class="required" style="color: red;">*</span></label>
		                  <input type="number" name="turnover" class="form-control"   placeholder="Turnover"  @if(!empty($template)) value="{{$template->turnover}}" @endif required/>
		                </div>
		              </div>
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Number of employees</label>
		                  <input type="number" name="employees" class="form-control"   placeholder="Number of employees"  @if(!empty($template)) value="{{$template->employees}}" @endif/>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Year end <span class="required" style="color: red;">*</span></label>
		                  <input type="date" name="year_end" class="form-control"   placeholder="Comapny Name"  @if(!empty($template)) value="{{$template->year_end}}" @endif required/>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Deadline <span class="required" style="color: red;">*</span></label>
		                  <input type="date" name="deadline"  class="form-control"  @if(!empty($template)) value="{{$template->deadline}}" @endif required/>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Number of Locations</label>
		                  <input type="number" name="nmber_location" min="0" class="form-control"  placeholder="Comapny Location"  @if(!empty($template)) value="{{$template->nmber_location}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Current Bookkeeping Status</label>
		                  <select class="form-control" name="bookkeeping_status">
		                  	<option @if(old('bookkeeping_status') == "Yes")selected="selected" @endif>Yes</option>
		                  	<option @if(old('bookkeeping_status') == "No")selected="selected" @endif>No</option>
		                  </select>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Software Use</label>
		                  <input type="text" name="software_use"  class="form-control" placeholder="Software Use"  @if(!empty($template)) value="{{$template->software_use}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Budget <span class="required" style="color: red;">*</span></label>
		                  <input type="text" name="budget" class="form-control" placeholder="82484524"  @if(!empty($template)) value="{{$template->budget}}" @endif required/>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Other</label>
		                  <input type="text" name="other" class="form-control"  placeholder="Other"  @if(!empty($template)) value="{{$template->other}}" @endif>
		                </div>
		              </div>
		            </div>
		            <h4 class="field-title">Services Types</h4>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group undefined">
		                	<div class="sc-iujRgT hUHAcY">
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Accountant"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Accountant' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Accountant
		                		</div>
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Bookkeeping"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Bookkeeping' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Bookkeeping
		                		</div>
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Tax"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Tax' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Tax
		                		</div>
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Audit"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Audit' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Audit
		                		</div>
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Payroll"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Payroll' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Payroll
		                		</div>
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Incorporation"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Incorporation' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Incorporation
		                		</div>
		                		<div class="sc-jhAzac iGbrby">
		                			<label class="sc-bAeIUo fuksr">
		                				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Secretarial service"  name="service_needed[]" @if($service) @foreach($service as $data) {{$data == 'Secretarial service' ? 'checked="checked"' : '' }} @endforeach @endif>
		                				<div class="sc-gqPbQI ilsJbL">
		                					<div class="sc-hORach kMXQwc"></div>
		                				</div>
		                			</label>Secretarial service
		                		</div>

		                	</div>
		                </div>
		              </div>
		            </div>
                <h4 class="field-title">Services Needed</h4>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group undefined">
                      <div class="sc-iujRgT hUHAcY">
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Company Registration"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Company Registration' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Company Registration
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Annual Accounts"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Annual Accounts' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Annual Accounts
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Corporation Tax Return"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Corporation Tax Return' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Corporation Tax Return
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Self Assessment Tax Return"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Self Assessment Tax Return' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Self Assessment Tax Return
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Book keeping"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Book keeping' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Book keeping
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Confirmation Statement"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Confirmation Statement' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Confirmation Statement
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="VAT Returns"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'VAT Returns' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>VAT Returns
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Payroll"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Payroll' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Payroll
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Tax advice"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Tax advice' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Tax advice
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="HMRC registration (VAT, PAYE etc)"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'HMRC registration (VAT, PAYE etc)' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>HMRC registration (VAT, PAYE etc)
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Management accounts"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Management accounts' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Management accounts
                        </div>
                        <div class="sc-jhAzac iGbrby">
                          <label class="sc-bAeIUo fuksr">
                            <input type="checkbox" class="sc-bMVAic kyrrfd" value="Audit"  name="service_required[]" @if($service_required) @foreach($service_required as $data2) {{$data2 == 'Audit' ? 'checked="checked"' : '' }} @endforeach @endif>
                            <div class="sc-gqPbQI ilsJbL">
                              <div class="sc-hORach kMXQwc"></div>
                            </div>
                          </label>Audit
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Other</label>
		                  <textarea name="other_service" class="form-control" rows="4" cols="8">   @if(!empty($template)){{$template->other_service}} @endif</textarea>
		                </div>
		              </div>
		            </div>
		            <h4 class="field-title">About the Client</h4>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Industry <span class="required" style="color: red;">*</span></label>
		                  <input type="text" name="industry"  class="form-control" placeholder="Industry"  @if(!empty($template)) value="{{$template->industry}}" @endif required/>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Experience as a Business Owner</label>
		                  <select name="owner_experience" class="form-control">
		                  	<option  value="Yes" @if(!empty($template)) @if($template->owner_experience =="Yes") selected="selected"  @endif @endif>Yes</option>
		                  	<option  value="No" @if(!empty($template)) @if($template->owner_experience =="No") selected="selected"  @endif @endif>No</option>
		                  </select>
		                </div>
		              </div>
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Existing customer of Experlu?</label>
		                  <select name="existing_customer" class="form-control">
                        <option  value="No" @if(!empty($template)) @if($template->existing_customer =="No") selected="selected"  @endif @endif>No</option>
		                  	<option  value="Yes" @if(!empty($template)) @if($template->existing_customer =="Yes") selected="selected"  @endif @endif>Yes</option>
		                  </select>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Reason for Change (if applicable)</label>
		                  <input type="text" name="reason_change"  class="form-control" placeholder="Reason of Change"  @if(!empty($template)) value="{{$template->reason_change}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Any other Requirements</label>
		                  <input type="text" name="other_requirement"  class="form-control" placeholder="Reason of Change"  @if(!empty($template)) value="{{$template->other_requirement}}" @endif>
		                </div>
		              </div>
		            </div>
		            <h4 class="field-title">Client Contact Preference?</h4>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Mode <span class="required" style="color: red;">*</span></label>
		                  <select name="mode" class="form-control">
		                  	<option  value="Email"  @if(!empty($template)) @if($template->mode =="Email") selected="selected" @endif @endif>Email</option>
		                  	<option  value="Call" @if(!empty($template)) @if($template->mode =="Call")selected="selected" @endif @endif>Call</option>
		                  	<option  value="Text message" @if(!empty($template)) @if($template->mode =="Text message") selected="selected" @endif @endif>Text message</option>
		                  	<option  value="Whatsapp mesage" @if(!empty($template)) @if($template->mode =="Whatsapp mesage") selected="selected" @endif @endif>Whatsapp mesage</option>
		                  </select>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Time</label>
		                  <input type="text"  name="time" class="form-control" placeholder="Time"  @if(!empty($template)) value="{{$template->time}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>When Looking to Hire? <span class="required" style="color: red;">*</span></label>
		                  <input type="text" name="when_hire" class="form-control"  placeholder="When looking to hire?"  @if(!empty($template)) value="{{$template->when_hire}}" @endif required/>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Any deadlines Approaching?</label>
		                  <input type="text" name="deadlines_approch" class="form-control"  placeholder="Any deadlines approaching?"  @if(!empty($template)) value="{{$template->deadlines_approch}}" @endif>
		                </div>
		              </div>
		            </div>
		            <h4 class="field-title">Expert Preferences</h4>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Any Preferred Expert Requirements? </label>
		                  <input type="text" name="expert_requiremnt" class="form-control" placeholder="Any preferred expert requirements? "  @if(!empty($template)) value="{{$template->expert_requiremnt}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>1 </label>
		                  <input type="text" name="expert_1" class="form-control" placeholder="Expert 2 "  @if(!empty($template)) value="{{$template->expert_1}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>2 </label>
		                  <input type="text" name="expert_2" class="form-control"  placeholder="Expert 2 "  @if(!empty($template)) value="{{$template->expert_2}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>3 </label>
		                  <input type="text" name="expert_3" class="form-control"  placeholder="Expert 3 "  @if(!empty($template)) value="{{$template->expert_3}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Local Expert? </label>
		                  <input type="text" name="local_expert" class="form-control"  placeholder="Local expert? "   @if(!empty($template)) value="{{$template->local_expert}}" @endif>
		                </div>
		              </div>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		                <div class="form-group">
		                  <label>Working style with chosen Expert </label>
		                  <input type="text" name="expert_choice" class="form-control"  placeholder="Working style with chosen Expert? Digital, Manual "  @if(!empty($template)) value="{{$template->expert_choice}}" @endif>
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
