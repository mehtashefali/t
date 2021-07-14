</br></br></br>

<script type="text/javascript">
var myApp= angular.module("AngularApp",[]);
myApp.controller("HelloController", function($scope, $http,$sce){
	
$scope.autosearch = function(event)
{
	
var textcontent1 = $("#sertex").val();
var info = 'sid=' + textcontent1+'&page=1';
if(info=='')
{
}
else
{

document.getElementById("show").innerHTML="";
$("#show").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "FriendList.php",
data: info,
cache: true,
success: function(html){
	
$("#show").fadeIn(400).html('');
$("#show").append(html);
}  
});
}

};

$scope.sendmessfun = function(event)
{
var info = $('#messsend').serialize();
if(info=='')
{
}
else
{
//alert(info);
document.getElementById("messalert").innerHTML="";
$("#messalert").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Messagesend.php",
data: info,
cache: true,
success: function(html){
	
$("#messalert").fadeIn(400).html('');
$("#messalert").append(html);
}  
});
}
};


});	
</script>

<div class="col-sm-12" ng-app="AngularApp" ng-controller="HelloController">
</br>
<div class="row">
        
<div class="col-lg-4" id="FriendList" style="border-right: 1px solid var(--light);height:720px;overflow-y: scroll;">
<input type="text" placeholder="Search key and press enter" class="form-control" id="sertex" data-ng-keyup="autosearch($event)"/><br>
<div id="show"></div>
</div>		

 <div class="col-lg-7" id="ChatList" style="border: 1px solid var(--light);">		
<div class="right">

<?PHP

if(isset($_GET['uid']))
{
$id=$_GET['uid'];
$filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Student', $query);
$cursor1 =$manager->executeQuery('tpp.Student', $query);
$arr = $cursor1->toArray();
if(count($arr)>=1)
{
foreach ($cursor as $document) 
{
$row = (array)$document;
?>
            <br><div class="top"><a href="Main.php?page=1&uid=<?php echo $row['_id']; ?>"><img src="Admin/upload/<?php echo $row['photo']; ?>" style="border-radius: 50px;width:50px;height:50px" alt="" />
                    <span class="name"><?php echo $row['FirstName'].' '.$row['LastName']; ?></span>
                    <span class="preview"><?php echo $row['Email']; ?></span></a>
					<br><hr></div>
<?PHP
}
}
?>

			
            <div class="chat" id="all_message" data-chat="person1" style="height:500px;overflow-y: scroll;">
    
            </div>
            
           
            
            
            <div class="write">
			<form id="messsend">
			<input type="hidden" name="rid" value="<?php echo $row['_id']; ?>"/>
                <a href="javascript:;" class="write-link attach"></a>
                <br><input type="text" placeholder="Message" name="Message" class="form-control"/>
				<div id="messalert" style="width:200px;float:left;"></div>
				<input type="button" value="Send" style="width:100px;float:right;"  data-ng-click="sendmessfun($event)" class="form-control"/><br>
                <a href="javascript:;" class="write-link smiley"></a>
                <a href="javascript:;" class="write-link send"></a>
			</form>
            </div>

<script type="text/javascript">
window.setInterval(function() {
// alert('test');
readmessfun();

}, 5000);

function readmessfun()
{

var info = $('#messsend').serialize();
if(info=='')
{
}
else
{
//alert(info);
//document.getElementById("messalert").innerHTML="";
$.ajax({
type: "POST",
url: "Messagesall.php",
data: info,
cache: true,
success: function(html){
	
//$("#all_message").html('');
$("#all_message").html(html);
}  
});
}
}


</script>


        </div>
<?PHP
}
?>			
    </div>
</div>

</div>

<style>
@mixin font-bold {
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 600;
}
@mixin font {
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 400;
}
@mixin placeholder {
    &::-webkit-input-placeholder {
        @content;
    }
    &:-moz-placeholder {
        @content;
    }
    &::-moz-placeholder {
        @content;
    }
    &:-ms-input-placeholder {
        @content;
    }
}

*, *:before, *:after {
    box-sizing: border-box;
}

:root {
    --white: #fff;
    --black: #000;
    --bg: #f8f8f8;
    --grey: #999;
    --dark: #1a1a1a;
    --light: #e6e6e6;
    --wrapper: 1000px;
    --blue: #00b0ff;
}

body {
    background-color: var(--bg);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
    @include font;
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/image.jpg');
    background-size: cover;
    background-repeat: none;
}
.wrapper {
    position: relative;
    left: 50%;
    width: var(--wrapper);
    height: 800px;
    transform: translate(-50%, 0);
}
.container {
    position: relative;
    top: 50%;
    left: 50%;
    width: 80%;
    height: 75%;
    background-color: var(--white);
    transform: translate(-50%, -50%);
    .left {
        float: left;
        width: 37.6%;
        height: 100%;
        border: 1px solid var(--light);
        background-color: var(--white);
        .top {
            position: relative;
            width: 100%;
            height: 96px;
            padding: 29px;
            &:after {
                position: absolute;
                bottom: 0;
                left: 50%;
                display: block;
                width: 80%;
                height: 1px;
                content: '';
                background-color: var(--light);
                transform: translate(-50%, 0);
            }
        }
        input {
            float: left;
            width: 188px;
            height: 42px;
            padding: 0 15px;
            border: 1px solid var(--light);
            background-color: #eceff1;
            border-radius: 21px;
            @include font();
            &:focus {
                outline: none;
            }
        }
        a.search {
            display: block;
            float: left;
            width: 42px;
            height: 42px;
            margin-left: 10px;
            border: 1px solid var(--light);
            background-color: var(--blue);
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/name-type.png');
            background-repeat: no-repeat;
            background-position: top 12px left 14px;
            border-radius: 50%;
        }
        .people {
            margin-left: -1px;
            border-right: 1px solid var(--light);
            border-left: 1px solid var(--light);
            width: calc(100% + 2px);
            .person {
                position: relative;
                width: 100%;
                padding: 12px 10% 16px;
                cursor: pointer;
                background-color: var(--white);
                &:after {
                    position: absolute;
                    bottom: 0;
                    left: 50%;
                    display: block;
                    width: 80%;
                    height: 1px;
                    content: '';
                    background-color: var(--light);
                    transform: translate(-50%, 0);
                }
                img {
                    float: left;
                    width: 40px;
                    height: 40px;
                    margin-right: 12px;
                    border-radius: 50%;
																				object-fit: cover;
                }
                .name {
                    font-size: 14px;
                    line-height: 22px;
                    color: var(--dark);
                    @include font-bold;
                }
                .time {
                    font-size: 14px;
                    position: absolute;
                    top: 16px;
                    right: 10%;
                    padding: 0 0 5px 5px;
                    color: var(--grey);
                    background-color: var(--white);
                }
                .preview {
                    font-size: 14px;
                    display: inline-block;
                    overflow: hidden !important;
                    width: 70%;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    color: var(--grey);
                }
                &.active,&:hover {
                    margin-top: -1px;
                    margin-left: -1px;
                    padding-top: 13px;
                    border: 0;
                    background-color: var(--blue);
                    width: calc(100% + 2px);
                    padding-left: calc(10% + 1px);
                    span {
                        color: var(--white);
                        background: transparent;
                    }
                    &:after {
                        display: none;
                    }
                }
            }
        }
    }
    .right {
        position: relative;
        float: left;
        width: 62.4%;
        height: 100%;
        .top {
            width: 100%;
            height: 47px;
            padding: 15px 29px;
            background-color: #eceff1;
            span {
                font-size: 15px;
                color: var(--grey);
                .name {
                    color: var(--dark);
                    @include font-bold;
                }
            }
        }
        .chat {
            position: relative;
            display: none;
            overflow: hidden;
            padding: 0 35px 92px;
            border-width: 1px 1px 1px 0;
            border-style: solid;
            border-color: var(--light);
            height: calc(100% - 48px);
            justify-content: flex-end;
            flex-direction: column;
            &.active-chat {
                display: block;
                display: flex;
                .bubble {
                    transition-timing-function: cubic-bezier(.4,-.04, 1, 1);
                    @for $i from 1 through 10 {
                        &:nth-of-type(#{$i}) {
                            animation-duration: .15s * $i;
                        }
                    }
                }
            }
        }
        .write {
            position: absolute;
            bottom: 29px;
            left: 30px;
            height: 42px;
            padding-left: 8px;
            border: 1px solid var(--light);
            background-color: #eceff1;
            width: calc(100% - 58px);
            border-radius: 5px;
            input {
                font-size: 16px;
                float: left;
                width: 347px;
                height: 40px;
                padding: 0 10px;
                color: var(--dark);
                border: 0;
                outline: none;
                background-color: #eceff1;
                @include font;
            }
            .write-link {
                &.attach {
                    &:before {
                        display: inline-block;
                        float: left;
                        width: 20px;
                        height: 42px;
                        content: '';
                        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/attachment.png');
                        background-repeat: no-repeat;
                        background-position: center;
                    }
                }
                &.smiley {
                    &:before {
                        display: inline-block;
                        float: left;
                        width: 20px;
                        height: 42px;
                        content: '';
                        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/smiley.png');
                        background-repeat: no-repeat;
                        background-position: center;
                    }
                }
                &.send {
                    &:before {
                        display: inline-block;
                        float: left;
                        width: 20px;
                        height: 42px;
                        margin-left: 11px;
                        content: '';
                        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/send.png');
                        background-repeat: no-repeat;
                        background-position: center;
                    }
                }
            }
        }
        .bubble {
            font-size: 16px;
            position: relative;
            display: inline-block;
            clear: both;
            margin-bottom: 8px;
            padding: 13px 14px;
            vertical-align: top;
            border-radius: 5px;
            &:before {
                position: absolute;
                top: 19px;
                display: block;
                width: 8px;
                height: 6px;
                content: '\00a0';
                transform: rotate(29deg) skew(-35deg);
            }
            &.you {
                float: left;
                color: var(--white);
                background-color: var(--blue);
                align-self: flex-start;
                animation-name: slideFromLeft;
                &:before {
                    left: -3px;
                    background-color: var(--blue);
                }
            }
            &.me {
                float: right;
                color: var(--dark);
                background-color: #eceff1;
                align-self: flex-end;
                animation-name: slideFromRight;
                &:before {
                    right: -3px;
                    background-color: #eceff1;
                }
            }
        }
        .conversation-start {
            position: relative;
            width: 100%;
            margin-bottom: 27px;
            text-align: center;
            span {
                font-size: 14px;
                display: inline-block;
                color: var(--grey);
                &:before,&:after {
                    position: absolute;
                    top: 10px;
                    display: inline-block;
                    width: 30%;
                    height: 1px;
                    content: '';
                    background-color: var(--light);
                }
                &:before {
                    left: 0;
                }
                &:after {
                    right: 0;
                }
            }
        }
    }
}
@keyframes slideFromLeft {
    0% {
        margin-left: -200px;
        opacity: 0;
    }
    100% {
        margin-left: 0;
        opacity: 1;
    }
}
@-webkit-keyframes slideFromLeft {
    0% {
        margin-left: -200px;
        opacity: 0;
    }
    100% {
        margin-left: 0;
        opacity: 1;
    }
}
@keyframes slideFromRight {
    0% {
        margin-right: -200px;
        opacity: 0;
    }
    100% {
        margin-right: 0;
        opacity: 1;
    }
}
@-webkit-keyframes slideFromRight {
    0% {
        margin-right: -200px;
        opacity: 0;
    }
    100% {
        margin-right: 0;
        opacity: 1;
    }
}
</style>