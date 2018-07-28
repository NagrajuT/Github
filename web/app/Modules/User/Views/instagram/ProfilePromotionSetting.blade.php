@extends('User::layouts.bodyLayout')

@section('headcontent')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="http://www.jquery2dotnet.com/search/label/css">
    <style>
        #area,
        #searchtags,
        #add {
            display: none;
        }

        .removehover a:hover {
            background-color: white !important;
            color: #33CAC2 !important;
        }

        .dropdown > .dropdown-menu,
        .dropdown-toggle > .dropdown-menu,
        .btn-group > .dropdown-menu {
            margin-top: 0px !important;
        }

        .unit-tag {
            background: #666665 none repeat scroll 0 0 !important;
            border-radius: 4px !important;
            color: #fff !important;
            display: inline-block !important;
            line-height: 34px !important;
            margin: 0 26px 20px 0 !important;
            padding: 0 22px 0 12px !important;
            position: relative !important;
            text-decoration: none !important;
            vertical-align: middle !important;
        }

        .unit-btn-x {
            cursor: pointer !important;
            display: inline-block !important;
            font-family: Verdana !important;
            font-size: 14px !important;
            height: 34px !important;
            margin-left: 10px !important;
            right: 0 !important;
            text-align: center !important;
            top: 0 !important;
            width: 15px !important;
        }

        button.accordion {
            background-color: #fff;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active,
        button.accordion:hover {
            background-color: #ddd;
        }

        button.accordion:after {
            content: '+';
            font-size: 20px;
            color: red;
            float: right;
            margin-left: 5px;
        }

        button.accordion.active:after {
            content: "-";
        }

        div.panel {
            padding: 0 18px;
            background-color: #EFF3F8;
            max-height: 0;
            overflow: hidden;
            transition: 0.6s ease-in-out;
            opacity: 0;
            padding-top: 15px;
        }

        div.panel.show {
            opacity: 1;
            max-height: 500px;
        }

        /*
        button.close {
            font-size: 40px !important;
        }
    */

        .close {
            padding-bottom: 8px;
            padding-top: 12px;
        }

        /*
        .closebtn {
            margin-left: 250px !important;
            background-color: #444D58 !important;
            color: white !important;
        }
    */

        .btnspace {
            margin-bottom: 10px;
        }

        .btncolor {
            background-color: #666665 !important;
            color: white !important;
            border-right: 2px solid white !important;
        }

        .unit-tag img {
            border-radius: 15px !important;
            padding-right: 5px;
        }

        #loadnwait {
            display: none;
            margin: 67px 0 0 476px;
            position: absolute;
            font-size: 27px;
        }

        #loadnwaits {
            display: none;
            margin: -26px 0 0 106px;
            position: absolute;
            font-size: 27px;
        }

        .noTagFound {
            display: none;
        }

        #manualAddID {
            display: none;
        }

        #searchmanually {
            display: none;
        }

        #HashManualId {
            margin: -56px 0 3px 359px;
        }

        /*   On off Button style */

        .onoffswitch1 {
            position: relative;
            width: 90px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .onoffswitch1-checkbox {
            display: none;
        }

        .onoffswitch1-label {
            display: block;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid #999999;
            border-radius: 30px;
        }

        .onoffswitch1-inner {
            display: block;
            width: 200%;
            margin-left: -100%;
            -moz-transition: margin 0.3s ease-in 0s;
            -webkit-transition: margin 0.3s ease-in 0s;
            -o-transition: margin 0.3s ease-in 0s;
            transition: margin 0.3s ease-in 0s;
        }

        .onoffswitch1-inner:before, .onoffswitch1-inner:after {
            display: block;
            float: left;
            width: 50%;
            height: 30px;
            padding: 0;
            line-height: 30px;
            font-size: 14px;
            color: white;
            font-family: Trebuchet, Arial, sans-serif;
            font-weight: bold;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: 30px;
            box-shadow: 0px 15px 0px rgba(0, 0, 0, 0.08) inset;
        }

        .onoffswitch1-inner:before {
            content: "ON";
            padding-left: 10px;
            background-color: #444D58;
            color: #FFFFFF;
            border-radius: 30px 0 0 30px;

        }

        .onoffswitch1-inner:after {
            content: "OFF ";
            padding-right: 10px;
            background-color: white;
            color: #191818;
            text-align: right;
            border-radius: 0 30px 30px 0;

        }

        .onoffswitch1-switch {
            display: block;
            width: 33px;
            margin: 0px;
            height: 33px;
            background: #FFFFFF;
            border: 2px solid #999999;
            border-radius: 30px;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 56px;
            -moz-transition: all 0.3s ease-in 0s;
            -webkit-transition: all 0.3s ease-in 0s;
            -o-transition: all 0.3s ease-in 0s;
            transition: all 0.3s ease-in 0s;

            box-shadow: 0 1px 1px white inset;
        }

        .onoffswitch1-checkbox:checked + .onoffswitch1-label .onoffswitch1-inner {
            margin-left: 0;
        }

        .onoffswitch1-checkbox:checked + .onoffswitch1-label .onoffswitch1-switch {
            right: 0px;
        }
		.selectedUser{
			margin:10px 0 0 -14px
		}
		
		#map {
            height: 100%;
        }
		#selectGender{
			margin:18px 0 0 -92px
		}

    </style>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>
@endsection

@section('active_profileManagement','active')
@section('content')


    @if($data["like"]==1)
        <?php
        $checklike = "checked";
        $checklikeclass = 1;
        ?>
    @endif

    @if($data["like"]==0)
        <?php
        $checklike = "";
        $checklikeclass = 0;
        ?>
    @endif

    @if($data["comment"]==1)
        <?php
        $checkcomment = "checked";
        $checkcommentclass = 1;
        ?>
    @endif

    @if($data["comment"]==0)
        <?php
        $checkcomment = "";
        $checkcommentclass = 0;
        ?>
    @endif

    @if($data["follow"]==1)
        <?php
        $checkfollow = "checked";
        $checkfollowclass = 1;
        ?>
    @endif

    @if($data["follow"]==0)
        <?php
        $checkfollow = "";
        $checkfollowclass = 0;
        ?>
    @endif

    @if($data["unfollow"]==1)
        <?php
        $checkunfollow = "checked";
        $checkunfollowclass = 1;
        ?>
    @endif

    @if($data["unfollow"]==0)
        <?php
        $checkunfollow = "";
        $checkunfollowclass = 0;
        ?>
    @endif


    <!-- END HEADER -->
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-container">


        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">

            <div class="container">
                <div class="col-sm-12">
                    <h4>ACTIVITY SETTINGS <i class="fa fa-cog" aria-hidden="true" style="font-size:25px;"></i></h4>
                </div>
            </div>

            <!--motivatinal images-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <label for="myonoffswitch">
                            <h4>Select what you want to do</h4>
                        </label>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <ul style="margin-top:0px;margin-bottom:10px;">

                                <?php
                                if(isset($data["profile_pic_url"]))
                                {
                                    $profilePic = $data["profile_pic_url"];
                                }
                                ?>

                                <li style="display:inline;"><img alt="no preview available" src="{{$profilePic}}"
                                                                 style=" border-radius: 15px ;width:200px;height:200px;">
                                </li>
                                <li id="{{$data["for_instagram_user_id"]}}" class="selectedUser" style="list-style:none;">
                                    <a  href="https://www.instagram.com/{{$data["username"]}}/"><b style="color: #545456;font-size:17px;margin-left:50px;">{{$data["username"]}}</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-5 divhover">
                            <div class="onoffswitch1 pull-right">
                                <input type="checkbox" name="onoffswitch1" class="onoffswitch1-checkbox"
                                       id="myonoffswitch1" {{$checklike}} dbvalue="{{$checklikeclass}}">
                                <label class="onoffswitch1-label" for="myonoffswitch1">
        <span class="onoffswitch1-inner">
        </span>
                                    <span class="onoffswitch1-switch">
        <i class="fa fa-heart" aria-hidden="true" style="font-size:25px;margin-top:10px;color:#46A597"></i>
        </span>
                                </label>
                            </div>
                            <label class="pull-left">Likes</label>
                        </div>
                        <div class="col-sm-5">
                            <div class="onoffswitch1 pull-right">
                                <input type="checkbox" name="onoffswitch1" class="onoffswitch1-checkbox"
                                       id="myonoffswitch2" {{$checkcomment}} dbvalue="{{$checkcommentclass}}">
                                <label class="onoffswitch1-label" for="myonoffswitch2">
                                    <span class="onoffswitch1-inner"></span>
                                    <span class="onoffswitch1-switch">
            <i class="fa fa-comment" aria-hidden="true"
               style="font-size:25px;margin-top:7px;margin-left:3px;color:#46A597"></i>

        </span>
                                </label>
                            </div>
                            <label class="pull-left">Comments</label>
                        </div>
                        <div class="col-sm-5">
                            <div class="onoffswitch1 pull-right">
                                <input type="checkbox" name="onoffswitch1" class="onoffswitch1-checkbox"
                                       id="myonoffswitch3" {{$checkfollow}} dbvalue="{{$checkfollowclass}}">
                                <label class="onoffswitch1-label" for="myonoffswitch3">
                                    <span class="onoffswitch1-inner"></span>
                                    <span class="onoffswitch1-switch">
            <i class="fa fa-user" aria-hidden="true"
               style="font-size:25px;margin-top:7px;margin-left:4px;color:#46A597"></i>

        </span>
                                </label>
                            </div>
                            <label class="pull-left">Follows</label>
                        </div>
                        <div class="col-sm-5">
                            <div class="onoffswitch1 pull-right">
                                <input type="checkbox" name="onoffswitch1" class="onoffswitch1-checkbox"
                                       id="myonoffswitch4" {{$checkunfollow}} dbvalue="{{$checkunfollowclass}}">
                                <label class="onoffswitch1-label" for="myonoffswitch4">
                                    <span class="onoffswitch1-inner"></span>
                                    <span class="onoffswitch1-switch">
            <i class="fa fa-times" aria-hidden="true"
               style="font-size:25px;margin-top:7px;margin-left:4px;color:#46A597"></i>

        </span>
                                </label>
                            </div>
                            <label class="pull-left">UnFollows</label>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button class="accordion" id="hashTagHead" count={{count($data["tags"])}}><img src="/assets/user/user-panel/img/add-label-button.png"
                                class="img-responsive;">&nbsp;&nbsp;HASH TAGS
                    </button>
                    <div class="panel" id="hashTagHeadContent">
                        <div class="col-md-8">
                            <div class="col-sm-2" style="width:200px;color:black;">
                                <a href="#">Tags &nbsp;<a href="#" data-toggle="tooltip" data-placement="bottom"
                                                          title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img
                                                src="/assets/user/user-panel/img/question-mark.png"></a></a>
                            </div>
                            <div class="col-lg-12">
                                <div id="mainHashTag">
                                    @if(count($data["tags"])>0)
                                        @for($count=0;$count<count($data["tags"]);$count++)
                                            <div class="btn-group btnspace">
                                                <button value='{{$data["tags"][$count]}}' type="button"
                                                        class="btn btncolor currrentTagClassRemove currrentTagClass{{$count}}"
                                                        id="currentTag{{$count}}" data-toggle="modal"
                                                        data-target="#">{{$data["tags"][$count]}}</button>
                                                <button type="button" id="removeCurrentTag{{$count}}" abc="{{$count}}"
                                                        class="btn btncolor dropdown-toggle removeCurrentTag removeCurrentTagClass"
                                                        value={{$data["tags"][$count]}} data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><span
                                                            class="close"></span></button>
                                            </div>

                                        @endfor
                                    @endif

                                </div>
                                <div class="btn-group btnspace">
                                    <button type="button" class="btn btn-danger hashTagModalButton" data-toggle="modal"
                                            data-target="#myModal">ADD
                                    </button>
                                    <button type="button" class="btn btncolor dropdown-toggle" data-toggle="dropdown"
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
                   <button class="accordion" id="addLocModalData" count="{{count($data["locations"])}}"><img
                                src="/assets/user/user-panel/img/placeholder-for-map.png"
                                class="img-responsive;">&nbsp;&nbsp; GEOGRAPHICAL LOCATION
                    </button>

                    <div class="panel">
                        <div class="col-md-8">
                            <div class="col-sm-3">
                                <a href="#">Locations &nbsp;<a href="#" data-toggle="tooltip"
                                                               title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img
                                                src="/assets/user/user-panel/img/question-mark.png"></a></a>
                            </div>
                            <div class="col-lg-12">
                                <div id="LocMainTag">

                                    @if(count($data["locations"])>0)

                                        @for($count=0;$count<count($data["locations"]);$count++)


                                            <div class="btn-group btnspace">
                                                <button type="button"
                                                        id="{{$data["locations"][$count]["id"]}}"
                                                        name="{{$data["locations"][$count]["name"]}}"
                                                        latitude="{{$data["locations"][$count]["latitude"]}}"
                                                        longitude="{{$data["locations"][$count]["longitude"]}}"
                                                        lastUpdate="{{$data["locations"][$count]["lastUpdate"]}}"
                                                        count="{{$count}}"
                                                        class="btn btncolor currrentlocClassRemove locTagModalData{{$count}}"
                                                        id="currentTag4{{$count}}" data-toggle="modal"
                                                        data-target="#">{{$data["locations"][$count]["name"]}}</button>
                                                <button type="button" id="removeCurrentTag4" {{$count}} abc="{{$count}}"
                                                        class="btn btncolor dropdown-toggle removeCurrentlocationClass removeCurrentTag4"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><span class="close"></span></button>
                                            </div>

                                        @endfor
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="btn-group btnspace">
                                    <button type="button" class="btn btn-danger locationBasedAddButton" data-toggle="modal"
                                            data-target="#myModal1" onclick="loc()">ADD
                                    </button>
                                    <button type="button" class="btn btncolor dropdown-toggle" data-toggle="dropdown"
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
					
					
                    <button class="accordion" id="addUserModalData" count="{{count($data["usernames"])}}"><img
                                src="/assets/user/user-panel/img/placeholder-for-map.png"
                                class="img-responsive;">&nbsp;&nbsp; USER NAMES
                    </button>
                    <div class="panel">
                        <div class="col-md-8">
                            <div class="col-sm-3">
                                <a href="#">User Name &nbsp;<a href="#" data-toggle="tooltip"
                                                               title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img
                                                src="/assets/user/user-panel/img/question-mark.png"></a></a>
                            </div>
                            <div class="col-lg-12">
                                <div id="unMainTag">

                                    @if(count($data["usernames"])>0)

                                        @for($count=0;$count<count($data["usernames"]);$count++)


                                            <div class="btn-group btnspace">
                                                <button type="button"
                                                        username="{{$data["usernames"][$count]["username"]}}"
                                                        full_name="{{$data["usernames"][$count]["full_name"]}}"
                                                        profile_picture="{{$data["usernames"][$count]["profile_picture"]}}"
														lastUpdate="{{$data["usernames"][$count]["lastUpdate"]}}"
                                                        pk="{{$data["usernames"][$count]["id"]}}" count="{{$count}}"
                                                        class="btn btncolor currrentusernameClassRemove usernameTagModalData{{$count}}"
                                                        id="currentTag2{{$count}}" data-toggle="modal"
                                                        data-target="#">{{$data["usernames"][$count]["username"]}}</button>
                                                <button type="button" id="removeCurrentTag2" {{$count}} abc="{{$count}}"
                                                        class="btn btncolor dropdown-toggle removeCurrentusernmaeClass removeCurrentTag2"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><span class="close"></span></button>
                                            </div>

                                        @endfor
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="btn-group btnspace">
                                    <button type="button" class="btn btn-danger userNameAddButton" data-toggle="modal"
                                            data-target="#myModal2">ADD
                                    </button>
                                    <button type="button" class="btn btncolor dropdown-toggle" data-toggle="dropdown"
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

                    <button class="accordion"><img src="/assets/user/user-panel/img/funnel.png" class="img-responsive;">&nbsp;&nbsp;
                        FILTERS
                    </button>
                    <div id="foo" class="panel genderSelected"  value="{{$data["gender"]}}">
                        <div class="col-md-8">
                            <div class="col-sm-3">
                                <p href="#">Gender</p>
                            </div>
                            <div class="col-sm-9 dropdown">
                                <select id="selectGender" name="carlist" form="carform">
                                    <option value="1">MALE</option>
                                    <option value="2">FEMALE</option>
                                    <option value="3">BOTH</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button class="accordion" id="commentsHead" count="{{count($data["comments"])}}" ><img
                                src="/assets/user/user-panel/img/circular-black-speech-bubble-with-text-lines.png"
                                class="img-responsive;">&nbsp;&nbsp;COMMENTS
                    </button>
                    <div class="panel">
                        <div class="col-md-8">
                            <div class="col-sm-2" style="width:200px;color:black;">
                                <a href="#">comments &nbsp;<a href="#" data-toggle="tooltip" data-placement="bottom"
                                                              title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img
                                                src="/assets/user/user-panel/img/question-mark.png"></a></a>
                            </div>
                            <div class="col-lg-12">

                                <div id="commentMainTag">

                                    @if(count($data["comments"])>0)

                                        @for($count=0;$count<count($data["comments"]);$count++)


                                            <div class="btn-group btnspace"><button type="button" class="btn btncolor commentsModalDataCross commentsModalData{{$count}}" id="currentTagComment{{$count}}" data-toggle="modal" data-target="#" value="{{$data["comments"][$count]}}">{{$data["comments"][$count]}}</button><button  type="button" id="removeCurrentTagComment{{$count}}" abc="{{$count}}" class="btn btncolor dropdown-toggle removeCurrentTag3 commentsModalDataRemoveCross commentsModalDataRemove{{$count}}" value="{{$data["comments"][$count]}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>

                                        @endfor
                                    @endif

                                </div>


                                <div class="btn-group btnspace">
                                    <button type="button" class="btn btncolor" data-toggle="modal"
                                            data-target="#commentMoadal">ADD
                                    </button>
                                    <button type="button" class="btn btncolor dropdown-toggle" data-toggle="dropdown"
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
                    {{--<button class="btn btn-info" id="saveAllSettings"> SAVE</button>--}}


                </div>
            </div>
        </div>
    </div>








    <!-- -------------Modals -------------------->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="background-color:#EFF3F8;">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Add tags</h4>
                    <i class="fa fa-spinner" id="loadnwait" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <div class="container" style="margin-top: 5%;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Form -->
                            <form role="form">

                                <!-- Search Field -->
                                <div class="row">
                                    <input type="text" id="area" class="form-control"/>
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input class="form-control" type="text" id="tagId" name="search" placeholder="Tags" required/>

                                            <span class="input-group-btn">
                            <button class="btn btn-success" id="HashId" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"><span
                                            style="margin-left:10px;">Search</span></span></button>
                                            </span>

                                        </div>
                                        <div class="input-group" id="searchmanually">
                                            <input class="form-control" type="text" id="tagManualId" name="search" placeholder="add Tag Manually" required/>

                                            <span class="input-group-btn">
                            <button class="btn btn-success" id="HashManualId" type="button"><span
                                        class="glyphicon glyphicon-search" aria-hidden="true"><span
                                            style="margin-left:10px;">Add</span></span></button>
                                            </span>

                                        </div>
                                        <p3 class="noTagFound"> no result found...please enter tags manually below</p3>
                                    </div>

                                </div>

                            </form>
                            <!-- End of Search Form -->

                        </div>
                        <div id="hashTagId">


                        </div>
                    </div>

                    <div class="col-md-offset-5">

                        <a href="#" id="taglist" style="text-align:center;">Enter your list of Tags</a>
                        <a href="#" id="searchtags" style="text-align:center;">Search Tags</a>
                        <br>
                        <br>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                        <button type="button" class="btn btn-info" id="AddHash">Add</button>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!------------------comment modal---------------------->
    <!-- -------------Modals -------------------->
    <div class="modal fade" id="commentMoadal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="background-color:#EFF3F8;">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Add comments</h4>


                </div>
                <div class="modal-body">
                    <div class="container" style="margin-top: 5%;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Form -->
                            <form role="form">

                                <!-- Search Field -->
                                <div class="row">


                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input class="form-control" type="text" id="commentTextId" name="search"
                                                   placeholder="Tag" required/>

                                            <span class="input-group-btn">
                            <button type="button" class="btn btncolor " id="addComment">ADD</button>
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </form>
                            <!-- End of Search Form -->

                        </div>
                        <div id="commentModalId">


                        </div>
                    </div>

                    <div class="col-md-offset-5">

                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                        <button type="button" class="btn btncolor " id="add">ADD</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!---------------- Modals End-----------  - -->

    <!--  ADD LOCATION MODAL----->

    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">Add Location</h4>
                </div>
                <div class="modal-body">
                    <div class="container" style="margin-top: 5%;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Form -->
                            <form role="form">

                                <!-- Search Field -->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input class="form-control" id="locTextValue" type="text" name="search"
                                                   placeholder="Location"
                                                   required/>

                                            <span class="input-group-btn">
                            <button class="btn btn-success" id="findLoc" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"><span
                                            style="margin-left:10px;">Search</span></span></button></span></span>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- End of Search Form -->

                        </div>
                    </div>
                    <div id="getCurrentLatLongDemo">

                    </div>
                    <br>
                    <div id="getCurrentLatLongTag">
                        </div>
                </div>
                <div class="col-md-offset-5">
                    <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-info" id="addLocationTagModal" data-dismiss="modal">Add</button>

                </div>
            </div>

        </div>
    </div>

    <!--    ADD LOCATION MODAL END-->

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
                    <div class="container" style="margin-top: 5%;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Form -->
                            <form role="form">

                                <!-- Search Field -->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input id="userNameText" class="form-control" type="text" name="search"
                                                   placeholder="User Name" required/>

                                            <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="userNameId"><span
                                        class="glyphicon glyphicon-search" aria-hidden="true"><span
                                            style="margin-left:10px;">Search</span></span></button>
                                                <i class="fa fa-spinner" id="loadnwaits" aria-hidden="true"></i>

                                            </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- End of Search Form -->

                        </div>
                        <div id="userNameTag">

                        </div>
                    </div>
                    <div class="col-md-offset-5">
                        <button type="button" class="btn btn-info" data-dismiss="modal" id="addUserName">Add</button>
                        <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close</button>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection


@section('pagejavascripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <!--<script src="assets/js/moment.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
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

    <!--Tootip Script -->
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        $(document).ready(function (e) {

            var count = 1;

            $("#HashId").click(function () {


                $(".hashtag1").remove();
                $("#loadnwait").css('display', 'block');

                var tagId = $("#tagId").val();

                $.ajax({
                    url: '/user/hashTagFinder',
                    type: 'post',


                    data: {
                        'tag': tagId

                    },
                    success: function (response) {


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

            })
        })


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





    <script>
        $(document).ready(function () {
            var count = 1;
            $("#userNameId").click(function () {

                $(".hashtag2").remove();

                $("#loadnwaits").css('display', 'block');
                var userNameText = $("#userNameText").val();

                $.ajax({
                    url: '/user/userNameFinder',
                    type: 'post',


                    data: {
                        'searchValue': userNameText

                    },
                    success: function (response) {


                        if (response == 201) {
                            $("#loadnwaits").css('display', 'none');
                            alert("no result found");
                        }
                        else if (response == 202) {
                            $("#loadnwaits").css('display', 'none');
                            alert("no user found");

                        }
                        else {

                            $("#loadnwaits").css('display', 'none');
                            if (response.length > 0) {
                                for (var i = 0; i < response.length; i++) {

                                    $("#userNameTag").append('<span id="unTag' + i + '" class="unit-tag hashtag2" value="' + response[i].username + '"><img src="' + response[i].profile_pic_url + '" height="41px" width="41px" ><span>' + response[i].username + '</span><span class="unit-btn-x"><input type="checkbox" class="hashtagcheck2"  username="' + response[i].username + '" full_name="' + response[i].full_name + '" profile_picture="' + response[i].profile_pic_url + '" pk="' + response[i].pk + '" count="' + i + '"></span></span>');
                                    count++;

                                }

                            }
                            else {
                                alert("something went wrong");
                            }

                        }


                    }
                });

            })
        })

    </script>



    <script>
        $(document).ready(function () {
            var selectedUser = $(".selectedUser").attr("id");
            var tag = [];
            var countcomment = 0;
            var arrayComment = [];
            var user = [];
            var location = [];
            var like = $("#myonoffswitch1").attr("dbvalue");
            var comment = $("#myonoffswitch2").attr("dbvalue");
            var follow = $("#myonoffswitch3").attr("dbvalue");
            var unfollow = $("#myonoffswitch4").attr("dbvalue");
            var gender = $(".genderSelected").attr("value");
            var hashTagHead = $("#hashTagHead").attr("count");
            var userNameHead = $("#addUserModalData").attr("count");
			var locNameHead = $("#addLocModalData").attr("count");
            var commentsHead = $("#commentsHead").attr("count");



            function powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser) {

                console.log("inside powers for gender",gender);


                $.ajax({
                    url: '/user/promotionSettings',
                    type: 'post',


                    data: {
                        'user': user,
                        'tag': tag,
                        'arrayComment': arrayComment,
                        'location': location,
                        'like': like,
                        'comment': comment,
                        'follow': follow,
                        'unfollow': unfollow,
                        'gender': gender,
                        'instaUserId': selectedUser,


                    },
                    success: function (response) {
                        toastr.options = {
                            timeOut : 1000,
                            extendedTimeOut : 100,
                            tapToDismiss : true,
                            debug : false,
                            fadeOut: 10,
                            positionClass : "toast-top-center",
							limit:1
                        };

                        if (response == 401) {
                            toastr.warning("plz add any 1 field");
                        }
                        if(response ==200)
                        {
//                            alert("data updated successfully")
                            toastr.success('data updated successfully');
                        }
                        if(response == 404)
                        {
                            toastr.error("something went wrong")
                        }

                    }
                });

            }

            $("#selectGender").change(function(){
                gender = $("#selectGender").val();
                console.log("here comes gender",gender);
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);
            })

            $("#myonoffswitch1").click(function () {
                if ($("#myonoffswitch1").is(":checked")) {

                    like = 1;

                }
                else {
                    like = 0;
                }
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);

            })
            $("#myonoffswitch2").click(function () {
                if ($("#myonoffswitch2").is(":checked")) {

                    comment = 1;

                }
                else {
                    comment = 0;
                }
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);

            })
            $("#myonoffswitch3").click(function () {
                if ($("#myonoffswitch3").is(":checked")) {

                    follow = 1;

                }
                else {
                    follow = 0;
                }
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);
            })
            $("#myonoffswitch4").click(function () {

                if ($("#myonoffswitch4").is(":checked")) {

                    unfollow = 1;

                }
                else {
                    unfollow = 0;
                }
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);
            })

            if (hashTagHead > 0) {
                for (var i = 0; i < hashTagHead; i++) {

                    var val = $(".currrentTagClass" + i).attr("value");
                    tag.push(val);
                    $("#mainHashTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor hashTagModalDataRemove" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + tag[i] + '</button><button  type="button" id="removeCurrentTag' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag removeCurrentHashTagData" value="' + tag[i] + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }
                $(".currrentTagClassRemove").remove();
                $(".removeCurrentTagClass").remove();

            }

            $(document).on('click', '.hashtagcheck1', function (e) {

                var value = $(this).attr("value");
                if ($(this).is(":checked")) {

                    tag.push(value);
					tag = tag.filter(function(item, pos) {
                        return tag.indexOf(item) == pos;
                    })

                }
                else {
                    tag = jQuery.grep(tag, function (e) {
                        return e != value;

                    });
                }


            });
            $("#AddHash").click(function () {
                $(".currrentTagClassRemove").remove();
                $(".removeCurrentTagClass").remove();
                $(".hashTagModalDataRemove").remove();
                $(".removeCurrentHashTagData").remove();

                $("#myModal").modal("hide");

                var counttagnow = tag.length;

                $("#mainHashTag").empty();
                for (var i = 0; i < counttagnow; i++) {

                    $("#mainHashTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + tag[i] + '</button><button  type="button" id="removeCurrentTag' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag" value="' + tag[i] + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }
				
				if(hashTagHead == tag.length){
                    toastr.warning('plz select 1 field atleast');

                    return true;

                }

                hashTagHead =tag.length;
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);
//

            })

            $(document).on('click', '.removeCurrentTag', function (e) {
                var value = $(this).attr("abc");
                var addvalue = $(this).attr("value");
                $("#currentTag" + value).remove();
                $("#removeCurrentTag" + value).remove();

                tag = jQuery.grep(tag, function (e) {
                    return e != addvalue
                })
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);

            })


            if (userNameHead > 0) {
                var username;
                var full_name;
                var profile_picture;
                var id;
				var lastUpdate;
                var count;

                for (var i = 0; i < userNameHead; i++) {

                    username = $(".usernameTagModalData" + i).attr("username");
                    full_name = $(".usernameTagModalData" + i).attr("full_name");
                    profile_picture = $(".usernameTagModalData" + i).attr("profile_picture");
                    id = $(".usernameTagModalData" + i).attr("pk");
					lastUpdate = $(".usernameTagModalData" + i).attr("lastUpdate");
                    count = $(".usernameTagModalData" + i).attr("count");
                    var val = $(".currrentTagClass" + i).attr("value");


                    user.push({'username':username, 'full_name':full_name, 'profile_picture':profile_picture, 'id':id,'lastUpdate': lastUpdate,});
                    $("#unMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor addedFromModaluser" id="currentTag2' + i + '" data-toggle="modal" data-target="#">' + user[i].username + '</button><button  type="button" id="removeCurrentTag2' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }

                $(".currrentusernameClassRemove").remove();
                $(".removeCurrentusernmaeClass").remove();

            }


            $(document).on('click', '.hashtagcheck2', function (e) {


                var username = $(this).attr("username");
                var full_name = $(this).attr("full_name");
                var profile_picture = $(this).attr("profile_picture");
                var id = $(this).attr("pk");
		//		var lastUpdate = $(this).attr("lastUpdate");
                var count = $(this).attr("count");
                if ($(this).is(":checked")) {
                    user.push({'username':username, 'full_name':full_name, 'profile_picture':profile_picture, 'id':id,'lastUpdate': Math.floor(Date.now() / 1000)});
					
					user = _.uniq(user, function(item, key, username){
                        console.log("uniq")
                        return item.username;
                    });
                }
                else {


                    user.splice(count, 1);

//                    user = jQuery.grep(user, function (e) {
//                        return e != value
//
//                    });
                }


            });
            $("#addUserName").click(function () {
				user = user.filter(function(e){return e});
                $(".currrentusernameClassRemove").remove();
                $(".removeCurrentusernmaeClass").remove();
                $(".removeCurrentTag2").remove();
                $(".addedFromModaluser").remove();

                $("#unMainTag").empty();
                var countuser = user.length;

                for (var i = 0; i < countuser; i++) {

                    $("#unMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTag2' + i + '" data-toggle="modal" data-target="#">' + user[i].username + '</button><button  type="button" id="removeCurrentTag2' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                }
 if(userNameHead == user.length){
                    toastr.warning('plz select 1 field atleast');

                    return true;

                }

                userNameHead =user.length;

//                console.log(user);
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);


            })

            var cnt = 0;
            $(document).on('click', '.removeCurrentTag2', function (e) {
                var value = $(this).attr("abc");
                $("#currentTag2" + value).remove();
                $("#removeCurrentTag2" + value).remove();
//                if (cnt != 0) {
//                    value = value - 1;
//                }

                delete user[value];
				
                

                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);
                cnt++;

            })
			
			if (locNameHead > 0) {
                var id;
                var name;
                var latitude;
                var longitude;
                var lastUpdate;
                var count;

                for (var i = 0; i < locNameHead; i++) {

                    id = $(".locTagModalData" + i).attr("id");
                    name = $(".locTagModalData" + i).attr("name");
                    latitude = $(".locTagModalData" + i).attr("latitude");
                    longitude = $(".locTagModalData" + i).attr("longitude");
                    lastUpdate = $(".locTagModalData" + i).attr("lastUpdate");
                    count = $(".locTagModalData" + i).attr("count");
//                    var val = $(".currrentTagClass" + i).attr("value");


                    location.push({
                        'id': id,
                        'name': name,
                        'latitude': latitude,
                        'longitude': longitude,
                        'lastUpdate': lastUpdate,

                    });
                    console.log(location);
                    $("#LocMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor addedFromModalLoc" id="currentTag4' + i + '" data-toggle="modal" data-target="#">' + location[i].name + '</button><button  type="button" id="removeCurrentTag4' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }

                $(".currrentlocClassRemove").remove();
                $(".removeCurrentlocationClass").remove();

            }


            $(document).on('click', '.hashtagcheck4', function (e) {


                var id = $(this).attr("id");
                var name = $(this).attr("name");
                var latitude = $(this).attr("latitude");
                var longitude = $(this).attr("longitude");
          //      var lastUpdate = $(this).attr("lastUpdate");
                var count = $(this).attr("count");
                if ($(this).is(":checked")) {
                    location.push({
                        'id': id,
                        'name': name,
                        'latitude': latitude,
                        'longitude': longitude,
                        'lastUpdate': Math.floor(Date.now() / 1000)
                    });
					location = _.uniq(location, function(item, key, id){
                        console.log("uniq")
                        return item.id;
                    });
                    console.log(location);
                }
                else {


                    location.splice(count, 1);

//                    user = jQuery.grep(user, function (e) {
//                        return e != value
//
//                    });
                }


            });
            $("#addLocationTagModal").click(function () {
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

                    $("#LocMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTag4' + i + '" data-toggle="modal" data-target="#">' + location[i].name + '</button><button  type="button" id="removeCurrentTag4' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                }
              if(locNameHead == location.length){
                    toastr.warning('plz select 1 field atleast');

                    return true;

                }

                locNameHead =location.length;

                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);


            })

            var cnt = 0;
            $(document).on('click', '.removeCurrentTag4', function (e) {
                var value = $(this).attr("abc");
                $("#currentTag4" + value).remove();
                $("#removeCurrentTag4" + value).remove();
//                if (cnt != 0) {
//                    value = value - 1;
//                }

                delete location[value];

//                user = user.filter(function(e){return e});
                console.log(location);

                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
//                cnt++;


            })






            //location code ends here
			

            if(commentsHead>0)
            {
                for(var i=0;i<commentsHead;i++)
                {
                    var val = $(".commentsModalData"+i).attr("value");
                    arrayComment.push(val);
                    $("#commentMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor crossComments" id="currentTagComment' + i + '" data-toggle="modal" data-target="#">' + val + '</button><button  type="button" id="removeCurrentTagComment' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag3 crossCommentsRemove" value="' + val + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');


                }
                $(".commentsModalDataCross").remove();
                $(".commentsModalDataRemoveCross").remove();


            }


            $("#addComment").click(function () {



                var value = $("#commentTextId").val();
                if(value.length===0)
                {

                    return true;
                }

                $("#commentMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTagComment' + commentsHead + '" data-toggle="modal" data-target="#">' + value + '</button><button  type="button" id="removeCurrentTagComment' + commentsHead + '" abc="' + commentsHead + '" class="btn btncolor dropdown-toggle removeCurrentTag3" value="' + value + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                commentsHead++;
                arrayComment.push(value);
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);

                $("#commentTextId").val('');


            })

            $(document).on('click', '.removeCurrentTag3', function (e) {
                var c = $(this).attr("abc");
                var addvalue = $(this).attr("value");
                $("#currentTagComment" + c).remove();
                $("#removeCurrentTagComment" + c).remove();

                arrayComment = jQuery.grep(arrayComment, function (e) {
                    return e != addvalue
                })
                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);
            })

//            $("#saveAllSettings").click(function () {


//                powers(user,tag,arrayComment,location,like,comment,follow,unfollow,gender,selectedUser);



//                $.ajax({
//                    url: '/user/promotionSettings',
//                    type: 'post',
//
//
//                    data: {
//                        'user': user,
//                        'tag': tag,
//                        'arrayComment': arrayComment,
//                        'location': location,
//                        'like': like,
//                        'comment': comment,
//                        'follow': follow,
//                        'unfollow': unfollow,
//                        'gender': gender,
//                        'instaUserId': selectedUser,
//
//
//                    },
//                    success: function (response) {
//                        if (response == 401) {
//                            alert("plz add any 1 field");
//                        }
//                        if(response ==200)
//                        {
//                            alert("data added successfully")
//                        }
//                        if(response == 404)
//                        {
//                            alert("something went wrong")
//                        }
//
//                    }
//                });

//            })


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
	
	<script>

        $(document).ready(function () {
            var countryname;
            $(document).on("click", "#findLoc", function () {
                $("#getCurrentLatLongTag").empty();
//                $("#getCurrentLatLongDemo").empty();

                var searchLocation = $("#locTextValue").val();
                var geocoder = geocoder = new google.maps.Geocoder();
                var address = searchLocation;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (typeof(results[0]) != "undefined" && results[0] != null) {



                        var place = results[0].formatted_address;

                        if (~place.indexOf(",")) {

                            var country = place.split(",");

                        }
                        else {
                            alert("please specify city name")
                            return true;
                        }
                        var country = country[country.length - 1];
                        var full_address = searchLocation + "," + country;
                        full_address = full_address.replace(' ', '');

                        $(document).ready(function () {
                            $.ajax({
                                url: '/user/findLocation',
                                type: 'post',

                                data: {
                                    searchLocation: full_address
                                },
                                success: function (response) {

                                    if(response == "")
                                    {
                                        alert("no key word found");
                                    }

                                    else if (response == 201) {
                                        alert("no data found");

                                    }
                                    else if (response == 202) {
                                        alert("something went wrong")
                                    }
                                    else {
                                        var array = [];
                                        var i=0;
                                        $("#getCurrentLatLongDemo").empty();
                                        $("#getCurrentLatLongDemo").append('<div><div id="map" style="width: 500px; height: 400px;margin: 0 0 0 33px;"></div></div>');


                                        $.each(response, function (item, value) {
                                        $("#getCurrentLatLongTag").append('<span id="unTag' + i + '" class="unit-tag hashtag4" value="' + value.name + '"><span>' + value.name + '</span><span class="unit-btn-x"><input type="checkbox" class="hashtagcheck4"  id="' + value.pk + '" name="' + value.name + '" latitude="' + value.lat + '" longitude="' + value.lng + '" count="' + i + '"></span></span>');
                                            i++;
                                        })

                                        $.each(response, function (item, value) {
                                           array.push([value.name,value.lat,value.lng,item])
                                        })


                                        var locations = array;

                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            zoom: 10,
                                            // center: new google.maps.LatLng(-33.92, 151.25),
                                            center: new google.maps.LatLng(response[0].lat,response[0].lng),
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
                        })


//
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });


            })

        })

    </script>







@endsection

