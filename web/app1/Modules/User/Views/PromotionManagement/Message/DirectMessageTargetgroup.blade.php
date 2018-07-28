@extends('User::layouts.bodyLayout')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="http://www.jquery2dotnet.com/search/label/css">

    <style>
        button.accordion::after {
            content: "+";
            margin-top: -50px;
            line-height: 2;
        }

        a {
            color: #fff;
        }

        .dropdownd dd,
        .dropdownd dt {
            margin: 0px;
            padding: 0px;
        }

        .dropdownd ul {
            margin: -1px 0 0 0;
        }

        .dropdownd dd {
            position: relative;
        }

        .dropdownd a,
        .dropdownd a:visited {
            color: #fff;
            text-decoration: none;
            outline: none;
            font-size: 12px;
        }

        .dropdownd dt a {
            background-color: #444D58;
            display: block;
            padding: 8px 20px 5px 10px;
            min-height: 25px;
            line-height: 24px;
            overflow: hidden;
            border: 0;
            width: 100%;
        }

        .dropdownd dt a span,
        .multiSel span {
            cursor: pointer;
            display: inline-block;
            /*padding: 0 3px 2px 0;*/
        }

        .dropdownd dd ul {
            background-color: #444D58;
            border: 0;
            color: #fff;
            display: none;
            left: 0px;
            padding: 2px 15px 2px 5px;
            /*position: absolute;*/
            top: 2px;
            width: 100%;
            list-style: none;
            height: 300px;
            overflow: auto;
        }

        .dropdownd span.value {
            display: none;
        }

        .dropdownd dd ul li a {
            padding: 5px;
            display: block;
        }

        .dropdownd dd ul li a:hover {
            background-color: #fff;
        }

        p.multiSel {
            margin: 3px 0 0;
        }

        input.ddinput {
            float: right;
            margin: 15px 6px 0 0;
        }

        .mutliSelect span {
            float: left;
            margin: 4px 0 0 4px;
        }

        .mutliSelect img {
            float: left;
        }

        .mutliSelect ul li {
            float: left;
            width: 100%;
            padding: 5px 0;
            border-bottom: 1px solid #2c3540;
            border-top: 1px solid #5c6570;
        }

        .mutliSelect1 ul li {
            float: left;
            width: 100%;
            padding: 5px 0;
            border-bottom: 1px solid #2c3540;
            border-top: 1px solid #5c6570;
            margin-bottom: auto;
        }
        .instagram-share .checkbox, .radio {
            margin-top: 10px;
            position: relative;
        }

        .checkbox, .form-horizontal .checkbox {
            margin-top: 7px;
            padding: 0;
        }
        .custab {
            box-shadow: 3px 3px 0px transparent;
        }

    </style>
    @endsection

    @section('active_profileManagement','active')
    @section('content')

            <!-- END HEADER -->
    <!-- BEGIN PAGE CONTAINER -->
    {{--{{dd($From_user)}}--}}
    {{--{{dd($created_MessageGroups)}}--}}
    <div class="page-container">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">

                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bell font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">Direct Messaging</span>
                                    <span class="caption-helper">Create Target Group</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0">
                                        <div class="col-md-12"
                                             style="background: rgb(147, 158, 172) none repeat scroll 0% 0%; padding: 5px 0px 20px; border-radius: 5px;">
                                            <h3 class="filter-test"
                                                style="color: rgb(255, 255, 255); padding-bottom: 10px;">Build group for
                                                direct
                                                message by filteration</h3>
                                            <div class="row">
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div id="imaginary_container">
                                                        <div class="input-group stylish-input-group">
                                                            <input type="text" id="GroupSearch" class="form-control"
                                                                   placeholder="Search">
                                <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div id="imaginary_container">
                                                        <div class="input-group stylish-target-group">
                                                            <a href="#myModalTG" class="pull-right" data-toggle="modal">Create
                                                                Targeted Group</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div id="imaginary_container">
                                                        <div class="input-group stylish-target-group">
                                                            <a href="/direct/messages" class="pull-right"><b>+</b>
                                                                Send Message</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 custyle" style="padding:0;">
                                            <table id="groupTable" class="table table-striped custab">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">User Image</th>
                                                    <th>User Name</th>
                                                    <th>Group Name</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                @if(isset($created_MessageGroups_final)  && !empty($created_MessageGroups_final))
                                                    @foreach($created_MessageGroups_final as $traget)
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-center"><img
                                                                        src="{{$traget['From_user']['profile_pic_url']}}"
                                                                        class="img-circle"></td>
                                                            <td>{{$traget['From_user']['username']}}</td>
                                                            <td>{{$traget['created_MessageGroups']['target_group_name']}}</td>
                                                            <td class="text-center">
                                                                <button class="editGroup btn btn-info btn-xs"
                                                                        data-val="{{$traget['created_MessageGroups']['target_group_id']}}"
                                                                        data-id="{{$traget['From_user']['ins_user_id']}}"><span
                                                                            class="glyphicon glyphicon-edit"></span>View
                                                                    Details
                                                                </button>
                                                                <button class="Delete_TG  btn btn-danger btn-xs"
                                                                        data-val="{{$traget['created_MessageGroups']['target_group_id']}}"
                                                                        data-id="{{$traget['From_user']['ins_user_id']}}"><span
                                                                            class="glyphicon glyphicon-remove"></span>Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                        @else
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-center">NO GROUP FOUND, CREATE SOME
                                                                    TARGET GROUP
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        @endif
                                            </table>
                                            <div class="not-found text-center" style="display:none"><h3>--No Results
                                                    Found--</h3></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--model link--}}


    <div id="groupDetails" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 345px;">
                <div class="modal-body Programme-mangaement" style="background:#EFF3F8; height: 345px; ">
                    <h4>Group Details</h4><br>
                    {{--<div id="foo" class="panel pnl_bg genderSelected" value="">--}}
                    {{--<div class="col-md-8" style="padding:10px 10px 30px 10px; ">--}}
                    <div class="col-sm-9 dropdown">
                        <select id="selectHUL" name="carlist" form="carform">
                            <option value="1" selected="selected">USERNAMES</option>
                            <option value="2">HASHTAGS</option>
                            <option value="3">LOCATIONS</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <div class="row" id="hashtag">
                        <ul>
                            <li>hash1</li>
                            <li>hash2</li>
                            <li>hash3</li>
                        </ul>
                    </div>
                    <div class="row" id="username">
                        <ul>
                            <li>user1</li>
                            <li>user2</li>
                            <li>user3</li>
                        </ul>
                    </div>
                    <div class="row" id="location">
                        <ul>
                            <li>loc1</li>
                            <li>loc2</li>
                            <li>loc3</li>
                        </ul>
                    </div>


                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>

        </div>
    </div>

    <div id="myModalTG" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body Programme-mangaement" style="background:#EFF3F8;">
                    <h4>Create Targeted Group</h4><br>
                    <dl class="dropdownd">
                        <dt>
                            <a href="#">
                                <span class="hida1">Choose here from which acoount you want to create Targeted Group</span>
                                <span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"
                                      style="margin-top: 9px;"></span>
                                <p class="multiSel1"></p>
                            </a>
                        </dt>
                        <dd>
                            <div class="mutliSelect1">
                                <ul>
                                    @if(isset($From_user) && !empty($From_user))
                                        @foreach($From_user as $value)
                                            @if($value['subscribe_type']=="BU")
                                                <li><label style="width:100%">
                                                        <img src="{{$value['profile_pic_url']}}" width="40">
                                                        <span><b>{{$value['username']}}</b></span>
                                                        <div class="checkbox pull-right">
                                                            {{--<input type="checkbox" value="{{$value['username']}}" id="squaredone" name="check" style="">--}}
                                                            <input type="radio" class="selectAccount"
                                                                   value="{{$value['username']}}"
                                                                   id="{{$value['ins_user_id']}}" name="check" style="">
                                                            {{--<label for="squaredone"></label>--}}
                                                        </div>
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </dd>

                    </dl>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="groupName" placeholder="Group name">
                        <br>
                    </div>
                    <div class="">
                        <button class="accordion" style="height: 75px;" id="hashTagHead" count=""><img
                                    src="/assets/user/user-panel/img/add-label-button.png"
                                    class="img-responsive;">&nbsp;<b>HASH TAGS</b>
                            <h5 style="margin-left: 50px; margin-top: -11px;color:#767676;">Expose me to all pepole that
                                upload picture / video to those hashtags</h5>
                        </button>
                        <div class="panel pnl_bg" id="hashTagHeadContent">
                            <div class="col-md-8" style="padding:10px 10px 30px 10px;">
                                {{--<div class="col-sm-2" style="color:black; margin-bottom:20px;">--}}
                                {{--<a href="#">Tags &nbsp;<a href="#" data-toggle="tooltip" data-placement="bottom"--}}
                                {{--title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img--}}
                                {{--src="/assets/user/user-panel/img/question-mark.png"></a></a>--}}
                                {{--</div>--}}
                                <div class="col-lg-12">
                                    <div id="mainHashTag">

                                    </div>
                                    <div class="btn-group btnspace">
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#myModal">ADD
                                        </button>
                                        <button type="button" class="btn btncolor dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Delete all user names</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <button class="accordion" style="height: 75px;"><img
                                    src="/assets/user/user-panel/img/placeholder-for-map.png"
                                    count=""
                                    class="img-responsive;">&nbsp;&nbsp;<b style="margin-left:5px;">GEOGRAPHICAL
                                LOCATIONS</b>
                            <h5 style="margin-left: 50px; margin-top: -11px;color:#767676;">Expose me to all people that
                                did check in at those places</h5>
                        </button>
                        <div class="panel pnl_bg">
                            <div class="col-md-8" style="padding:10px 10px 30px 10px; ">
                                {{--<div class="col-sm-3">--}}
                                {{--<a href="#">Locations &nbsp;<a href="#" data-toggle="tooltip"--}}
                                {{--title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img--}}
                                {{--src="/assets/user/user-panel/img/question-mark.png"></a></a>--}}
                                {{--</div>--}}
                                <div class="col-lg-12">
                                    <div id="LocMainTag">


                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="btn-group btnspace">
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#myModal1" onclick="loc()">ADD
                                        </button>
                                        <button type="button" class="btn btncolor dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Delete all user names</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="accordion" style="height: 75px;" id="addUserModalData" count=""><img
                                    src="/assets/user/user-panel/img/black-male-user-symbol.png"
                                    class="img-responsive;"><b style="margin-left:14px;">USER NAMES</b>
                            <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me to all people that
                                follow those accounts</h5>
                        </button>

                        <div class="panel pnl_bg">
                            <div class="col-md-8" style="padding:10px 10px 30px 10px; ">
                                {{--<div class="col-sm-3">--}}
                                {{--<a href="#">User Name &nbsp;<a href="#" data-toggle="tooltip"--}}
                                {{--title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img--}}
                                {{--src="/assets/user/user-panel/img/question-mark.png"></a></a>--}}
                                {{--</div>--}}
                                <div class="col-lg-12">
                                    <div id="unMainTag">

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="btn-group btnspace">
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#myModal2">ADD
                                        </button>
                                        <button type="button" class="btn btncolor dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Delete all user names</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--<button class="accordion" style="height: 75px;"><img src="/assets/user/user-panel/img/genders(1).png"--}}
                        {{--class="img-responsive;"><b style="margin-left:14px;">GENDER</b>--}}
                        {{--<h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me only to men/women</h5>--}}
                        {{--</button>--}}
                        <div id="foo" class="panel pnl_bg genderSelected" value="">
                            <div class="col-md-8" style="padding:10px 10px 30px 10px; ">
                                <div class="col-sm-3">
                                    <p>Gender &nbsp;:</p>
                                </div>
                                <div class="col-sm-9 dropdown">
                                    <select id="selectGender" name="carlist" form="carform">

                                        <option id="gendervaluee1"
                                                value="1">MALE
                                        </option>
                                        <option id="gendervaluee2"
                                                value="2">FEMALE
                                        </option>
                                        <option id="gendervaluee3"
                                                value="3">BOTH
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        {{--<center class="link-share-login">--}}
                        {{--<button type="button" id="group_created" class="btn btn-default">Create Group</button>--}}
                        {{--</center>--}}
                        <center class="link-share-login">
                            <button type="button" id="createGroup" class="btn btn-default">Create Group</button>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- -------------Modals -------------------->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Add tags</h4>

                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top: 5%;padding: 0px 10px;">
                        <div style="position: fixed; padding: 10px 0; width: 90%;">
                            <div class="col-md-8 col-md-offset-2">


                                <!-- Search Field -->
                                <div class="row">
                                    <input type="text" id="area" class="form-control"/>
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input class="form-control" type="text" id="tagId" name="search"
                                                   placeholder="Tag" required/>

                                                    <span class="input-group-btn">
                                                                <div class="btn btn-success" type="button">
                                                                    <span id="findTag">
                                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                                     </span>
                                                                </div>
                                                     </span>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- End of Search Form -->

                    </div>

                    <div id="hashTagId"
                         style="margin-top: 90px; min-height:auto; max-height:300px; overflow-y:auto;">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="AddHash">Add
                    </button>
                    <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close
                    </button>
                </div>
            </div>
        </div>

    </div>
    <!--    ADD USER NAME MODAL -->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">Add UserName</h4>
                </div>
                <div class="modal-body">

                    <div class="row" style="padding: 0px 10px;">

                        <div style="position: fixed; padding: 10px 0; width: 90%;">

                            <div class="form-group col-md-offset-2 col-md-8">

                                {{--<!-- Search Field -->--}}
                                <div class="row">
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input id="userNameText" class="form-control" type="text"
                                                   name="search"
                                                   placeholder="User Name" required/>

                                                 <span class="input-group-btn">
                                                    <div class="btn btn-success" type="button">
                                                      <span id="findUser">
                                                          <i class="fa fa-search" aria-hidden="true"></i>
                                                     </span>
                                                    </div>
                                                 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="userNameTag"
                             style="margin-top: 90px; min-height:auto; max-height:300px; overflow-y:auto;">

                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="addUserName">Add
                    </button>
                    <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">Add Location</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top: 5%;padding: 0px 10px;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Field -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="input-group" id="search">
                                        <input class="form-control" id="locTextValue" type="text"
                                               name="search"
                                               placeholder="Location"
                                               required/>

                                                            <span class="input-group-btn">

                                                                <div class="btn btn-success" type="button">
                                                                    <span id="findLoc">
                                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                                     </span>
                                                                </div>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Search Form -->

                        </div>
                    </div>
                    <div id="getCurrentLatLongDemo">

                    </div>

                    <div id="getCurrentLatLongTag"
                         style="margin-top: 90px; min-height:auto; max-height:300px; overflow-y:auto;">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="addLocationTagModal">Add
                    </button>
                    <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div id="view" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!— Modal content-->
            <div class="modal-content">
                <div class="modal-body Programme-mangaement" style="background:#EFF3F8;">

                    <h4 class="text-center">DETAILS for hashtag/username/locations</h4>
                    <hr>
                    <div class="form-group">
                        <select id="grpDrp">
                            <option value="hash" selected="selected">HASHTAGS</option>
                            <option value="user">USERNAMES</option>
                            <option value="loc">LOCATIONS</option>
                        </select>
                    </div>
                    <div class="drp" id="hash">
                        <ul>
                        </ul>
                    </div>
                    <div class="drp" style="display: none;" id="user">
                        <ul>
                        </ul>
                    </div>

                    <div class="drp" style="display: none;" id="loc">
                        <ul>
                        </ul>
                    </div>

                </div>
            </div>


        </div>
    </div>


@endsection


@section('pagejavascripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>--}}
    <script src="/assets/user/js/underscore-min.js"></script>
    <!--<script src="assets/js/moment.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>-->
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/bootbox.min.js"></script>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function () {
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
            }
        }
    </script>
    <script type="text/javascript">

        $(".dropdownd dt a").on('click', function () {
            $(".dropdownd dd ul").slideToggle('fast');
        });

        $(".dropdownd dd ul li a").on('click', function () {
            $(".dropdownd dd ul").hide();
        });

        function getSelectedValue(id) {
            return $("#" + id).find("dt a span.value").html();
        }

        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdownd")) $(".dropdownd dd ul").hide();
        });

        $('.mutliSelect1 input[type="radio"]').on('click', function () {
            var selectedUser;

            var title = $(this).closest('.mutliSelect1').find('input[type="radio"]').val(),
                    title = $(this).val() + ",";
            selectedUser = $(this).attr("user_id");
            $('.multiSel1').find('span').remove();
            var html = '<span title="' + title + '">' + title + '</span>';
            $('.multiSel1').append(html);
            $(".hida1").hide();
        });
        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdowna")) $(".dropdowna dd ul").hide();
        });


    </script>

    <script>
        $(document).ready(function () {
            $('.mutliSelect1 input[type="radio"]').on('click', function () {

                var title = $(this).closest('.mutliSelect1').find('input[type="radio"]').val(),
                        title = $(this).val() + "";
                var selectedUser = $(this).attr("user_id");
                $('.multiSel1').find('span').remove();
                var html = '<span title="' + title + '" selectedUser="' + selectedUser + '">' + title + '</span>';
                $('.multiSel1').append(html);
                $(".hida1").hide();
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>

    {{----------------------------------functionality-----start---------->--------------}}

    <script>
        $(document).ready(function () {

            $("#taglist").click(function () {
                $("#manualAddID").css('display', 'block');
                $("#searchmanually").css('display', 'block');
                $("#searchtags").show();
                $("#taglist").hide();
                $("#search").hide();
            });

            $("#searchtags").click(function () {
                $("#manualAddID").css('display', 'none');
                $("#searchmanually").css('display', 'none');
                $("#taglist").show();
                $("#search").show();
                $("#add").hide();
                $("#area").hide();
                $("#close").show();
                $("#searchtags").hide();
            })
        });
    </script>


    <script>
        $(document).ready(function (e) {

            var j = 0;
            $("#HashManualId").click(function () {
                var tagManualId = $("#tagManualId").val();
                $("#hashTagId").append('<a id="tagId' + j + '" href="#" value="' + tagManualId + '" class="unit-tag hashtag1"><span>' + tagManualId + '</span><span class="unit-btn-x"><input class="hashtagcheck1" type="checkbox" value="' + tagManualId + '"></span></a>');
                j++;

            })
        })


    </script>
    {{------------hashTagFinder-----------(start)-------}}
    <script>
        $(document).ready(function (e) {

            var count = 1;
            var hash_timer, hash_delay = 750;
            $(document.body).on('input', '#tagId', function () {
                var searchTag = $(this).val().trim();
                if (searchTag) {
                    $('#findTag i').attr('class', 'fa fa-refresh fa-spin');

                }
                clearTimeout(hash_timer);
                hash_timer = setTimeout(function () {
                    if (searchTag) {
                        $.ajax({
                            url: '/user/hashTagFinder',
                            type: 'post',
                            data: {
                                'tag': searchTag
                            },
                            success: function (response) {
                                $('#findTag i').attr('class', 'fa fa-search');
                                $(".hashtag1").remove();
                                if (response == 201) {
                                    $("#loadnwait").css('display', 'none');
                                    alert("no result found");
                                }
                                else if (response == 202) {
                                    $("#loadnwait").css('display', 'none');
                                    alert("no user found");

                                }
                                else {
                                    arrayTag = [];
                                    $("#loadnwait").css('display', 'none');
                                    if (response.length > 0) {
                                        for (var i = 0; i < response.length; i++) {

                                            $("#hashTagId").append('<a id="tagId' + i + '" href="#" value="' + response[i].name + '" class="unit-tag hashtag1"><span>' + response[i].name + '</span><span class="unit-btn-x"><input class="hashtagcheck1" type="checkbox" value="' + response[i].name + '"></span></a>');
                                            count++;
                                            arrayTag.push(response[i].name);

                                        }

                                    }
                                    else {
                                        alert("something went wrong");
                                    }

                                }


                            }
                        });
                    }
                    else {
                        $('#findTag i').attr('class', 'fa fa-search');
                    }

                }, hash_delay)

            })
        })


    </script>
    {{------------hashTagFinder-----------(start)-------}}

    {{------------userNameFinder-----------(start)-------}}
    <script>
        $(document).ready(function () {
            var count = 1;
            var user_timer, user_delay = 750;
            $(document.body).on('input', '#userNameText', function () {
                var searchUser = $(this).val().trim();
                if (searchUser) {
                    $('#findUser i').attr('class', 'fa fa-refresh fa-spin');
                }

                clearTimeout(user_timer);
                user_timer = setTimeout(function () {
                    var userNameText = $("#userNameText").val();
                    if (searchUser) {
                        $.ajax({
                            url: '/user/userNameFinder',
                            type: 'post',
                            data: {
                                'searchValue': userNameText
                            },
                            success: function (response) {
                                $('#findUser i').attr('class', 'fa fa-search');
                                $('#removeUserLoader').remove();

                                $(".hashtag2").remove();
                                if (response == 201) {
                                    alert("no result found");
                                }
                                else if (response == 202) {
                                    alert("no user found");

                                }
                                else {
                                    if (response.length > 0) {
                                        for (var i = 0; i < response.length; i++) {

                                            $("#userNameTag").append('<span id="unTag' + i + '" class="unit-tag hashtag2" value="' + response[i].username + '"><img src="' + response[i].profile_pic_url + '" height="41px" width="41px" ><span>' + response[i].username + '</span><span class="unit-btn-x"><input type="checkbox" class="username-check"  username="' + response[i].username + '" full_name="' + response[i].full_name + '" profile_picture="' + response[i].profile_pic_url + '" pk="' + response[i].pk + '" count="' + i + '"></span></span>');
                                            count++;

                                        }

                                    }
                                    else {
                                        alert("something went wrong");
                                    }

                                }


                            }
                        });
                    }
                    else {
                        $('#findUser i').attr('class', 'fa fa-search');
                    }


                }, user_delay);


            })
        })

    </script>
    {{------------userNameFinder-----------(end)-------}}

    {{------------locationFinder-----------(start)-------}}

    <script>

        $(document).ready(function () {

            var location_timer, location_delay = 1000;
            $(document.body).on("input", "#locTextValue", function () {
                var searchLocation = $(this).val().trim();
                if (searchLocation) {
                    $('#findLoc i').attr('class', 'fa fa-refresh fa-spin');

                } else {
                    $('#findLoc i').attr('class', 'fa fa-search');
                }
                $("#getCurrentLatLongTag").empty();
                clearTimeout(location_timer);
                location_timer = setTimeout(function () {

                    if (searchLocation.length != 0) {

                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({'address': searchLocation}, function (results, status) {
                            if (typeof(results[0]) != "undefined" && results[0] != null) {
                                var place = results[0].formatted_address;
                                if (~place.indexOf(",")) {

                                    var country = place.split(",");
                                    var country = country[country.length - 1];
                                    var full_address = searchLocation + "," + country;
                                    full_address = full_address.replace(' ', '');
                                    console.log('full_address=====>', full_address)
                                }
                                else {
                                    //no city name found
                                    full_address = searchLocation;
                                }

                                console.log('full_address---------->', full_address)
                                $.ajax({
                                    url: '/user/findLocation',
                                    type: 'post',
                                    data: {
                                        searchLocation: full_address
                                    },
                                    success: function (response) {
                                        $('#findLoc i').attr('class', 'fa fa-search');
                                        if (response == "") {
                                            $("#getCurrentLatLongDemo").children().remove();
                                            $('#getCurrentLatLongDemo').append('<div style="text-align:center">No Location Found</div>')
                                        }

                                        else if (response == 201) {
                                            $("#getCurrentLatLongDemo").empty();
                                            $('#getCurrentLatLongDemo').append('<div style="text-align:center">No Results Found</div>')
                                        }
                                        else if (response == 202) {
                                            $("#getCurrentLatLongDemo").empty();
                                            $('#getCurrentLatLongDemo').append('<div style="text-align:center">Something Went Wrong</div>')
                                        }
                                        else {
                                            var array = [];
                                            var i = 0;
                                            $("#getCurrentLatLongDemo").empty();
                                            $("#getCurrentLatLongDemo").append('<div><div id="map" style="width: 500px; height: 400px;margin: 0 0 0 33px;"></div></div>');


                                            $.each(response, function (item, value) {
                                                $("#getCurrentLatLongTag").append('<span id="unTag' + i + '" class="unit-tag hashtag4" value="' + value.name + '"><span>' + value.name + '</span><span class="unit-btn-x"><input type="checkbox" class="location-check"  id="' + value.pk + '" name="' + value.name + '" latitude="' + value.lat + '" longitude="' + value.lng + '" count="' + i + '"></span></span>');
                                                i++;
                                            })

                                            $.each(response, function (item, value) {
                                                array.push([value.name, value.lat, value.lng, item])
                                            })


                                            var locations = array;

                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                zoom: 10,
                                                // center: new google.maps.LatLng(-33.92, 151.25),
                                                center: new google.maps.LatLng(response[0].lat, response[0].lng),
                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                            });

                                            var infowindow = new google.maps.InfoWindow();

                                            var marker, i;

                                            for (i = 0; i < locations.length; i++) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    map: map
                                                });

                                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                                    return function () {
                                                        infowindow.setContent(locations[i][0], locations[i][6]);
                                                        infowindow.open(map, marker);
                                                    }
                                                })(marker, i));
                                            }

                                        }
                                    }
                                });

//
                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }
                        });

                    }

                }, location_delay)

            })

        })

    </script>
    {{------------locationFinder-----------(end)-------}}

    <script>
        $(document).ready(function (e) {

            var j = 0;
            $("#HashManualId").click(function () {
                var tagManualId = $("#tagManualId").val();
                $("#hashTagId").append('<a id="tagId' + j + '" href="#" value="' + tagManualId + '" class="unit-tag hashtag1"><span>' + tagManualId + '</span><span class="unit-btn-x"><input class="hashtagcheck1" type="checkbox" value="' + tagManualId + '"></span></a>');
                j++;

            })
        })


    </script>


    <script>
        $(document).ready(function () {

            var tag = [];
            var user = [];
            var location = [];

//            for hashtag module
            $("#AddHash").click(function () {

                var Hashflag = false;
                $.each($('.hashtagcheck1'), function (i, v) {
                    if ($(this).is(":checked")) {
                        Hashflag = true;
                        tag.push($(this).attr("value"));
                        tag = tag.filter(function (item, pos) {
                            return tag.indexOf(item) == pos;
                        })
                    }
                })
                if (Hashflag == false) {
                    toastr.error('choose atleast one hashtag');
                    return true;
                }
                $(".currrentTagClassRemove").remove();
                $(".removeCurrentTagClass").remove();
                $(".hashTagModalDataRemove").remove();
                $(".removeCurrentHashTagData").remove();

                $("#myModal").modal("hide");

                var counttagnow = tag.length;

                $("#mainHashTag").empty();

                for (var i = 0; i < counttagnow; i++) {
                    $("#mainHashTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor instagram_hashtag" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + tag[i] + '</button><button  type="button" id="removeCurrentTag' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag" value="' + tag[i] + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }

            })
            $(document).on('click', '.removeCurrentTag', function (e) {
                var value = $(this).attr("abc");
                var addvalue = $(this).attr("value");
                $("#currentTag" + value).remove();
                $("#removeCurrentTag" + value).remove();

                tag = jQuery.grep(tag, function (e) {
                    return e != addvalue
                })

            })
            //hashtag code ends here

            //for username module
            $("#addUserName").click(function () {


                var UserFlag = false;
                $.each($('.username-check'), function (i, v) {

                    var username = $(this).attr("username");
                    var full_name = $(this).attr("full_name");
                    var profile_picture = $(this).attr("profile_picture");
                    var id = $(this).attr("pk");
                    var count = $(this).attr("count");
                    if ($(this).is(":checked")) {
                        UserFlag = true;
                        user.push({
                            'username': username,
                            'full_name': full_name,
                            'profile_picture': profile_picture,
                            'id': id,
                            'lastUpdate': Math.floor(Date.now() / 1000)
                        });
                        user = _.uniq(user, function (item) {
                            return item.username;
                        });

                    }

                })
                if (UserFlag == false) {
                    toastr.error('choose atleast one username');
                    return true;
                }
                user = user.filter(function (e) {
                    return e
                });
                $(".currrentusernameClassRemove").remove();
                $(".removeCurrentusernmaeClass").remove();
                $(".removeCurrentTag2").remove();
                $(".addedFromModaluser").remove();

                $("#unMainTag").empty();
                var countuser = user.length;

                for (var i = 0; i < countuser; i++) {

                    $("#unMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor instagram_username" pk="' + user[i].id + '" id="currentTag2' + i + '" data-toggle="modal" data-target="#">' + user[i].username + '</button><button  type="button" id="removeCurrentTag2' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                }

            })
            $(document).on('click', '.removeCurrentTag2', function (e) {
                var value = $(this).attr("abc");
                var uName = $("#currentTag2" + value).text();
                $("#currentTag2" + value).remove();
                $("#removeCurrentTag2" + value).remove();

                user = $.grep(user, function (item) {
                    return item.username != uName;
                });


            });
            //end username module

//            for location model
            $("#addLocationTagModal").click(function () {
                console.log('add clicked')

                var LocationFlag = false;

                $.each($('.location-check'), function (i, v) {
                    console.log($(this).attr("id"));
                    var id = $(this).attr("id");
                    var name = $(this).attr("name");
                    var latitude = $(this).attr("latitude");
                    var longitude = $(this).attr("longitude");
                    var lastUpdate = $(this).attr("lastUpdate");
                    var count = $(this).attr("count");
                    if ($(this).is(":checked")) {
                        LocationFlag = true;
                        location.push({
                            'id': id,
                            'name': name,
                            'latitude': latitude,
                            'longitude': longitude,
                            'lastUpdate': Math.floor(Date.now() / 1000)
                        });
                        location = _.uniq(location, function (item, key, id) {
                            console.log("uniq")
                            return item.id;
                        });
                        console.log(location);
                    }
                })


                if (LocationFlag == false) {
                    toastr.error('choose atleast one location');
                    return true;
                }
                location = location.filter(function (e) {
                    return e
                });
                $(".currrentlocClassRemove").remove();
                $(".removeCurrentlocClass").remove();
                $(".removeCurrentTag4").remove();
                $(".addedFromModalLoc").remove();

                $("#LocMainTag").empty();
                countloc = location.length;

                for (var i = 0; i < countloc; i++) {

                    $("#LocMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor insta_location" myLoc="' + location[i].id + '"id="currentTag4' + i + '" data-toggle="modal" data-target="#">' + location[i].name + '</button><button  type="button" id="removeCurrentTag4' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                }

            });
            $(document).on('click', '.removeCurrentTag4', function (e) {

                var value = $(this).attr("abc");
                var location_id = $("#currentTag4" + value).attr("data-location_id");
                $("#currentTag4" + value).remove();
                $("#removeCurrentTag4" + value).remove();
                location = $.grep(location, function (item) {
                    return item.id != location_id;
                });
            })
            //location code ends here
        })
    </script>

    <script>
        $(document).ready(function () {
            $(".userNameAddButton").click(function () {
                $(".hashtag2").remove();
            })

        })

    </script>

    <script>
        $(document).ready(function () {
            $(".hashTagModalButton").click(function () {
                $(".hashtag1").remove();
            })

        })

    </script>

    <script>
        function loc() {
            console.log("here");
//            alert("came herer");
            $("#getCurrentLatLongTag").empty();
            var lat = 0;
            var long = 0;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showPosition(position) {
                lat = position.coords.latitude;
                long = position.coords.longitude;

                var latlng = new google.maps.LatLng(lat, long);
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({'latLng': latlng}, function (results, status) {

//                    console.log('--===----====---===---', results[2])
                    if (status == google.maps.GeocoderStatus.OK) {
                        var place = results[3].formatted_address;
                        if (~place.indexOf(",")) {

                            var country = place.split(",");
                        }
                        console.log(country[1]);

//                            $("#getCurrentLatLong").append('<iframe id="geoLocation" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs&q='+results[2].formatted_address+'"+ width="560" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>');
                        $("#getCurrentLatLongDemo").append('<div><div id="map" style="width: 500px; height: 400px;margin: 0 0 0 33px;"></div></div>');

                        var locations = [
                            [
                                results[2].formatted_address,
                                lat,
                                long,
                                1

                            ]

                        ]

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 12,
                            // center: new google.maps.LatLng(-33.92, 151.25),
                            center: new google.maps.LatLng(lat, long),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        var infowindow = new google.maps.InfoWindow();

                        var marker, i;

                        for (i = 0; i < locations.length; i++) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                            });

                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent(locations[i][0], locations[i][6]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }

                    }

                });

            }


        }


    </script>



    {{--//to delete a group--}}
    <script>
        $(document).ready(function () {

            $('.Delete_TG').click(function () {
                var obj = $(this);
                var TG_group_id = $(this).attr("data-val");
                var TG_user_id_createdby = $(this).attr("data-id");
                console.log('TG_group_id==>', TG_group_id);
//                console.log('TG_user_id_createdby==>',TG_user_id_createdby);
//                return true;
                $.ajax({
                            url: '/user/DeleteGroupById',
                            type: 'post',
                            data: {

                                TG_group_id: TG_group_id,
                                TG_user_id_createdby: TG_user_id_createdby
                            },
                            success: function (response) {
                                toastr.options = {
                                    timeOut: 1000,
                                    extendedTimeOut: 100,
                                    tapToDismiss: true,
                                    debug: false,
                                    fadeOut: 10,
                                    positionClass: "toast-top-center",
                                    limit: 1
                                };
                                if (response == 200) {
                                    obj.parent().parent().remove();
                                    toastr.success("sucessfully deleted");
                                } else {
                                    toastr.error("something went worng please try again deleted");
                                }
                            }
                        }
                )
            })

        })
    </script>

    <script>
        $(document).ready(function () {
            $(document.body).on('click', '#createGroup', function () {
                console.log('clicked');
//                return true;
                var insta_account = '';
                var group_name;

                var noInputSelected = true;
                var id_plus_username = [];
//                    var usernames = [];
                var insagram_hashtag = [];

                var loc_id_plus_name = [];

                toastr.options = {
                    timeOut: 1000,
                    extendedTimeOut: 5000,
                    tapToDismiss: true,
                    debug: false,
                    fadeOut: 10,
                    positionClass: "toast-top-center",
                    limit: 1
                };

                $(".selectAccount").each(function (index) {
                    var value = $(this).attr("id");
                    if ($(this).is(":checked")) {
                        insta_account = value;
                    }
                });
                group_name = $('#groupName').val();
                $.each($('.instagram_hashtag'), function (i, v) {
                    noInputSelected = false;
                    insagram_hashtag.push($(v).text());
                })
                $.each($('.instagram_username'), function (i, v) {

                    noInputSelected = false;
                    var user_id = $(v).attr('pk');
                    var user_name = $(v).text();
                    id_plus_username.push({"id": user_id, "username": user_name});
                })
                $.each($('.insta_location'), function (i, v) {
                    noInputSelected = false;
                    var loc_id = $(v).attr('myLoc')
                    var loc_name = $(v).text()
                    loc_id_plus_name.push({"id": loc_id, "name": loc_name});
                })

                if (insta_account.length == 0) {
                    toastr.error("please select any instagram  business account")
                    return true;
                }
                if (group_name.length == 0) {
                    toastr.error("please enter some group name")
                    return true;
                }
                if (noInputSelected == true) {
                    toastr.error("please add atleast one hashtag/username/location")
                    return true;
                }

                $.ajax({
                    url: '/createTargetGroup',
                    type: 'post',
                    dataType: "json",
                    data: {
                        insta_account: insta_account,
                        group_name: group_name,
                        insagram_hashtag: insagram_hashtag,
                        loc_id_plus_name: loc_id_plus_name,
                        id_plus_username: id_plus_username,
                    },
                    success: function (response) {
                        console.log('response---->', response)
                        if (response.code == 200 && response.status == 'success') {
                            toastr.success("success, group created");
                            setTimeout(function () {
                                location.reload();
                            }, 3000)
                        } else {
                            toastr.error("failed, group not created/updated")
                        }
                    }
                });


            });

        })
    </script>

    <script>
        //        $(document).ready(function () {
        //            $(document.body).on('keyup', '#GroupSearch', function () {
        //                var table, tr, td, i, username, group_name;
        //                var searchKey = $(this).val().toUpperCase();
        //                table = document.getElementById("groupTable");
        //                tr = table.getElementsByTagName("tr");
        //                var rowCount=tr.length;
        //                var hiddenCount=0;
        //                for (i = 0; i < rowCount; i++) {
        //                    username = tr[i].getElementsByTagName("td")[1];
        //                    group_name = tr[i].getElementsByTagName("td")[2];
        //                    if (username || group_name) {
        //                        if (username.innerHTML.toUpperCase().indexOf(searchKey) > -1) {
        //                            tr[i].style.display = "";
        //                        } else if (group_name.innerHTML.toUpperCase().indexOf(searchKey) > -1) {
        //                            tr[i].style.display = "";
        //                        } else {
        //                            hiddenCount++;
        //                            tr[i].style.display = "none";
        //                        }
        //                    }
        //                    if(hiddenCount==(rowCount-1)){
        //                        $('.not-found').css('display', 'block');
        //                    }else{
        //                        $('.not-found').css('display', 'none');
        //                    }
        //                }
        //
        //            })
        //        })
    </script>

    <script>
        $(document).ready(function () {
            $(document.body).on('input', '#GroupSearch', function () {
                var table, tr, td, i, username, group_name;
                var searchKey = $(this).val().toUpperCase();
                table = $('#groupTable tbody tr');
                console.log(table.size());
                var rowCount = table.size();
                var hiddenCount = 0;
                for (i = 0; i < rowCount; i++) {
                    username = table.eq(i).find('td').eq(1).text();
                    group_name = table.eq(i).find('td').eq(2).text();
                    if (username || group_name) {
                        if (username.toUpperCase().indexOf(searchKey) > -1) {
                            table[i].style.display = "";
                        } else if (group_name.toUpperCase().indexOf(searchKey) > -1) {
                            table[i].style.display = "";
                        } else {
                            hiddenCount++;
                            table[i].style.display = "none";
                        }
                    }
                }
                if (rowCount == hiddenCount) {
                    $('.not-found').css('display', 'block');
                } else {
                    $('.not-found').css('display', 'none');
                }

            })
        })
    </script>

    <script>
        $(document).ready(function () {

            $(document.body).on('click', '.editGroup', function () {

                var target_group_id = $(this).attr('data-val');
                var for_insta_id = $(this).attr('data-id');

                $.ajax({
                    url: '/getUniqueGroup',
                    type: 'post',
                    datatype: 'json',
                    data: {
                        for_insta_id: for_insta_id,
                        target_group_id: target_group_id
                    },
                    success: function (response) {

                        $('#view #hash ul').find('li').remove();
                        $('#view #user ul').find('li').remove();
                        $('#view #loc ul').find('li').remove();
                        $('#view #hash').find('h4').remove();
                        $('#view #user').find('h4').remove();
                        $('#view #loc').find('h4').remove();

                        var htmlHash = '';
                        var htmlUser = '';
                        var htmlLoc = '';
                        if (response.code == 200 && response.status == 'success') {

                            var api_data = response.data[0];
                            var hashtags = JSON.parse(api_data.hashtag);
                            var usernames = JSON.parse(api_data.usernames);
                            var locations = JSON.parse(api_data.locations);

                            console.log('hashtags==>', hashtags)
                            console.log('hashtagsv typeof==>', typeof hashtags)


                            if (hashtags !== "null" && hashtags != 'undefined' && hashtags !== null) {
                                $.each(hashtags, function (i, hash) {
                                    htmlHash = htmlHash + '<li>' + hash + '</li>';
                                })
                                $('#view #hash ul').append(htmlHash);
                            } else {
                                $('#view #hash').append('<h4>NO HASHTAG</h4>');
                            }

                            if (usernames !== "null" && usernames != 'undefined' && usernames !== null) {
                                $.each(usernames, function (i, user) {
                                    htmlUser = htmlUser + '<li>' + user.username + '</li>';
                                })
                                $('#view #user ul').append(htmlUser);
                            } else {
                                $('#view #user').append('<h4>NO USERNAME</h4>');
                            }
                            if (locations !== "null" && locations != 'undefined' && locations !== null) {
                                $.each(locations, function (i, loc) {
                                    htmlLoc = htmlLoc + '<li>' + loc.name + '</li>';
                                })
                                $('#view #loc ul').append(htmlLoc);
                            } else {
                                $('#view #loc').append('<h4>NO LOCATION</h4>');
                            }

                            $('#view').modal('show');

                        } else if (response.code == 400 && response.status == 'failed') {
                            console.log('no details found')
                        }
//                        console.log(response);

//                      $('#groupDetails').modal('show');


                    }
                })

            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document.body).on('change', '#grpDrp', function () {
                var optionValue = $(this).val();
                $(".drp").hide();
                $('#' + optionValue).show();
            })

        });
    </script>

@endsection
